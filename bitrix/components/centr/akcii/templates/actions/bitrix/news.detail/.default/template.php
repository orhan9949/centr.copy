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
<!-- <div class="news-detail"> -->
<style>
    .bx-breadcrumb {
      margin-top: 0px;
    }
</style>


		<section class="post post-format-image single-post row">
			<header class="post-header row">
				<div class="row this-title">
					<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
					<div class="post-date">
						<span class="date-wrapper">	
							<? $date_created = $arResult["DISPLAY_ACTIVE_FROM"]; 
								$day = date("d", strtotime($date_created)); 
								$month_array = array("1"=>"���","2"=>"���","3"=>"���","4"=>"���","5"=>"���", "6"=>"���", "7"=>"���","8"=>"���","9"=>"���","10"=>"���","11"=>"���","12"=>"���");
                                $month_name_rus = $month_array[date('n',strtotime($date_created))];
								$month = $month_name_rus /*date("m", strtotime($date_created))*/;
								$year = date("Y", strtotime($date_created));?>							
								<span class="dd"><? echo $day;?></span>
								<span class="mm-yy"><? echo $month;?><br><? echo $year;?></span>	
						</span>
					</div>
					<?endif?>
					<div class="title-link">
						<h3 class="title">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
							<?=$arResult["NAME"]?>
						<?endif;?>						
						</h3>
					</div>
				</div>
			</header>
			<div class="post-body row">
				<div class="featured-content row">
					<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
				</div>
				<div class="row this-summary this-contents">
				<?echo $arResult["DETAIL_TEXT"];?>		
				</div>
			</div>
		</section>		

		<ul class="pager blog-pager">
			<li class="previous">
				<a href="/company/akcii/" class="direction">
					<i class="fa fa-long-arrow-left"></i>��� �����
					<h4 class="post-title">��������� �� ���� ������</h4>
				</a>
			</li>
		</ul>
	

					
		<!--
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
				<img
					class="detail_picture"
					border="0"
					src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
					width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
					height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
					title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
					/>
			<?endif?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
				<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
			<?endif;?>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<h3><?=$arResult["NAME"]?></h3>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
				<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
			<?endif;?>
			<?if($arResult["NAV_RESULT"]):?>
				<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
				<?echo $arResult["NAV_TEXT"];?>
				<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
			<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
				<?echo $arResult["DETAIL_TEXT"];?>
			<?else:?>
				<?echo $arResult["PREVIEW_TEXT"];?>
			<?endif?>
			<div style="clear:both"></div>
			<br />
			<?foreach($arResult["FIELDS"] as $code=>$value):
				if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
				{
					?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
					if (!empty($value) && is_array($value))
					{
						?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
					}
				}
				else
				{
					?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
				}
				?><br />
			<?endforeach;
			foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

				<?=$arProperty["NAME"]?>:&nbsp;
				<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
					<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
				<?else:?>
					<?=$arProperty["DISPLAY_VALUE"];?>
				<?endif?>
				<br />
			<?endforeach;
			if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
			{
				?>


			 <div class="news-detail-share">
					<noindex>
					<?
					$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
							"HANDLERS" => $arParams["SHARE_HANDLERS"],
							"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
							"PAGE_TITLE" => $arResult["~NAME"],
							"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
							"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
							"HIDE" => $arParams["SHARE_HIDE"],
						),
						$component,
						array("HIDE_ICONS" => "Y")
					);
					?>
					</noindex>
				</div>
				 <?
			}
			?>
		-->


