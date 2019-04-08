<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
?>

<h1>Проекты</h1>
<? include_once 'filters.php'; ?>
<?php
    if($arResult['PROJECTS']->count() == 0)
    {
        include_once 'empty_result.php';
        return;
    }
?>
<section>
    <ol>
    <?php foreach ($arResult['PROJECTS'] as $project):?>
        <li>
            <?=$project->getName();?> (<?=$project->getId();?>)
            <ul>
                <li><a href="<?=str_replace("#ID#", $project->getId(), $arResult['DETAIL_URL_TEMPLATE']); ?>">Все сезоны проекта</a></li>
                <li><a href="<?=str_replace("#ID#", $project->getId(), $arResult['SERIES_URL_TEMPLATE']); ?>">Все серии проекта</a></li>
            </ul>
        </li>
        
    <?endforeach;?>
    </ol>
</section>