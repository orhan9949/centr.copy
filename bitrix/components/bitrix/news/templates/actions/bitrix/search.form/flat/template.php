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
$this->setFrameMode(true);?>


<div class="search-form">
<form action="<?=$arResult["FORM_ACTION"]?>" class="row m0 search-form">
	<div class="input-group">
	<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"",
				array(
					"NAME" => "q",
					"VALUE" => "",
					"INPUT_SIZE" => 15,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
	);?><?else:?>		
	<input type="text" class="form-control" placeholder="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>..." name="q" value="" maxlength="50" /><?endif;?>
	<span class="input-group-addon">
		<button type="submit" name="s"><i class="fa fa-search"></i></button>
		<!--<input name="s" type="submit" value="" />-->
	</span>
	</div>
</form>
</div>