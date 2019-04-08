<?
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    
    use Bitrix\Main\Localization\Loc;
    
    Loc::loadMessages(__FILE__);
    
    if(!check_bitrix_sessid()){
        
        return;
    }
    
    if($errorException = $APPLICATION->GetException()){
        CAdminMessage::ShowMessage($errorException->GetString());
    }
?>

<form action="<? echo($APPLICATION->GetCurPage()); ?>" name="form1">
    <label for="createData"><?=Loc::getMessage("ADD_TEST_DATA"); ?></label>
    <input type="hidden" name="step" value="2">
    <input type="hidden" name="lang" value="<?echo LANG?>">
    <input type="hidden" name="id" value="sts.test">
    <input type="hidden" name="install" value="Y">
    <?=bitrix_sessid_post()?>
    <input type="checkbox" id="createData" name="createData" value="1">
    <input type="submit" value="<?=Loc::getMessage("DO_INSTALL"); ?>">
</form>