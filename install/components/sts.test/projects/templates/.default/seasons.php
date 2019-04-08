<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
?>

<h1>Проект <?=$arResult['PROJECT']->getName();?></h1>
<div>
    <?=$arResult['PROJECT']->getDescription();?>
</div>
<? include_once 'filters.php'; ?>
<?php
    if($arResult['PROJECT']->getSeasons()->count() == 0)
    {
        include_once 'empty_result.php';
        return;
    }
?>
<section>
    <ol>
        <?php foreach ($arResult['PROJECT']->getSeasons() as $season):?>
            <li>
                <?=$season->getName();?> (<?=$season->getId();?>)
                <ul>
                    <li><a href="<?=str_replace("#ID#", $season->getId(), $arResult['DETAIL_URL_TEMPLATE']); ?>">Все серии сезона</a></li>
                </ul>
            </li>
        
        <?endforeach;?>
    </ol>
</section>