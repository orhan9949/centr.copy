<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetPageProperty("description", $arResult['ITEMS']['NAME']);
$APPLICATION->SetPageProperty("keywords", $arResult['ITEMS']['NAME']);
$APPLICATION->SetPageProperty("title", $arResult['ITEMS']['NAME']);
$APPLICATION->SetTitle($arResult['ITEMS']['NAME']);
?>

<?/*
echo '<xmp>';
print_r($arResult);
echo '</xmp>';*/
?>

<section class="cd-section">
		<div class="cd-block">
			<div class="about-top" style="background: url(<?=CFile::GetPath($arResult['ITEMS']['DETAIL_PICTURE'])?>) no-repeat top center;">
			
				<div class="big-text-pages-top">
					<h1><?=$arResult['ITEMS']['NAME']?></h1>
				</div>
				
				<a href="#scroll-link" class="scroll scroll-down"></a>
				
			</div>
		</div>
	</section> <!-- .cd-section --> 

	<section class="section white-background padding-top-bottom shadow-sec" id="scroll-link">
		<div class="container">	
			<div class="eight columns">	
				<?=$arResult['ITEMS']['~DETAIL_TEXT']?>
			</div>		
		</div>
	</section>