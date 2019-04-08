<?php
    $arComponentParameters = [
        "SEF_RULE" => array(
            "VALUES" => array(
                "SECTION_ID" => array(
                    "TEXT" => GetMessage("IBLOCK_SECTION_ID"),
                    "TEMPLATE" => "#SECTION_ID#",
                    "PARAMETER_LINK" => "SECTION_ID",
                    "PARAMETER_VALUE" => '={$_REQUEST["SECTION_ID"]}',
                ),
                "SECTION_CODE" => array(
                    "TEXT" => GetMessage("IBLOCK_SECTION_CODE"),
                    "TEMPLATE" => "#SECTION_CODE#",
                    "PARAMETER_LINK" => "SECTION_CODE",
                    "PARAMETER_VALUE" => '={$_REQUEST["SECTION_CODE"]}',
                ),
                "SECTION_CODE_PATH" => array(
                    "TEXT" => GetMessage("CP_BCE_SECTION_CODE_PATH"),
                    "TEMPLATE" => "#SECTION_CODE_PATH#",
                    "PARAMETER_LINK" => "SECTION_CODE_PATH",
                    "PARAMETER_VALUE" => '={$_REQUEST["SECTION_CODE_PATH"]}',
                ),
                "ELEMENT_ID" => array(
                    "TEXT" => GetMessage("IBLOCK_ELEMENT_ID"),
                    "TEMPLATE" => "#ELEMENT_ID#",
                    "PARAMETER_LINK" => "ELEMENT_ID",
                    "PARAMETER_VALUE" => '={$_REQUEST["ELEMENT_ID"]}',
                ),
                "ELEMENT_CODE" => array(
                    "TEXT" => GetMessage("IBLOCK_ELEMENT_CODE"),
                    "TEMPLATE" => "#ELEMENT_CODE#",
                    "PARAMETER_LINK" => "ELEMENT_CODE",
                    "PARAMETER_VALUE" => '={$_REQUEST["ELEMENT_CODE"]}',
                )
            ),
        ),
    ];