<?php
    
    namespace Sts\Test\Entity;


    use Bitrix\Main\ORM\Data\DataManager;
    use Bitrix\Main\ORM\Fields\IntegerField;
    use Bitrix\Main\ORM\Fields\Relations\Reference;
    use Bitrix\Main\ORM\Fields\StringField;
    use Bitrix\Main\ORM\Fields\TextField;
    use Bitrix\Main\ORM\Query\Join;

    class SeriesTable extends DataManager
    {
        public static function getTableName()
        {
            return 'sts_series';
        }
    
        /**
         * @return array
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\SystemException
         */
        public static function getMap()
        {
            return [
                (new IntegerField("ID"))->configurePrimary(true)->configureAutocomplete(true),
                new StringField("NAME"),
                new TextField("DESCRIPTION"),
                new IntegerField("SEASON_ID"),
                new Reference("SEASON", SeasonTable::class, Join::on('this.SEASON_ID', 'ref.ID')),
                new Reference('PROJECT', ProjectTable::class, Join::on('this.SEASON.PROJECT_ID', 'ref.ID'))
            ];
        }
    }