<?
/*if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
$aMenuLinksExt = array();

if(CModule::IncludeModule('iblock'))
{
	$arFilter = array(
		"TYPE" => "catalog",
		"SITE_ID" => SITE_ID,
	);

	$dbIBlock = CIBlock::GetList(array('SORT' => 'ASC', 'ID' => 'ASC'), $arFilter);
	$dbIBlock = new CIBlockResult($dbIBlock);


    $aMenuLinksNew[$menuIndex++] = array(
      htmlspecialcharsbx($arSection["~NAME"]),
      $arSection["~SECTION_PAGE_URL"],
      $arResult["ELEMENT_LINKS"][$arSection["ID"]],
      array(
         "FROM_IBLOCK" => true,
         "PICTURE" => $arSection["PICTURE"],
         "IS_PARENT" => false,
         "DEPTH_LEVEL" => $arSection["DEPTH_LEVEL"],
      ),
   );

	if ($arIBlock = $dbIBlock->GetNext())
	{
		if(defined("BX_COMP_MANAGED_CACHE"))
			$GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_".$arIBlock["ID"]);

		if($arIBlock["ACTIVE"] == "Y")
		{
			$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
				"IS_SEF" => "Y",
				"SEF_BASE_URL" => "",
				"SECTION_PAGE_URL" => $arIBlock['SECTION_PAGE_URL'],
				"DETAIL_PICTURE" => $arIBlock['DETAIL_PICTURE'],
				"DETAIL_PAGE_URL" => $arIBlock['DETAIL_PAGE_URL'],
				"IBLOCK_TYPE" => $arIBlock['IBLOCK_TYPE_ID'],
				"IBLOCK_ID" => $arIBlock['ID'],
				"DEPTH_LEVEL" => "3",
				"CACHE_TYPE" => "N",
			), false, Array('HIDE_ICONS' => 'Y'));
		}
	}

	if(defined("BX_COMP_MANAGED_CACHE"))
		$GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_new");
}
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);*/
?>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php
global $APPLICATION;

$aMenuItems = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
      "IS_SEF" => "Y",
      "SEF_BASE_URL" => "/",
      "SECTION_PAGE_URL" => "#SECTION_CODE#/",
      "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_ID#/",
      "IBLOCK_TYPE" => "soft1c",
      "IBLOCK_ID" => "2",
      "DEPTH_LEVEL" => "3",
      "CACHE_TYPE" => "A",
      "CACHE_TIME" => "3600"
   ),
   false
);

$iDepthLevel = 1;
$aMenuLinksExt = array();
foreach ($aMenuItems as $aItem) {
   if ($aItem[3]["DEPTH_LEVEL"] == $iDepthLevel)
      continue;
   
   if ($aItem[3]["DEPTH_LEVEL"] > $iDepthLevel)
      $aItem[3]["DEPTH_LEVEL"]--;
   
   $aMenuLinksExt[] = $aItem;
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>