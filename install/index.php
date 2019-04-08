<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    
    use Bitrix\Main\Localization\Loc;

    Loc::loadLanguageFile(__FILE__);
    
    class sts_test extends \CModule
    {
        public $MODULE_ID = 'sts.test';
        public $MODULE_VERSION = '1.0';
        public $MODULE_VERSION_DATE = '2019-04-08 14:20:00';
        public $PARTNER_NAME = 'Vladimir Salshin';
        public $MODULE_INSTALL_PATH;
    
        /**
         * @var \Bitrix\Main\ORM\Data\DataManager[]
         */
        private $entities;
        
        public function __construct()
        {
            $this->MODULE_INSTALL_PATH = dirname(dirname(dirname(__DIR__)));
            $this->MODULE_NAME = Loc::getMessage('STS_MODULE_NAME');
            $this->MODULE_DESCRIPTION = Loc::getMessage('STS_MODULE_DESCRIPTION');
            if(file_exists(__DIR__ . "/version.php")) {
                $arModuleVersion = [];
                include_once(__DIR__ . "/version.php");
                $this->MODULE_VERSION 	   = $arModuleVersion["VERSION"];
                $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            }
        }
        
        public function DoInstall()
        {
            global $APPLICATION, $step, $createData;
            $step = intval($step);
            if($step < 2) {
                $APPLICATION->IncludeAdminFile(
                    Loc::getMessage("INSTALL_MESSAGE", ['#M_NAME#' => $this->MODULE_NAME]),
                    __DIR__ . "/step1.php"
                );
            }
            else {
                
                $this->InstallDB();
                $this->InstallFiles();
                if($createData) {
                    include_once $this->MODULE_INSTALL_PATH . '/modules/' . $this->MODULE_ID . '/lib/TestData.php';
                    \Sts\Test\TestData::fillDB();
                }
                \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
            }
            return true;
        }
        
        public function DoUninstall()
        {
            $this->UnInstallDB();
            $this->UnInstallFiles();
            \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
            return true;
        }
    
        /**
         * Создать таблицы в БД на основе ОРМ классов
         * @return bool
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\SystemException
         */
        public function InstallDB()
        {
            $connection = \Bitrix\Main\Application::getConnection();
            foreach ($this->getEntities() as $dataClass)
            {
                if(!$connection->isTableExists($dataClass::getTableName()))
                {
                    $dataClass::getEntity()->createDbTable();
                }
            }
            return false;
        }
    
        /**
         * Удалить таблицы из БД
         * @return bool|void
         * @throws \Bitrix\Main\Db\SqlQueryException
         */
        public function UnInstallDB()
        {
            $connection = \Bitrix\Main\Application::getConnection();
    
            foreach ($this->getEntities() as $dataClass)
            {
                if($connection->isTableExists($dataClass::getTableName())) {
                    $connection->dropTable($dataClass::getTableName());
                }
            }
        }
    
        /**
         * Установим компонент с помощью символьной ссылки
         * @return bool
         */
        public function InstallFiles()
        {
            if(!file_exists($this->MODULE_INSTALL_PATH . "/components/")) {
                mkdir($this->MODULE_INSTALL_PATH . "/components/");
            }
            CopyDirFiles(__DIR__ . "/components/", $this->MODULE_INSTALL_PATH . "/components/", true, true);
            return true;
        }
    
        /**
         * Удалим компоненты
         */
        public function UnInstallFiles()
        {
            DeleteDirFilesEx($this->MODULE_INSTALL_PATH . "/components/" . $this->MODULE_ID);
        }
    
        /**
         * Получить список сущностей, объявленных в модуле
         * Такой подход позволяет не писать SQL скрипты для каждой сщуности,
         * но не дает проставить Foreign keys (
         * @return \Bitrix\Main\ORM\Data\DataManager[]
         */
        private function getEntities()
        {
            if(is_null($this->entities)) {
                $entitiesDir = sprintf("%s/modules/%s/lib", $this->MODULE_INSTALL_PATH, $this->MODULE_ID);
                $directoryIterator = new RecursiveDirectoryIterator($entitiesDir, \RecursiveDirectoryIterator::SKIP_DOTS | \RecursiveDirectoryIterator::FOLLOW_SYMLINKS);
                foreach (new RecursiveIteratorIterator($directoryIterator, \RecursiveIteratorIterator::SELF_FIRST) as $item) {
                    if ($item->isFile() && $item->isReadable() && substr($item->getFilename(), -4) == '.php') {
                        // Получаем объявленные классы
                        $classes = get_declared_classes();
            
                        include_once $item->getPathname();
                        
                        //Получаем классы из подключенного файла
                        $classes = array_diff(get_declared_classes(), $classes);
            
                        foreach ($classes as $class) {
                            if (is_subclass_of($class, \Bitrix\Main\ORM\Data\DataManager::class) && substr($class, -5) == 'Table') {
                                $this->entities[] = $class;
                            }
                        }
                    }
                }
            }
            return $this->entities;
        }
    }