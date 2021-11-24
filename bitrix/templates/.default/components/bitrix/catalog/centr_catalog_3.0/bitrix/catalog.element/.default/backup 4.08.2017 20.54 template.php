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
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);
?>


<? if(!empty($arResult['PROPERTIES']['UF_BACKGROUND_DETAIL_PAGE']['VALUE'])):?>
<p id="ready" style="display: none;">true</p> 
<p id="uf-background-img" style="display: none;"><?=CFile::GetPath($arResult["PROPERTIES"]["UF_BACKGROUND_DETAIL_PAGE"]["VALUE"])?></p>
<p id="uf-title" style="display: none;"><? echo ($arResult["PROPERTIES"]["UF_TITLE"]["~VALUE"]['TEXT']); ?></p>
<? endif;?>

<div class="row m0">
<div class="media product product-details">

<div class="bx_item_detail <? echo $templateData['TEMPLATE_CLASS']; ?>" id="<? echo $arItemIDs['ID']; ?>">
<?
if ('Y' == $arParams['DISPLAY_NAME'])
{
?>




<div class="bx_item_title"><h1><span><?
	echo (
		isset($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] != ''
		? $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
		: $arResult["NAME"]
	); ?>
</span></h1></div>
<?
}
reset($arResult['MORE_PHOTO']);
$arFirstPhoto = current($arResult['MORE_PHOTO']);
?>
	<div class="bx_item_container">

<style>
    .shop-tabs .nav li a {
    border: none;
    background: none;
    border-radius: 0;
    line-height: 49px;
    padding: 0 20px;
    font-size: 14px;
    font-weight: 500;
    margin: 0;
    text-transform: none;
}
.bx-breadcrumb {
    margin:0;
}
.page-cover {
    height: 289px;
    -webkit-background-size: cover;
    background: center;
    background: center;
    background-size: cover;
    /* background: no-repeat scroll center center; */
    background-position: center;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.page-cover .page-title {
    color: #243c4f;
    /* top: 20px; */
    margin-top: 90px;
    padding: 0px 100px;
}
</style>

    <div class="col-sm-12 p0">
        <div class="col-sm-8 product-titlel">
            <!--<div class="col-sm-12">   
            <h1 class="pro-title" id="product_name"><? echo ($arResult['NAME']);?></h1>
            </div> -->
        <div class="row m0 shop-tabs">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><? echo GetMessage('FULL_DESCRIPTION'); ?></a></li>
				<!--<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">reviews</a></li>-->
		    <?/* Добавление вкладки таба */?>		
			<? $tab_id = 1; foreach( $arResult['PROPERTIES']['TAB_TITLE']['~VALUE'] as $tab_title ):?>
			    <li role="presentation"><a href="<?='#tab_'.$tab_id?>" aria-controls="reviews" role="tab" data-toggle="tab"><?=$tab_title?></a></li>
			<? $tab_id++; endforeach;?>
			<? /* --------- */?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			    <? /* Добавление контента для таба */?>
			    <? $tab_id = 1; foreach( $arResult['PROPERTIES']['TAB_CONTENT']['~VALUE'] as $tab_content ):?>
			    <div role="tabpanel" class="tab-pane" id="<?='tab_'.$tab_id?>">
					<!--<h4 class="tab-title"><? echo GetMessage('FULL_DESCRIPTION'); ?></h4>-->								
					<p>
						<?=$tab_content['TEXT'];?>
					</p>
				</div>
		    	<? $tab_id++; endforeach; ?>
		    	<? /* --------- */?>
				<div role="tabpanel" class="tab-pane active" id="description">
					<!--<h4 class="tab-title"><? echo GetMessage('FULL_DESCRIPTION'); ?></h4>-->								
					<p>
						<?
							if ('html' == $arResult['DETAIL_TEXT_TYPE'])
							{
								echo $arResult['DETAIL_TEXT'];
							}
							else
							{
								?><p><? echo $arResult['DETAIL_TEXT']; ?></p><?
							}
						?>
					</p>
				</div>
				<!--<div role="tabpanel" class="tab-pane" id="reviews">															
						<div class="tac ovh">
						</div>									
						<?
						if ('Y' == $arParams['USE_COMMENTS'])
						{
						?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.comments",
							"",
							array(
								"ELEMENT_ID" => $arResult['ID'],
								"ELEMENT_CODE" => "",
								"IBLOCK_ID" => $arParams['IBLOCK_ID'],
								"SHOW_DEACTIVATED" => $arParams['SHOW_DEACTIVATED'],
								"URL_TO_COMMENT" => "",
								"WIDTH" => "",
								"COMMENTS_COUNT" => "5",
								"BLOG_USE" => $arParams['BLOG_USE'],
								"FB_USE" => $arParams['FB_USE'],
								"FB_APP_ID" => $arParams['FB_APP_ID'],
								"VK_USE" => $arParams['VK_USE'],
								"VK_API_ID" => $arParams['VK_API_ID'],
								"CACHE_TYPE" => $arParams['CACHE_TYPE'],
								"CACHE_TIME" => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								"BLOG_TITLE" => "",
								"BLOG_URL" => $arParams['BLOG_URL'],
								"PATH_TO_SMILE" => "",
								"EMAIL_NOTIFY" => $arParams['BLOG_EMAIL_NOTIFY'],
								"AJAX_POST" => "Y",
								"SHOW_SPAM" => "Y",
								"SHOW_RATING" => "N",
								"FB_TITLE" => "",
								"FB_USER_ADMIN_ID" => "",
								"FB_COLORSCHEME" => "light",
								"FB_ORDER_BY" => "reverse_time",
								"VK_TITLE" => "",
								"TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME']
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);?>
						<?
						}
						?>	
				</div>-->
			</div>
		</div>
        </div>
        
        
        <div class="col-sm-4">
    	
    	
    	<div class="col-sm-12 p0">
    	    <div class="media-body">  					
    
    		<div class="/*bx_rt*/">
    
    				<!--<h1 class="pro-title" id="product_name"><? echo ($arResult['NAME']);?></h1>-->
      				<h3 class="price">  				
    					<?
    					$minPrice = (isset($arResult['RATIO_PRICE']) ? $arResult['RATIO_PRICE'] : $arResult['MIN_PRICE']);
    					$boolDiscountShow = (0 < $minPrice['DISCOUNT_DIFF']);
    					if ($arParams['SHOW_OLD_PRICE'] == 'Y')
    					{
    					?>
    						<del class="/*item_old_price*/" id="<? echo $arItemIDs['OLD_PRICE']; ?>" style="display: <? echo($boolDiscountShow ? '' : 'none'); ?>"><? echo($boolDiscountShow ? $minPrice['PRINT_VALUE'] : ''); ?></del>
    					<?
    					}
    					?>
    						<span style=" display: inline-block;font-weight: 400;">Цена:  </span><div class="/*item_current_price*/" id="<? echo $arItemIDs['PRICE']; ?>" style="font-weight: 400;    display: inline-block;"><? echo $minPrice['PRINT_DISCOUNT_VALUE']; ?></div>
    					<?
    					if ($arParams['SHOW_OLD_PRICE'] == 'Y')
    					{
    						?>
    						<div class="/*item_economy_price*/" id="<? echo $arItemIDs['DISCOUNT_PRICE']; ?>" style="display: <? echo($boolDiscountShow ? '' : 'none'); ?>"><? echo($boolDiscountShow ? GetMessage('CT_BCE_CATALOG_ECONOMY_INFO', array('#ECONOMY#' => $minPrice['PRINT_DISCOUNT_DIFF'])) : ''); ?></div>
    					<?
    					}
    					?>
    				</h3>
                    
                    <div class="col-sm-12 m0 p0">
                    <?if( ($arResult['PROPERTIES']['DEMO_BUY_BTN']['VALUE_XML_ID']) == 'demo_on'):?>
                        <a class="btn btn-outline blue demo-modal-btn" data-title-form="демо-доступ">Демо-доступ</a>
                        <i class="fa fa-question-circle price-tooltip" data-tooltip="Демо-доступ к программе предоставляется бесплатно"></i>
                        <style>
                            .inner-data:before { width: 400px;}
                        </style>
                    
                    <?endif;?>
                    <?if( ($arResult['PROPERTIES']['DEMONSTRATION_BTN']['VALUE_XML_ID']) == 'demonstration_on'):?>
                        <a class="btn btn-outline blue demo-modal-btn" data-title-form="демонстрацию">Демонстрация</a>
                        <i class="fa fa-question-circle price-tooltip" data-tooltip="Демострация программы предоставляется бесплатно"></i>
                        <style>
                            .inner-data:before { width: 400px;}
                        </style>
                    
                    <?endif;?>
                    </div>
    
      				<p class="pro-about product-quick-desc"><? echo ($arResult['~PREVIEW_TEXT']);?></p>
      				<!--<div class="row m0 quantity-cart">
      				<input type="number" class="form-control quantity pull-left" value="1">-->
      				<!--<button class="btn btn-default btn-sm">Add to Cart</button>
      				</div>-->	
    
    
    <div class="item_info_section product-character-list"><?/*Характеристики*/?>
    <?
    	if (!empty($arResult['DISPLAY_PROPERTIES']))
    	{
    ?>
    	<dl>
    <?
    		foreach ($arResult['DISPLAY_PROPERTIES'] as &$arOneProp)
    		{
    ?>
    		
    		<h5 class="pro-cats"><? echo $arOneProp['NAME']; ?>: 
    			<a href="#" style="text-transform: capitalize;">
    				<?
    				echo (
    					is_array($arOneProp['DISPLAY_VALUE'])
    					? implode(' / ', $arOneProp['DISPLAY_VALUE'])
    					: $arOneProp['DISPLAY_VALUE']
    				); ?>				
    			</a>
    		</h5>	
    
    		<?/* echo $arOneProp['NAME']; ?></dt><dd><?
    			echo (
    				is_array($arOneProp['DISPLAY_VALUE'])
    				? implode(' / ', $arOneProp['DISPLAY_VALUE'])
    				: $arOneProp['DISPLAY_VALUE']
    			); */?>
    		<?
    		}
    		unset($arOneProp);
    ?>
    	</dl>
    <?
    	}
    	if ($arResult['SHOW_OFFERS_PROPS'])
    	{
    ?>	
    
    	<!-- ВЫВОД АРТИКУЛА -->
    	<h5 class="pro-cats" id="<? echo $arItemIDs['DISPLAY_PROP_DIV'] ?>"><? echo $arOneProp['NAME']; ?>
    		<a href="#"  style="text-transform: capitalize;display: none;"></a>
    	</h5>	
    	<!--<dl id="<? echo $arItemIDs['DISPLAY_PROP_DIV'] ?>" style="display: none;"></dl>-->
    	<!-- ВЫВОД АРТИКУЛА CLOSE -->
    <?
    	}
    ?>
    </div><?/* close Характеристики*/?>
    
    
    
    
    
    
    
    <?
    $useBrands = ('Y' == $arParams['BRAND_USE']);
    $useVoteRating = ('Y' == $arParams['USE_VOTE_RATING']);
    if ($useBrands || $useVoteRating)
    {
    ?>
    <!-- РЕЙТИНГ<div class="bx_optionblock">
    <?
    	if ($useVoteRating)
    	{
    		?><?$APPLICATION->IncludeComponent(
    			"bitrix:iblock.vote",
    			"stars",
    			array(
    				"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
    				"IBLOCK_ID" => $arParams['IBLOCK_ID'],
    				"ELEMENT_ID" => $arResult['ID'],
    				"ELEMENT_CODE" => "",
    				"MAX_VOTE" => "5",
    				"VOTE_NAMES" => array("1", "2", "3", "4", "5"),
    				"SET_STATUS_404" => "N",
    				"DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
    				"CACHE_TYPE" => $arParams['CACHE_TYPE'],
    				"CACHE_TIME" => $arParams['CACHE_TIME']
    			),
    			$component,
    			array("HIDE_ICONS" => "Y")
    		);?><?
    	}
    	if ($useBrands)
    	{
    		?><?$APPLICATION->IncludeComponent("bitrix:catalog.brandblock", ".default", array(
    			"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
    			"IBLOCK_ID" => $arParams['IBLOCK_ID'],
    			"ELEMENT_ID" => $arResult['ID'],
    			"ELEMENT_CODE" => "",
    			"PROP_CODE" => $arParams['BRAND_PROP_CODE'],
    			"CACHE_TYPE" => $arParams['CACHE_TYPE'],
    			"CACHE_TIME" => $arParams['CACHE_TIME'],
    			"CACHE_GROUPS" => $arParams['CACHE_GROUPS'],
    			"WIDTH" => "",
    			"HEIGHT" => ""
    			),
    			$component,
    			array("HIDE_ICONS" => "Y")
    		);?><?
    	}
    ?>
    	</div> -->
    <?
    }
    unset($useVoteRating, $useBrands);
    ?>
    
    <?
    unset($minPrice);
    if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
    {
    ?>
    <!--
    <div class="item_info_section"><?/*Характеристики*/?>
    <?
    	if (!empty($arResult['DISPLAY_PROPERTIES']))
    	{
    ?>
    	<dl>
    <?
    		foreach ($arResult['DISPLAY_PROPERTIES'] as &$arOneProp)
    		{
    ?>
    		
    		<h5 class="pro-cats"><? echo $arOneProp['NAME']; ?>: 
    			<a href="#" style="text-transform: capitalize;">
    				<?
    				echo (
    					is_array($arOneProp['DISPLAY_VALUE'])
    					? implode(' / ', $arOneProp['DISPLAY_VALUE'])
    					: $arOneProp['DISPLAY_VALUE']
    				); ?>				
    			</a>
    		</h5>	
    
    		<?/* echo $arOneProp['NAME']; ?></dt><dd><?
    			echo (
    				is_array($arOneProp['DISPLAY_VALUE'])
    				? implode(' / ', $arOneProp['DISPLAY_VALUE'])
    				: $arOneProp['DISPLAY_VALUE']
    			); */?>
    		<?
    		}
    		unset($arOneProp);
    ?>
    	</dl>
    <?
    	}
    	if ($arResult['SHOW_OFFERS_PROPS'])
    	{
    ?>	
    
    	<!-- ВЫВОД АРТИКУЛА 
    	<h5 class="pro-cats" id="<? echo $arItemIDs['DISPLAY_PROP_DIV'] ?>"><? echo $arOneProp['NAME']; ?>
    		<a href="#"  style="text-transform: capitalize;display: none;"></a>
    	</h5>	
    	<!--<dl id="<? echo $arItemIDs['DISPLAY_PROP_DIV'] ?>" style="display: none;"></dl>
    	<!-- ВЫВОД АРТИКУЛА CLOSE 
    <?
    	}
    ?>
    </div><?/* close Характеристики*/?> -->
    <?
    }
    if ('' != $arResult['PREVIEW_TEXT'])
    {
    	if (
    		'S' == $arParams['DISPLAY_PREVIEW_TEXT_MODE']
    		|| ('E' == $arParams['DISPLAY_PREVIEW_TEXT_MODE'] && '' == $arResult['DETAIL_TEXT'])
    	)
    	{
    ?>
    <div class="item_info_section">
    <?
    		/*echo ('html' == $arResult['PREVIEW_TEXT_TYPE'] ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>');*/
    ?>
    </div>
    <?
    	}
    }
    if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']) && !empty($arResult['OFFERS_PROP']))
    {
    	$arSkuProps = array();
    ?>
    <?/* Опции OPtions */?>
    <div class="item_info_section" style="padding-left:0;padding-bottom: 70px" id="<? echo $arItemIDs['PROP_DIV']; ?>">
    
    <?
    	foreach ($arResult['SKU_PROPS'] as &$arProp)
    	{
    		if (!isset($arResult['OFFERS_PROP'][$arProp['CODE']]))
    			continue;
    		$arSkuProps[] = array(
    			'ID' => $arProp['ID'],
    			'SHOW_MODE' => $arProp['SHOW_MODE'],
    			'VALUES_COUNT' => $arProp['VALUES_COUNT']
    		);
    		if ('TEXT' == $arProp['SHOW_MODE'])
    		{
    			if (5 < $arProp['VALUES_COUNT'])
    			{
    				$strClass = 'bx_item_detail_size full';
    				$strOneWidth = (100/$arProp['VALUES_COUNT']).'%';
    				$strWidth = (20*$arProp['VALUES_COUNT']).'%';
    				$strSlideStyle = '';
    			}
    			else
    			{
    				$strClass = 'bx_item_detail_size';
    				$strOneWidth = '20%';
    				$strWidth = '100%';
    				$strSlideStyle = 'display: none;';
    			}
    ?>
    <style>
        .bx_item_detail .bx_item_detail_size .bx_size, .media-body { overflow: visible;}
    </style>
    
        
    	<div class="<? echo $strClass; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_cont">
    		<span class="bx_item_section_name_gray"><? echo htmlspecialcharsEx($arProp['NAME']); ?></span>
    		<div class="bx_size_scroller_container"><div class="bx_size">
    			<ul id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_list" style="width: <? echo $strWidth; ?>;margin-left:0%;">
    <? 
    			foreach ($arProp['VALUES'] as $arOneValue)
    			{
    				$arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
    ?>
    <li data-treevalue="<? echo $arProp['ID'].'_'.$arOneValue['ID']; ?>" data-onevalue="<? echo $arOneValue['ID']; ?>" style="width: <? echo $strOneWidth; ?>; display: none;">
    <i title="<? /*echo $arOneValue['NAME']; */?>"></i>
    <span style="overflow: visible;" class="cnt price-tooltip" data-tooltip="<?=$arOneValue['NAME']?>" title="<? echo $arOneValue['NAME']; ?>"><? echo $arOneValue['NAME']; ?></span>
    </li>
    
    <?
    			}
    ?>
    			</ul>
    			</div>
    			<div class="bx_slide_left" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_left" data-treevalue="<? echo $arProp['ID']; ?>"></div>
    			<div class="bx_slide_right" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_right" data-treevalue="<? echo $arProp['ID']; ?>"></div>
    		</div>
    	</div>
    <?
    		}
    		elseif ('PICT' == $arProp['SHOW_MODE'])
    		{
    			if (5 < $arProp['VALUES_COUNT'])
    			{
    				$strClass = 'bx_item_detail_scu full';
    				$strOneWidth = (100/$arProp['VALUES_COUNT']).'%';
    				$strWidth = (20*$arProp['VALUES_COUNT']).'%';
    				$strSlideStyle = '';
    			}
    			else
    			{
    				$strClass = 'bx_item_detail_scu';
    				$strOneWidth = '20%';
    				$strWidth = '100%';
    				$strSlideStyle = 'display: none;';
    			}
    ?>
    	<div class="<? echo $strClass; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_cont">
    		<span class="bx_item_section_name_gray" style="color: #243c4f;font-weight: 500;font-size: 14px;"><? echo htmlspecialcharsEx($arProp['NAME']); ?>:</span>
    		<div class="bx_scu_scroller_container" style="top: 7px;"><div class="bx_scu">
    			<ul id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_list" style="width: <? echo $strWidth; ?>;margin-left:0%;">
    
    <script>
        jQuery(document).ready(function() {
           var $info = $('.price-tooltip');
            $info.each( function () {
              var dataInfo = $(this).data("tooltip");
              $( this ).append('<span class="inner-data" >' + dataInfo + '</span>');
            }); 
        });
    </script>
    <style>
        .price-tooltip {
            overflow: visible !important;
        }
        .bx_scu {
            overflow: visible !important;
        }
        .bx_item_detail_size { 
            display: inline-block;
        }
    </style>
    <?
    			foreach ($arProp['VALUES'] as $arOneValue)
    			{
    				$arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
    ?>
    
    <li data-treevalue="<? echo $arProp['ID'].'_'.$arOneValue['ID'] ?>" data-onevalue="<? echo $arOneValue['ID']; ?>" style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>; display: none;" >
    <!--<i title="<? /*echo $arOneValue['NAME']; */?>"></i>-->
    <span class="cnt price-tooltip" data-tooltip="<?=$arOneValue['NAME']?>"><span class="cnt_item" style="background-image:url('<? echo $arOneValue['PICT']['SRC']; ?>');" title="<? /*echo $arOneValue['NAME']; */?>"></span></span>
    
    </li>
    <?
    			}
    ?>
    			</ul>
    			</div>
    			<div class="bx_slide_left" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_left" data-treevalue="<? echo $arProp['ID']; ?>"></div>
    			<div class="bx_slide_right" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_right" data-treevalue="<? echo $arProp['ID']; ?>"></div>
    		</div>
    	</div>
    <?
    		}
    	}
    	unset($arProp);
    ?>
    </div><?/* close options Закрыли опции */?>
    <?
    }
    ?>
    
    <div class="col-sm-12" style="clear: both;padding-left: 0;">
    <!-- ПОДСЧЕТ ЦЕНЫ -->
    <div class="item_info_section row" style="padding-left:0">
        <div class="col-sm-3 p0 m0">
    <?
    if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
    {
    	$canBuy = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['CAN_BUY'];
    }
    else
    {
    	$canBuy = $arResult['CAN_BUY'];
    }
    $buyBtnMessage = ($arParams['MESS_BTN_BUY'] != '' ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCE_CATALOG_BUY'));
    $addToBasketBtnMessage = ($arParams['MESS_BTN_ADD_TO_BASKET'] != '' ? $arParams['MESS_BTN_ADD_TO_BASKET'] : GetMessage('CT_BCE_CATALOG_ADD'));
    $notAvailableMessage = ($arParams['MESS_NOT_AVAILABLE'] != '' ? $arParams['MESS_NOT_AVAILABLE'] : GetMessageJS('CT_BCE_CATALOG_NOT_AVAILABLE'));
    $showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
    $showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
    
    if($arResult['CATALOG_SUBSCRIBE'] == 'Y')
    	$showSubscribeBtn = true;
    else
    	$showSubscribeBtn = false;
    $compareBtnMessage = ($arParams['MESS_BTN_COMPARE'] != '' ? $arParams['MESS_BTN_COMPARE'] : GetMessage('CT_BCE_CATALOG_COMPARE'));
    
    if ($arParams['USE_PRODUCT_QUANTITY'] == 'Y')
    {
    	if ($arParams['SHOW_BASIS_PRICE'] == 'Y')
    	{
    		$basisPriceInfo = array(
    			'#PRICE#' => $arResult['MIN_BASIS_PRICE']['PRINT_DISCOUNT_VALUE'],
    			'#MEASURE#' => (isset($arResult['CATALOG_MEASURE_NAME']) ? $arResult['CATALOG_MEASURE_NAME'] : '')
    		);
    ?>
    		<!--<p id="<? echo $arItemIDs['BASIS_PRICE']; ?>" class="item_section_name_gray"><? echo GetMessage('CT_BCE_CATALOG_MESS_BASIS_PRICE', $basisPriceInfo); ?></p>-->
    <?
    	}
    ?>
    	<div class="item_buttons vam">
    		<div style="display: none"> <span class="item_buttons_counter_block">
    			<a href="javascript:void(0)" class="bx_bt_button_type_2 bx_small bx_fwb" id="<? echo $arItemIDs['QUANTITY_DOWN']; ?>">-</a>
    			<input id="<? echo $arItemIDs['QUANTITY']; ?>" type="text" class="tac transparent_input" value="<? echo (isset($arResult['OFFERS']) && !empty($arResult['OFFERS'])
    					? 1
    					: $arResult['CATALOG_MEASURE_RATIO']
    				); ?>">
    			<a href="javascript:void(0)" class="bx_bt_button_type_2 bx_small bx_fwb" id="<? echo $arItemIDs['QUANTITY_UP']; ?>">+</a>
    			<!--<span class="bx_cnt_desc" id="<? echo $arItemIDs['QUANTITY_MEASURE']; ?>"><? echo (isset($arResult['CATALOG_MEASURE_NAME']) ? $arResult['CATALOG_MEASURE_NAME'] : ''); ?></span>-->
    			</span> </div>
    		<span class="item_buttons_counter_block" id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" style="display: <? echo ($canBuy ? '' : 'none'); ?>;">
    <?
    	if ($showBuyBtn)
    	{
    ?>			
    			<a href="javascript:void(0);" id="<? echo $arItemIDs['BUY_LINK']; ?>" class="btn btn-default btn-sm"><? echo $buyBtnMessage; ?></a>
    			<!--<a href="javascript:void(0);" class="bx_big bx_bt_button bx_cart" id="<? echo $arItemIDs['BUY_LINK']; ?>"><span></span><? echo $buyBtnMessage; ?></a>-->
    <?
    	}
    	if ($showAddBtn)
    	{
    ?>			<a href="javascript:void(0);" id="<? echo $arItemIDs['ADD_BASKET_LINK']; ?>" class="btn btn-default btn-sm"><? echo $addToBasketBtnMessage; ?></a>
    			<!--<a href="javascript:void(0);" class="bx_big bx_bt_button bx_cart" id="<? echo $arItemIDs['ADD_BASKET_LINK']; ?>"><span></span><? echo $addToBasketBtnMessage; ?></a>-->
    <?
    	}
    ?>
    		</span>
    
    		<?if($showSubscribeBtn)
    		{
    			$APPLICATION->includeComponent('bitrix:catalog.product.subscribe','',
    				array(
    					'PRODUCT_ID' => $arResult['ID'],
    					'BUTTON_ID' => $arItemIDs['SUBSCRIBE_LINK'],
    					'BUTTON_CLASS' => 'bx_big bx_bt_button',
    					'DEFAULT_DISPLAY' => !$canBuy,
    				),
    				$component, array('HIDE_ICONS' => 'Y')
    			);
    		}?>
    
    		<br>
    		<span id="<? echo $arItemIDs['NOT_AVAILABLE_MESS']; ?>" class="bx_notavailable<?=($showSubscribeBtn ? ' bx_notavailable_subscribe' : ''); ?>" style="display: <? echo (!$canBuy ? '' : 'none'); ?>;"><? echo $notAvailableMessage; ?></span>
    	<? if ($arParams['DISPLAY_COMPARE'])
    	{
    		?>
    		<span class="item_buttons_counter_block">
    			<a href="javascript:void(0);" class="bx_big bx_bt_button_type_2 bx_cart" id="<? echo $arItemIDs['COMPARE_LINK']; ?>"><? echo $compareBtnMessage; ?></a>
    		</span>
    	<?} ?>
    
    	</div>
    
    	<? if ('Y' == $arParams['SHOW_MAX_QUANTITY'])
    	{
    		if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
    		{
    ?>
    	<p id="<? echo $arItemIDs['QUANTITY_LIMIT']; ?>" style="display: none;"><? echo GetMessage('OSTATOK'); ?>: <span></span></p>
    <?
    		}
    		else
    		{
    			if ('Y' == $arResult['CATALOG_QUANTITY_TRACE'] && 'N' == $arResult['CATALOG_CAN_BUY_ZERO'])
    			{
    ?>
    	<p id="<? echo $arItemIDs['QUANTITY_LIMIT']; ?>"><? echo GetMessage('OSTATOK'); ?>: <span><? echo $arResult['CATALOG_QUANTITY']; ?></span></p>
    <?
    			}
    		}
    	}
    }
    else
    {
    ?>
    	<div class="item_buttons vam">
    		<span class="item_buttons_counter_block" id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" style="display: <? echo ($canBuy ? '' : 'none'); ?>;">
    <?
    	if ($showBuyBtn)
    	{
    ?>
    			<a href="javascript:void(0);" class="bx_big bx_bt_button bx_cart" id="<? echo $arItemIDs['BUY_LINK']; ?>"><span></span><? echo $buyBtnMessage; ?></a>
    <?
    	}
    	if ($showAddBtn)
    	{
    ?>
    		<a href="javascript:void(0);" class="bx_big bx_bt_button bx_cart" id="<? echo $arItemIDs['ADD_BASKET_LINK']; ?>"><span></span><? echo $addToBasketBtnMessage; ?></a>
    <?
    	}
    ?>
    		</span>
    		<?if($showSubscribeBtn)
    		{
    			$APPLICATION->IncludeComponent('bitrix:catalog.product.subscribe','',
    				array(
    					'PRODUCT_ID' => $arResult['ID'],
    					'BUTTON_ID' => $arItemIDs['SUBSCRIBE_LINK'],
    					'BUTTON_CLASS' => 'bx_big bx_bt_button',
    					'DEFAULT_DISPLAY' => !$canBuy,
    				),
    				$component, array('HIDE_ICONS' => 'Y')
    			);
    		}?>
    		<br>
    		<span id="<? echo $arItemIDs['NOT_AVAILABLE_MESS']; ?>" class="bx_notavailable<?=($showSubscribeBtn ? ' bx_notavailable_subscribe' : ''); ?>" style="display: <? echo (!$canBuy ? '' : 'none'); ?>;"><? echo $notAvailableMessage; ?></span>
    	<?if($arParams['DISPLAY_COMPARE'])
    	{
    		?>
    			<span class="item_buttons_counter_block">
    		<? if ($arParams['DISPLAY_COMPARE'])
    		{
    			?><a href="javascript:void(0);" class="bx_big bx_bt_button_type_2 bx_cart" id="<? echo $arItemIDs['COMPARE_LINK']; ?>"><? echo $compareBtnMessage; ?></a><?
    		} ?>
    			</span>
    	<?}?>
    	</div>
    <?
    }
    unset($showAddBtn, $showBuyBtn);
    ?>
    </div><!-- col-sm -->
    <script>
            $(document).ready(function() {
               $('.demo-modal-btn').click(function(e) {
                  $('#type_zayavka').children('input').attr('value', $(this).text()); 
                  $('#type_product').children('input').attr('value', $('#product_name').text());
                  $('#form-title').text($(this).attr('data-title-form'));
               }); 
            });
        </script>
    
    </div>
    <!-- ПОДСЧЕТ ЦЕНЫ CLOSE -->
    </div>
    
    <div class="clb"></div>
    
    
    
    
    	</div> <!-- BX_RT -->
    </div>
    	</div>
    		
        </div>
        
        
        
    </div>
        
        
        
   
        <div class="col-sm-8">
            
            <div class="col-sm-4" id="full-color">
                <div class="bx_md">
                <div class="item_info_section">
                <?
                if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
                {
                	if ($arResult['OFFER_GROUP'])
                	{
                		foreach ($arResult['OFFER_GROUP_VALUES'] as $offerID)
                		{
                ?>
                	<span id="<? echo $arItemIDs['OFFER_GROUP'].$offerID; ?>" style="display: none;">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor",
                	".default",
                	array(
                		"IBLOCK_ID" => $arResult["OFFERS_IBLOCK"],
                		"ELEMENT_ID" => $offerID,
                		"PRICE_CODE" => $arParams["PRICE_CODE"],
                		"BASKET_URL" => $arParams["BASKET_URL"],
                		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
                		"CACHE_TIME" => $arParams["CACHE_TIME"],
                		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                		"TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME'],
                		"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
                		"CURRENCY_ID" => $arParams["CURRENCY_ID"]
                	),
                	$component,
                	array("HIDE_ICONS" => "Y")
                );?><?
                ?>
                	</span>
                <?
                		}
                	}
                }
                else
                {
                	if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
                	{
                ?><?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor",
                	".default",
                	array(
                		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
                		"ELEMENT_ID" => $arResult["ID"],
                		"PRICE_CODE" => $arParams["PRICE_CODE"],
                		"BASKET_URL" => $arParams["BASKET_URL"],
                		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
                		"CACHE_TIME" => $arParams["CACHE_TIME"],
                		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                		"TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME'],
                		"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
                		"CURRENCY_ID" => $arParams["CURRENCY_ID"]
                	),
                	$component,
                	array("HIDE_ICONS" => "Y")
                );?><?
                	}
                }
                
                if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled("sale"))
                {
                	$APPLICATION->IncludeComponent("bitrix:sale.gift.product", ".default", array(
                			'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                			'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
                			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
                			'SUBSCRIBE_URL_TEMPLATE' => $arResult['~SUBSCRIBE_URL_TEMPLATE'],
                			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
                
                			"SHOW_DISCOUNT_PERCENT" => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
                			"SHOW_OLD_PRICE" => $arParams['GIFTS_SHOW_OLD_PRICE'],
                			"PAGE_ELEMENT_COUNT" => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
                			"LINE_ELEMENT_COUNT" => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
                			"HIDE_BLOCK_TITLE" => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
                			"BLOCK_TITLE" => $arParams['GIFTS_DETAIL_BLOCK_TITLE'],
                			"TEXT_LABEL_GIFT" => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
                			"SHOW_NAME" => $arParams['GIFTS_SHOW_NAME'],
                			"SHOW_IMAGE" => $arParams['GIFTS_SHOW_IMAGE'],
                			"MESS_BTN_BUY" => $arParams['GIFTS_MESS_BTN_BUY'],
                
                			"SHOW_PRODUCTS_{$arParams['IBLOCK_ID']}" => "Y",
                			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                			"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
                			"MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
                			"MESS_BTN_SUBSCRIBE" => $arParams["MESS_BTN_SUBSCRIBE"],
                			"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                			"PRICE_CODE" => $arParams["PRICE_CODE"],
                			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                			"BASKET_URL" => $arParams["BASKET_URL"],
                			"ADD_PROPERTIES_TO_BASKET" => $arParams["ADD_PROPERTIES_TO_BASKET"],
                			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                			"PARTIAL_PRODUCT_PROPERTIES" => $arParams["PARTIAL_PRODUCT_PROPERTIES"],
                			"USE_PRODUCT_QUANTITY" => 'N',
                			"OFFER_TREE_PROPS_{$arResult['OFFERS_IBLOCK']}" => $arParams['OFFER_TREE_PROPS'],
                			"CART_PROPERTIES_{$arResult['OFFERS_IBLOCK']}" => $arParams['OFFERS_CART_PROPERTIES'],
                			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                			"POTENTIAL_PRODUCT_TO_BUY" => array(
                				'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
                				'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
                				'PRODUCT_PROVIDER_CLASS' => isset($arResult['PRODUCT_PROVIDER_CLASS']) ? $arResult['PRODUCT_PROVIDER_CLASS'] : 'CCatalogProductProvider',
                				'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
                				'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,
                
                				'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][0]['ID']) ? $arResult['OFFERS'][0]['ID'] : null,
                				'SECTION' => array(
                					'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
                					'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
                					'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
                					'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
                				),
                			)
                		), $component, array("HIDE_ICONS" => "Y"));
                }
                if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled("sale"))
                {
                	$APPLICATION->IncludeComponent(
                			"bitrix:sale.gift.main.products",
                			".default",
                			array(
                				"PAGE_ELEMENT_COUNT" => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
                				"BLOCK_TITLE" => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],
                
                				"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
                				"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
                
                				"AJAX_MODE" => $arParams["AJAX_MODE"],
                				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
                
                				"ELEMENT_SORT_FIELD" => 'ID',
                				"ELEMENT_SORT_ORDER" => 'DESC',
                				//"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                				//"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                				"FILTER_NAME" => 'searchFilter',
                				"SECTION_URL" => $arParams["SECTION_URL"],
                				"DETAIL_URL" => $arParams["DETAIL_URL"],
                				"BASKET_URL" => $arParams["BASKET_URL"],
                				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                
                				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
                				"CACHE_TIME" => $arParams["CACHE_TIME"],
                
                				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                				"SET_TITLE" => $arParams["SET_TITLE"],
                				"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
                				"PRICE_CODE" => $arParams["PRICE_CODE"],
                				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                
                				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                				"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                				"CURRENCY_ID" => $arParams["CURRENCY_ID"],
                				"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                				"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"]) ? $arParams["TEMPLATE_THEME"] : ""),
                
                				"ADD_PICT_PROP" => (isset($arParams["ADD_PICT_PROP"]) ? $arParams["ADD_PICT_PROP"] : ""),
                
                				"LABEL_PROP" => (isset($arParams["LABEL_PROP"]) ? $arParams["LABEL_PROP"] : ""),
                				"OFFER_ADD_PICT_PROP" => (isset($arParams["OFFER_ADD_PICT_PROP"]) ? $arParams["OFFER_ADD_PICT_PROP"] : ""),
                				"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"]) ? $arParams["OFFER_TREE_PROPS"] : ""),
                				"SHOW_DISCOUNT_PERCENT" => (isset($arParams["SHOW_DISCOUNT_PERCENT"]) ? $arParams["SHOW_DISCOUNT_PERCENT"] : ""),
                				"SHOW_OLD_PRICE" => (isset($arParams["SHOW_OLD_PRICE"]) ? $arParams["SHOW_OLD_PRICE"] : ""),
                				"MESS_BTN_BUY" => (isset($arParams["MESS_BTN_BUY"]) ? $arParams["MESS_BTN_BUY"] : ""),
                				"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["MESS_BTN_ADD_TO_BASKET"]) ? $arParams["MESS_BTN_ADD_TO_BASKET"] : ""),
                				"MESS_BTN_DETAIL" => (isset($arParams["MESS_BTN_DETAIL"]) ? $arParams["MESS_BTN_DETAIL"] : ""),
                				"MESS_NOT_AVAILABLE" => (isset($arParams["MESS_NOT_AVAILABLE"]) ? $arParams["MESS_NOT_AVAILABLE"] : ""),
                				'ADD_TO_BASKET_ACTION' => (isset($arParams["ADD_TO_BASKET_ACTION"]) ? $arParams["ADD_TO_BASKET_ACTION"] : ""),
                				'SHOW_CLOSE_POPUP' => (isset($arParams["SHOW_CLOSE_POPUP"]) ? $arParams["SHOW_CLOSE_POPUP"] : ""),
                				'DISPLAY_COMPARE' => (isset($arParams['DISPLAY_COMPARE']) ? $arParams['DISPLAY_COMPARE'] : ''),
                				'COMPARE_PATH' => (isset($arParams['COMPARE_PATH']) ? $arParams['COMPARE_PATH'] : ''),
                			)
                			+ array(
                				'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']) ? $arResult['ID'] : $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
                				'SECTION_ID' => $arResult['SECTION']['ID'],
                				'ELEMENT_ID' => $arResult['ID'],
                			),
                			$component,
                			array("HIDE_ICONS" => "Y")
                	);
                }
                ?>
                </div>
                </div>
            	<div class="" style="margin-bottom: 100px">
            		<div class="row m0 centried">
            		    <span>
                		<ul class="detail_product_section">
                		    <li><a><i class="fa fa-truck" ></i>Доставка</a></li>
                		    <li><a><i class="fa fa-cogs"></i>Установка</li>
                		    <li><a><i class="fa fa-graduation-cap"></i>Обучение</li>
                		    <li><a><i class="fa fa-refresh"></i>Обновление</li>
                		    <li><a><i class="fa fa-sliders"></i>Настройка</li>
                		    <li><a><i class="fa fa-paper-plane"></i>Консультация</li>
                		</ul>
                		</span>
            		</div>
        	    </div>
            </div>
    	</div>
    </div>  
</div>	

        <?if(!empty($arResult['PROPERTIES']['CUSTOM_CONTENT']['~VALUE']['TEXT'])):?>
        <div class="container" style="padding: 0px 50px;">
            <?=$arResult['PROPERTIES']['CUSTOM_CONTENT']['~VALUE']['TEXT']?>
        </div>
        <?endif;?>
        
        <?if($arResult['PROPERTIES']['FREE_CALL_FORM']['VALUE_XML_ID'] == 'free_call_on'):?>
        <style>
         .shop-content {
            padding-bottom: 0;
         }
         .media.product.product-details {
            padding-bottom: 0;
         }
        </style>
        <!--Free Analysis-->
      	<section class="row free-analysis" id="free-analysis" style="position: static;clear: both;">
      		<div class="container">
      		    
      		    <div class="col-sm-12 p0">
          		    <div class="col-sm-6">   
              			<div class="row">
              				<div class="col-sm-12">
              					<h2 class="this-title"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/include_areas/services/service-3/free_h.php');?></h2>
              					<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/include_areas/services/service-3/free_desc.php');?>
              				</div>
              			</div>
              			<div class="row" id="red_form-input">
              				<div class="col-sm-12">
              					<div class="row free-analysis-form style2">
              					    
              					<script> 
                                     $(document).ready(function() {
                                        $('#service_id').children().attr('value','Облачный сервис')
                                     });
                                </script>
              				 <?	 
                    			$APPLICATION->IncludeComponent(
                                	"bitrix:form.result.new", 
                                	"centr_new", 
                                	array(
                                		"CACHE_TIME" => "3600",
                                		"CACHE_TYPE" => "A",
                                		"CHAIN_ITEM_LINK" => "",
                                		"CHAIN_ITEM_TEXT" => "",
                                		"COMPONENT_TEMPLATE" => "centr_new",
                                		"EDIT_URL" => "",
                                		"IGNORE_CUSTOM_TEMPLATE" => "N",
                                		"LIST_URL" => "",
                                		"SEF_MODE" => "N",
                                		"SUCCESS_URL" => "",
                                		"AJAX_MODE" => "Y",
                                		"AJAX_OPTION_SHADOW" => "N",
                                		"AJAX_OPTION_JUMP" => "Y",
                                		"AJAX_OPTION_STYLE" => "Y",
                                		"AJAX_OPTION_HISTORY" => "N",
                                		"USE_EXTENDED_ERRORS" => "Y",
                                		"WEB_FORM_ID" => "4",
                                		"VARIABLE_ALIASES" => array(
                                			"WEB_FORM_ID" => "WEB_FORM_ID",
                                			"RESULT_ID" => "RESULT_ID",
                                		)
                                	),
                                	false
                                );	?>
              					</div>
              				</div>
              			</div>
          			</div> 
          			<div class="col-sm-6">
          			     <div class="bx_lt" style="width: 120%">
                            <div class="bx_item_slider" id="<? echo $arItemIDs['BIG_SLIDER_ID']; ?>">
                            	<div class="bx_bigimages" id="<? echo $arItemIDs['BIG_IMG_CONT_ID']; ?>">
                            	<div class="bx_bigimages_imgcontainer">
                            	<span class="bx_bigimages_aligner">
                            
                            		<div class="media-left">
                            	<div class="img-holder" style="margin-top:0">
                              		<img src="<? echo $arFirstPhoto['SRC']; ?>" id="<? echo $arItemIDs['PICT']; ?>" alt="<? echo $strAlt; ?>" title="<? echo $strTitle; ?>" class="product-img">
                              		<!--<div class="sale-new-tag">sale</div>-->
                              	</div>
                              		</div>
                            	<!--<img id="<? echo $arItemIDs['PICT']; ?>" src="<? echo $arFirstPhoto['SRC']; ?>" alt="<? echo $strAlt; ?>" title="<? echo $strTitle; ?>" class="product-img">-->
                            	<!--<img id="<? echo $arItemIDs['PICT']; ?>" src="<? echo $arFirstPhoto['SRC']; ?>" alt="<? echo $strAlt; ?>" title="<? echo $strTitle; ?>">-->
                            
                            	</span>
                            <?
                            if ('Y' == $arParams['SHOW_DISCOUNT_PERCENT'])
                            {
                            	if (!isset($arResult['OFFERS']) || empty($arResult['OFFERS']))
                            	{
                            		if (0 < $arResult['MIN_PRICE']['DISCOUNT_DIFF'])
                            		{
                            ?>
                            	<div class="bx_stick_disc right bottom" id="<? echo $arItemIDs['DISCOUNT_PICT_ID'] ?>"><? echo -$arResult['MIN_PRICE']['DISCOUNT_DIFF_PERCENT']; ?>%</div>
                            <?
                            		}
                            	}
                            	else
                            	{
                            ?>
                            	<div class="bx_stick_disc right bottom" id="<? echo $arItemIDs['DISCOUNT_PICT_ID'] ?>" style="display: none;"></div>
                            <?
                            	}
                            }
                            ?>
                            	<div class="bx_stick average left top" <?= (empty($arResult['LABEL'])? 'style="display:none;"' : '' ) ?> id="<? echo $arItemIDs['STICKER_ID'] ?>" title="<? echo $arResult['LABEL_VALUE']; ?>"><? echo $arResult['LABEL_VALUE']; ?></div>
                            	</div>
                            	</div>
                            <?
                            if ($arResult['SHOW_SLIDER'])
                            {
                            	if (!isset($arResult['OFFERS']) || empty($arResult['OFFERS']))
                            	{
                            		if (5 < $arResult['MORE_PHOTO_COUNT'])
                            		{
                            			$strClass = 'bx_slider_conteiner full';
                            			$strOneWidth = (100/$arResult['MORE_PHOTO_COUNT']).'%';
                            			$strWidth = (20*$arResult['MORE_PHOTO_COUNT']).'%';
                            			$strSlideStyle = '';
                            		}
                            		else
                            		{
                            			$strClass = 'bx_slider_conteiner';
                            			$strOneWidth = '20%';
                            			$strWidth = '100%';
                            			$strSlideStyle = 'display: none;';
                            		}
                            ?>
                            	<div class="<? echo $strClass; ?>" id="<? echo $arItemIDs['SLIDER_CONT_ID']; ?>">
                            	<div class="bx_slider_scroller_container" style="display: none">
                            	<div class="bx_slide">
                            	<ul style="width: <? echo $strWidth; ?>;" id="<? echo $arItemIDs['SLIDER_LIST']; ?>">
                            <?
                            		foreach ($arResult['MORE_PHOTO'] as &$arOnePhoto)
                            		{
                            ?>
                            	<li data-value="<? echo $arOnePhoto['ID']; ?>" style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>;">
                            	<span class="cnt">
                            
                            
                            
                            		<span class="cnt_item" style="background-image:url('<? echo $arOnePhoto['SRC']; ?>');">
                            		
                            	</span>
                            	</span></li>
                            <?
                            		}
                            		unset($arOnePhoto);
                            ?>
                            	</ul>
                            	</div>
                            	<div class="bx_slide_left" id="<? echo $arItemIDs['SLIDER_LEFT']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                            	<div class="bx_slide_right" id="<? echo $arItemIDs['SLIDER_RIGHT']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                            	</div>
                            	</div>
                            <?
                            	}
                            	else
                            	{
                            		foreach ($arResult['OFFERS'] as $key => $arOneOffer)
                            		{
                            			if (!isset($arOneOffer['MORE_PHOTO_COUNT']) || 0 >= $arOneOffer['MORE_PHOTO_COUNT'])
                            				continue;
                            			$strVisible = ($key == $arResult['OFFERS_SELECTED'] ? '' : 'none');
                            			if (5 < $arOneOffer['MORE_PHOTO_COUNT'])
                            			{
                            				$strClass = 'bx_slider_conteiner full';
                            				$strOneWidth = (100/$arOneOffer['MORE_PHOTO_COUNT']).'%';
                            				$strWidth = (20*$arOneOffer['MORE_PHOTO_COUNT']).'%';
                            				$strSlideStyle = '';
                            			}
                            			else
                            			{
                            				$strClass = 'bx_slider_conteiner';
                            				$strOneWidth = '20%';
                            				$strWidth = '100%';
                            				$strSlideStyle = 'display: none;';
                            			}
                            ?>
                            	<div class="<? echo $strClass; ?>" id="<? echo $arItemIDs['SLIDER_CONT_OF_ID'].$arOneOffer['ID']; ?>" style="display: <? echo $strVisible; ?>;">
                            	<div class="bx_slider_scroller_container" style="display: none">
                            	<div class="bx_slide">
                            	<ul style="width: <? echo $strWidth; ?>;" id="<? echo $arItemIDs['SLIDER_LIST_OF_ID'].$arOneOffer['ID']; ?>">
                            <?
                            			foreach ($arOneOffer['MORE_PHOTO'] as &$arOnePhoto)
                            			{
                            ?>
                            	<li data-value="<? echo $arOneOffer['ID'].'_'.$arOnePhoto['ID']; ?>" style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>"><span class="cnt"><span class="cnt_item" style="background-image:url('<? echo $arOnePhoto['SRC']; ?>');"></span></span></li>
                            <?
                            			}
                            			unset($arOnePhoto);
                            ?>
                            	</ul>
                            	</div>
                            	<div class="bx_slide_left" id="<? echo $arItemIDs['SLIDER_LEFT_OF_ID'].$arOneOffer['ID'] ?>" style="<? echo $strSlideStyle; ?>" data-value="<? echo $arOneOffer['ID']; ?>"></div>
                            	<div class="bx_slide_right" id="<? echo $arItemIDs['SLIDER_RIGHT_OF_ID'].$arOneOffer['ID'] ?>" style="<? echo $strSlideStyle; ?>" data-value="<? echo $arOneOffer['ID']; ?>"></div>
                            	</div>
                            	</div>
                            <?
                            		}
                            	}
                            }
                            ?>
                            </div>
                            </div> <!-- bx_lt -->
          			</div>
      			</div>
      			
      		</div>
      	</section>
        <?endif;?>
        
        
        
        
        
        
        
        
		<!-- BX_RB 
		<div class="bx_rb">
			<div class="item_info_section">
			<?
			if ('' != $arResult['DETAIL_TEXT'])
			{
			?>
				<div class="bx_item_description">
					<div class="bx_item_section_name_gray" style="border-bottom: 1px solid #f2f2f2;"><? echo GetMessage('FULL_DESCRIPTION'); ?></div>
			<?
				if ('html' == $arResult['DETAIL_TEXT_TYPE'])
				{
					echo $arResult['DETAIL_TEXT'];
				}
				else
				{
					?><p><? echo $arResult['DETAIL_TEXT']; ?></p><?
				}
			?>
				</div>
			<?
			}
			?>
			</div>
		</div>
		<!-- BX_RB CLOSE -->

		<!-- BX_LB CLOSE 
		<div class="bx_lb">
			<div class="tac ovh">
			</div>
			<div class="tab-section-container">
			<?
			if ('Y' == $arParams['USE_COMMENTS'])
			{
			?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.comments",
				"",
				array(
					"ELEMENT_ID" => $arResult['ID'],
					"ELEMENT_CODE" => "",
					"IBLOCK_ID" => $arParams['IBLOCK_ID'],
					"SHOW_DEACTIVATED" => $arParams['SHOW_DEACTIVATED'],
					"URL_TO_COMMENT" => "",
					"WIDTH" => "",
					"COMMENTS_COUNT" => "5",
					"BLOG_USE" => $arParams['BLOG_USE'],
					"FB_USE" => $arParams['FB_USE'],
					"FB_APP_ID" => $arParams['FB_APP_ID'],
					"VK_USE" => $arParams['VK_USE'],
					"VK_API_ID" => $arParams['VK_API_ID'],
					"CACHE_TYPE" => $arParams['CACHE_TYPE'],
					"CACHE_TIME" => $arParams['CACHE_TIME'],
					'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
					"BLOG_TITLE" => "",
					"BLOG_URL" => $arParams['BLOG_URL'],
					"PATH_TO_SMILE" => "",
					"EMAIL_NOTIFY" => $arParams['BLOG_EMAIL_NOTIFY'],
					"AJAX_POST" => "Y",
					"SHOW_SPAM" => "Y",
					"SHOW_RATING" => "N",
					"FB_TITLE" => "",
					"FB_USER_ADMIN_ID" => "",
					"FB_COLORSCHEME" => "light",
					"FB_ORDER_BY" => "reverse_time",
					"VK_TITLE" => "",
					"TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME']
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);?>
			<?
			}
			?>
			</div>
		</div>
		<!-- BX_LB CLOSE -->


			<div style="clear: both;"></div>
	</div>
	<div class="clb"></div>
</div><?
if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
{
	foreach ($arResult['JS_OFFERS'] as &$arOneJS)
	{
		if ($arOneJS['PRICE']['DISCOUNT_VALUE'] != $arOneJS['PRICE']['VALUE'])
		{
			$arOneJS['PRICE']['DISCOUNT_DIFF_PERCENT'] = -$arOneJS['PRICE']['DISCOUNT_DIFF_PERCENT'];
			$arOneJS['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'] = -$arOneJS['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'];
		}
		$strProps = '';
		if ($arResult['SHOW_OFFERS_PROPS'])
		{
			if (!empty($arOneJS['DISPLAY_PROPERTIES']))
			{
				foreach ($arOneJS['DISPLAY_PROPERTIES'] as $arOneProp)
				{
					$strProps .= '<dt>'.$arOneProp['NAME'].'</dt><dd>'.(
						is_array($arOneProp['VALUE'])
						? implode(' / ', $arOneProp['VALUE'])
						: $arOneProp['VALUE']
					).'</dd>';
				}
			}
		}
		$arOneJS['DISPLAY_PROPERTIES'] = $strProps;
	}
	if (isset($arOneJS))
		unset($arOneJS);
	$arJSParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => true,
			'SHOW_DISCOUNT_PERCENT' => ($arParams['SHOW_DISCOUNT_PERCENT'] == 'Y'),
			'SHOW_OLD_PRICE' => ($arParams['SHOW_OLD_PRICE'] == 'Y'),
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
			'OFFER_GROUP' => $arResult['OFFER_GROUP'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'SHOW_BASIS_PRICE' => ($arParams['SHOW_BASIS_PRICE'] == 'Y'),
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribeBtn,
		),
		'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
		'VISUAL' => array(
			'ID' => $arItemIDs['ID'],
		),
		'DEFAULT_PICTURE' => array(
			'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
			'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
		),
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'NAME' => $arResult['~NAME']
		),
		'BASKET' => array(
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'BASKET_URL' => $arParams['BASKET_URL'],
			'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		),
		'OFFERS' => $arResult['JS_OFFERS'],
		'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
		'TREE_PROPS' => $arSkuProps
	);
	if ($arParams['DISPLAY_COMPARE'])
	{
		$arJSParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}
}
else
{
	$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
	if ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET'] && !$emptyProductProperties)
	{
?>
<div id="<? echo $arItemIDs['BASKET_PROP_DIV']; ?>" style="display: none;">
<?
		if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
		{
			foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
			{
?>
	<input type="hidden" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo htmlspecialcharsbx($propInfo['ID']); ?>">
<?
				if (isset($arResult['PRODUCT_PROPERTIES'][$propID]))
					unset($arResult['PRODUCT_PROPERTIES'][$propID]);
			}
		}
		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if (!$emptyProductProperties)
		{
?>
	<table>
<?
			foreach ($arResult['PRODUCT_PROPERTIES'] as $propID => $propInfo)
			{
?>
	<tr><td><? echo $arResult['PROPERTIES'][$propID]['NAME']; ?></td>
	<td>
<?
				if(
					'L' == $arResult['PROPERTIES'][$propID]['PROPERTY_TYPE']
					&& 'C' == $arResult['PROPERTIES'][$propID]['LIST_TYPE']
				)
				{
					foreach($propInfo['VALUES'] as $valueID => $value)
					{
						?><label><input type="radio" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? '"checked"' : ''); ?>><? echo $value; ?></label><br><?
					}
				}
				else
				{
					?><select name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]"><?
					foreach($propInfo['VALUES'] as $valueID => $value)
					{
						?><option value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? '"selected"' : ''); ?>><? echo $value; ?></option><?
					}
					?></select><?
				}
?>
	</td></tr>
<?
			}
?>
	</table>
<?
		}
?>
</div>
<?
	}
	if ($arResult['MIN_PRICE']['DISCOUNT_VALUE'] != $arResult['MIN_PRICE']['VALUE'])
	{
		$arResult['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] = -$arResult['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'];
		$arResult['MIN_BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'] = -$arResult['MIN_BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'];
	}
	$arJSParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => (isset($arResult['MIN_PRICE']) && !empty($arResult['MIN_PRICE']) && is_array($arResult['MIN_PRICE'])),
			'SHOW_DISCOUNT_PERCENT' => ($arParams['SHOW_DISCOUNT_PERCENT'] == 'Y'),
			'SHOW_OLD_PRICE' => ($arParams['SHOW_OLD_PRICE'] == 'Y'),
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'SHOW_BASIS_PRICE' => ($arParams['SHOW_BASIS_PRICE'] == 'Y'),
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribeBtn,
		),
		'VISUAL' => array(
			'ID' => $arItemIDs['ID'],
		),
		'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'PICT' => $arFirstPhoto,
			'NAME' => $arResult['~NAME'],
			'SUBSCRIPTION' => true,
			'PRICE' => $arResult['MIN_PRICE'],
			'BASIS_PRICE' => $arResult['MIN_BASIS_PRICE'],
			'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
			'SLIDER' => $arResult['MORE_PHOTO'],
			'CAN_BUY' => $arResult['CAN_BUY'],
			'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
			'QUANTITY_FLOAT' => is_double($arResult['CATALOG_MEASURE_RATIO']),
			'MAX_QUANTITY' => $arResult['CATALOG_QUANTITY'],
			'STEP_QUANTITY' => $arResult['CATALOG_MEASURE_RATIO'],
		),
		'BASKET' => array(
			'ADD_PROPS' => ($arParams['ADD_PROPERTIES_TO_BASKET'] == 'Y'),
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS' => $emptyProductProperties,
			'BASKET_URL' => $arParams['BASKET_URL'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		)
	);
	if ($arParams['DISPLAY_COMPARE'])
	{
		$arJSParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}
	unset($emptyProductProperties);
}
?>
<script type="text/javascript">
var <? echo $strObName; ?> = new JCCatalogElement(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
BX.message({
	ECONOMY_INFO_MESSAGE: '<? echo GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO'); ?>',
	BASIS_PRICE_MESSAGE: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_BASIS_PRICE') ?>',
	TITLE_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR') ?>',
	TITLE_BASKET_PROPS: '<? echo GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS') ?>',
	BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
	BTN_SEND_PROPS: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS'); ?>',
	BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
	BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE'); ?>',
	BTN_MESSAGE_CLOSE_POPUP: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP'); ?>',
	TITLE_SUCCESSFUL: '<? echo GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK'); ?>',
	COMPARE_MESSAGE_OK: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK') ?>',
	COMPARE_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
	COMPARE_TITLE: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE') ?>',
	BTN_MESSAGE_COMPARE_REDIRECT: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
	PRODUCT_GIFT_LABEL: '<? echo GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL') ?>',
	SITE_ID: '<? echo SITE_ID; ?>'
});
</script>
</div>
</div>