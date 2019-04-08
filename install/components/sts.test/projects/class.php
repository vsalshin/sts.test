<?php
    
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    
    use \Bitrix\Main\ORM\Query\Filter\ConditionTree;
    use \Sts\Test\Entity\ProjectTable;
    
    class StsProjects extends CBitrixComponent
    {
        
        public function onPrepareComponentParams($arParams)
        {
            $arParams['MODE'] = 'projects';
            if(in_array($this->request->get('mode'), ['seasons', 'series', 'projectSeries']))
            {
                $arParams['MODE'] = $this->request->get('mode');
            }
            $arParams['ENTITY_ID'] = $this->request->get('eid');
            return $arParams;
        }
    
        /**
         * Построить фильтр
         * @param string $prefix
         * @return ConditionTree
         * @throws \Bitrix\Main\ArgumentException
         */
        protected function buildFilters(string $prefix = ''): ConditionTree
        {
            $filters = $this->request->get('filter');
            $this->arResult['FILTERS'] = [
                'ID' => [
                    'TITLE' => 'ID',
                    'NAME' => 'filter[id]',
                    'VALUE' => intval($filters['id']),
                    '~VALUE' => $filters['id'],
                    'OPERATION' => '=',
                ],
                'NAME' => [
                    'TITLE' => 'Название',
                    'NAME' => 'filter[name]',
                    'VALUE' => !empty($filters['name']) ? '%' . $filters['name'] . '%' : null,
                    '~VALUE' => $filters['name'],
                    'OPERATION' => 'like'
                ]
            ];
            
            $filter = new ConditionTree();
            foreach ($this->arResult['FILTERS'] as $filterField => $filterItem) {
                if(!empty($filterItem['VALUE'])) {
                    $filter->where($prefix . $filterField, $filterItem['OPERATION'], $filterItem['VALUE']);
                }
            }
            return $filter;
        }
    
        /**
         * Получить список Проектов
         * @return string
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        protected function getProjects()
        {
            $this->arResult['PROJECTS'] = ProjectTable::query()
                ->setSelect(['ID', 'NAME'])
                ->where($this->buildFilters())
                ->fetchCollection();
            $this->arResult['DETAIL_URL_TEMPLATE'] = sprintf("%s?mode=seasons&eid=#ID#", $this->request->getRequestedPage());
            $this->arResult['SERIES_URL_TEMPLATE'] = sprintf("%s?mode=projectSeries&eid=#ID#", $this->request->getRequestedPage());
            return 'projects';
        }
    
        /**
         * Получить список сезонов принадлежащих проекту
         * @return string
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        protected function getSeasons()
        {
            $project = ProjectTable::query()
                ->setSelect(['ID', 'NAME', 'SEASONS'])
                ->where($this->buildFilters('SEASONS.')->where('ID', $this->arParams['ENTITY_ID']))
                ->fetchObject();
            $this->arResult['PROJECT'] = $project;
            $this->arResult['DETAIL_URL_TEMPLATE'] = sprintf("%s?mode=series&eid=#ID#", $this->request->getRequestedPage());
            return 'seasons';
        }
    
        /**
         * Получить список серий принадлежащих сезону
         * @return string
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        protected function getSeries()
        {
            $project = ProjectTable::query()
                ->setSelect(['ID', 'NAME', 'SEASONS', 'SEASONS.SERIES'])
                ->where($this->buildFilters('SEASONS.SERIES.')->where('SEASONS.ID', $this->arParams['ENTITY_ID']))
                ->fetchObject();
            $this->arResult['PROJECT'] = $project;
            return 'series';
        }
    
        /**
         * Получить список серий в проекте
         * @return string
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        protected function getProjectSeries()
        {
            $project = ProjectTable::query()
                ->setSelect(['ID', 'NAME', 'SEASONS', 'SEASONS.SERIES'])
                ->where($this->buildFilters('SEASONS.SERIES.')->where('ID', $this->arParams['ENTITY_ID']))
                ->fetchObject();
            $this->arResult['PROJECT'] = $project;
            return 'project_series';
        }
        
        public function executeComponent()
        {
            \Bitrix\Main\Loader::includeModule('sts.test');
            $this->arResult['REQUEST_URL'] = $this->request->getRequestUri();
            $method = sprintf('get%s', ucfirst($this->arParams['MODE']));
            $this->includeComponentTemplate(call_user_func([$this, $method]));
        }
    }