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

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<? $count = 1;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	    <div class="<?if($count % 2 != 0):?>wow fadeInLeft<?else:?>wow fadeInRight<?endif;?> demo-card demo-card--step<?=$count?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="head">
				<div class="number-box">
					<span style="color: #fff;padding: 0px 10px;display: block;text-align: center;font-weight: 400;">
					<?if(!empty($arItem['PROPERTIES']['DATE_START']['~VALUE'])):?>
					<? $date_created = $arItem['PROPERTIES']['DATE_START']['~VALUE']; 
								$day = date("j", strtotime($date_created)); 
								$month_array = array("1"=>"ßÍÂÀĞß","2"=>"ÔÅÂĞÀËß","3"=>"ÌÀĞÒÀ","4"=>"ÀÏĞÅËß","5"=>"ÌÀß", "6"=>"ÈŞÍß", "7"=>"ÈŞËß","8"=>"ÀÂÃÓÑÒÀ","9"=>"ÑÅÍÒßÁĞß","10"=>"ÎÊÒßÁĞß","11"=>"ÍÎßÁĞß","12"=>"ÄÅÊÀÁĞß");
                                $month_name_rus = $month_array[date('n',strtotime($date_created))];
								$month = $month_name_rus /*date("m", strtotime($date_created))*/;
								$year = date("Y", strtotime($date_created));	
								$time_cust = date("H:i", strtotime($date_created));?>
								<? echo $day;?><?=' '?><? echo $month;?>
							    <? echo $time_cust;?>
            		<?endif?>
            		</span>
				</div>
				<h2><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="color:<?if(!empty($arItem['PROPERTIES']['COLOR_TITLE']['VALUE_XML_ID'])):?><?=$arItem['PROPERTIES']['COLOR_TITLE']['VALUE_XML_ID']?><?else:?>#243c4f<?endif;?>"><?echo $arItem["NAME"]?></a></h2>
			</div>
			<div class="body">
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<p><?echo $arItem["PREVIEW_TEXT"];?></p>
				<?endif;?>
		    <?if($arItem['PROPERTIES']['MER_BTN']['VALUE_XML_ID'] == 'mer_on'):?>
            </div>
            <div class="body" style="max-height: 79px;text-align:center">
                <a class="btn btn-outline blue mer-btn mer_btn-modal mer_list" date-mer="<?=$day.' '.$month.' '.$time_cust;?>">Çàïèñàòüñÿ íà ìåğîïğèÿòèå</a>
            <?endif;?>
			</div>
		</div>
<? $count++;?>
<?endforeach;?>
<!--
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
-->


