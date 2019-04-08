<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    /**
     * @var \Sts\Test\Entity\EO_Project $project
     */
    $project = $arResult['PROJECT'];
    $seasons = $project->getSeasons();
?>

<h1>Проект <?=$project->getName();?></h1>
<div>
    <?=$project->getDescription();?>
</div>
<? include_once 'filters.php'; ?>
<?php
    if($seasons->count() == 0)
    {
        include_once 'empty_result.php';
        return;
    }
?>
<section>
    <ol>
        <?php foreach ($seasons as $season):?>
            <li>
                <?=$season->getName();?>
                <ol>
                    <?foreach ($season->getSeries() as $series):?>
                        <li>
                            <?=$series->getName();?> (<?=$series->getId();?>) <?=$series->getDescription();?>
                        </li>
                    <?endforeach;?>
                </ol>
            </li>
        <?endforeach;?>
    </ol>
</section>