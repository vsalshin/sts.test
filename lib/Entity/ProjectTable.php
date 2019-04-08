<?php
    
    namespace Sts\Test\Entity;
    
    
    
    use Bitrix\Main\ORM\Data\DataManager;
    use Bitrix\Main\ORM\Event;
    use Bitrix\Main\ORM\Fields\IntegerField;
    use Bitrix\Main\ORM\Fields\Relations\OneToMany;
    use Bitrix\Main\ORM\Fields\Relations\Reference;
    use Bitrix\Main\ORM\Fields\StringField;
    use Bitrix\Main\ORM\Fields\TextField;

    /**
     * Class ProjectTable
     * @package Sts\Entity
     */
    class ProjectTable extends DataManager
    {
        /**
         * @return string
         */
        public static function getTableName()
        {
            return "sts_projects";
        }
    
        /**
         * @return array
         * @throws \Bitrix\Main\SystemException
         */
        public static function getMap()
        {
            return [
                (new IntegerField('ID'))->configurePrimary(true)->configureAutocomplete(true),
                new StringField('NAME'),
                new TextField('DESCRIPTION'),
                new OneToMany('SEASONS', SeasonTable::class, 'PROJECT'),
                new OneToMany('SERIES', SeriesTable::class, 'PROJECT')
            ];
        }
    }