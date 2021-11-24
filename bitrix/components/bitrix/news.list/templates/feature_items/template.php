<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

    <div class="row feature-sets-row">
  	<? $number = 1;?>
  	<?$count = 0;?>
    <?$count_close = 1;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
    	<?
    	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    	?>
        <?if($count == 0):?>
        <div class="col-sm-12" style="padding:0;margin:0">
        <?endif;?>
        <?if($count % 3 == 0):?>
        <div class="col-sm-12" style="padding:0;margin:0">
        <?endif;?>
          
		<div class="col-sm-4 feature-sets news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
      		<div class="media feature-set">
      			<div class="media-left"><span style="background:<? echo ($arItem["PROPERTIES"]['COLOR']['~VALUE']); ?>;"><? echo ($arItem["PROPERTIES"]['ICON']['~VALUE']); ?></span></div>
      			<div class="media-body">
      				<h3 class="this-title"><? echo ($arItem["PROPERTIES"]['TITLE']['~VALUE']); ?></h3>
    				<p><? echo ($arItem["PROPERTIES"]['DESC']['~VALUE']['TEXT']); ?></p>
      			</div>
      		</div>
		</div>
		
        <?if($count_close % 3 == 0):?>
        </div>
        <?endif;?>
        
        <?$count_close++;?>
        <?$count++;?>	
	
    <?endforeach;?>
    </div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
