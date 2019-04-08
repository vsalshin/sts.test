<section class="filter">
    <h2>Фильтры</h2>
    <form method="get">
        <input type="hidden" name="mode" value="<?=$arParams['MODE'];?>">
        <input type="hidden" name="eid" value="<?=$arParams['ENTITY_ID'];?>">
        <?php foreach ($arResult['FILTERS'] as $filter):?>
            <div>
                <label for="<?=str_replace(["[", "]"], "_", $filter['NAME']);?>"><?=$filter['TITLE'];?></label>
                <input type="text" id="<?=str_replace(["[", "]"], "_", $filter['NAME']);?>" name="<?=$filter['NAME'];?>" value="<?=$filter['~VALUE'];?>">
            </div>
        <?endforeach;?>
        <input type="submit" value="Фильтровать">
    </form>
</section>