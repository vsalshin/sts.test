<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    /**
     * @var \Sts\Test\Entity\EO_Project $project
     */
    $project = $arResult['PROJECT'];
    
?>

<h1>Проект <?=$project->getName();?>. </h1>

<? include_once 'filters.php'; ?>
<?php
    if($project->getSeasons()->count() == 0)
    {
        include_once 'empty_result.php';
        return;
    }
    $season = $project->getSeasons()->getAll()[0];
?>
<?=$season->getName();?>
<div>
    <?=$season->getDescription();?>
</div>
<section>
    <ol>
        <?php foreach ($season->getSeries() as $series):?>
            <li>
                <?=$series->getName();?> (<?=$series->getId();?>)
                <span><?=$series->getDescription();?></span>
            </li>
        
        <?endforeach;?>
    </ol>
</section>