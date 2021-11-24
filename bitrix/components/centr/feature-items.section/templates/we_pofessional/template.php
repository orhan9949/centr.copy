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


	<section class="row seo-features">
  		<div class="container">
  			<div class="row">
  				<h2 class="h1 text-center"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/include_areas/services/service-1/we_pofessional_h.php');?></h2>
  	<? $number = 1;?>	
  	<?$count = 0;?>
    <?$count_close = 1;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
    	<?
    	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    	?>
		
		<?if($count == 0):?>
          <div class="col-sm-12">
          <?endif;?>
          <?if($count % 3 == 0):?>
          <div class="col-sm-12">
          <?endif;?>
		
		<div class="seo-feature col-sm-6 col-md-4 news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
  			<div class="media">
  				<div class="media-left"><span><? echo $number; $number++;?></span></div>
  				<div class="media-body">
  					<h3><? echo ($arItem["PROPERTIES"]['TITLE']['~VALUE']); ?></h3>
  					<p><? echo ($arItem["PROPERTIES"]['DESC']['~VALUE']['TEXT']); ?></p>
  				</div>
  			</div>
  		</div>
		<? //echo  '<pre>'; print_r($arItem["PROPERTIES"]); echo '</pre>';?>		    			
                                
        <?if($count_close % 3 == 0):?>
          </div>
          <?endif;?>
          
          <?$count_close++;?>
          <?$count++;?>    
                
    <?endforeach;?>

        	</div>
  		</div>
  	</section>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
