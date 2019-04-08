<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    
    use Bitrix\Main\Localization\Loc;
    
    Loc::loadMessages(__FILE__);
    
    $arComponentDescription = array(
        "NAME" => Loc::getMessage("STS_PROJECTS_NAME"),
        "DESCRIPTION" => Loc::getMessage("STS_PROJECTS_DESCRIPTION"),
        "PATH" => array(
            "ID" => "content",
        ),
    );