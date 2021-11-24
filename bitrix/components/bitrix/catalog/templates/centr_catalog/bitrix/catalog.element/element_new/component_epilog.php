<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;



if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
if (isset($templateData['TEMPLATE_LIBRARY']) && !empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
		$loadCurrency = Loader::includeModule('currency');
	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
	?>
	<script type="text/javascript">
		BX.Currency.setCurrencies(<? echo $templateData['CURRENCIES']; ?>);
	</script>
<?
	}
}
if (isset($templateData['JS_OBJ']))
{
?>
<script type="text/javascript">
BX.ready(BX.defer(function(){
	if (!!window.<? echo $templateData['JS_OBJ']; ?>)
	{
		window.<? echo $templateData['JS_OBJ']; ?>.allowViewedCount(true);
	}
}));
</script><?
}
?>
<? global $USER;
   if ($USER->IsAdmin()){ ?>

<?/*
$res = CIBlockElement::GetList(array(), array('ID'=>$arResult['ID']), false, false, array('ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL'));
if ($arElement = $res->GetNext())
{
   //echo "<pre>"; print_r($arElement); echo "</pre>";
}
echo $arElement['~DETAIL_PAGE_URL'];

if ( $_SERVER['REQUEST_URI'] != $arElement['~DETAIL_PAGE_URL'] ){
LocalRedirect($arElement['~DETAIL_PAGE_URL'],301);
}*/
?> 
<?/*if ( ($_SERVER['REQUEST_URI']) != $arResult['SECTION']['~SECTION_PAGE_URL'] and
!strripos($_SERVER['REQUEST_URI'], trim($arResult['SECTION']['~SECTION_PAGE_URL'], '/'))):*/?>
<?// LocalRedirect($arResult['~DETAIL_PAGE_URL'],301);?>


<?/*endif;*/?>
<?}?>


<?/* Редирект со старых ЧПУ / Redirect so starih URI */?>
<?
$res = CIBlockElement::GetByID($arResult['ID']);
if($ar = $res->GetNext()){
$res = CIBlockSection::GetByID($ar['IBLOCK_SECTION_ID']);
if($ar_res = $res->GetNext())
    $section=$ar_res['CODE'];
}
$url = '/'.$section."/".$ar['CODE'].'/';
if( $url != $APPLICATION->GetCurPage(false)) {
    echo $url;
    LocalRedirect($url, false, '301 Moved permanently');
}
?>

