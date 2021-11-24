<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Обновление 1С");
$APPLICATION->SetTitle("Обработки 1С");
?>
<?$og_desc = $APPLICATION->GetPageProperty("description");?>
<article>

<style>
    @media(max-width:550px){
        .btn.btn-default.pull-right.el-modal-btn {
            float: none !important;
            margin-bottom: 50px;
            text-align: center;
            width: 100%;
        }
    }
</style>
<section class="row page-cover"  data-bgimage="/bitrix/templates/centr_one/images/kontragent.jpg" style="background-color: #ac70ae;">
  		<div class="row m0">
  			<div class="container">
				<!--<h2 class="page-title" style="color:#fff"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/include_areas/services/service-2/page_cover_h.php');?></h2>-->
			</div>
  		</div>
  	</section>

<section class="row service4-header" style="text-align: left;padding-bottom: 30px">
<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	),
	false
);?> <a class="btn btn-default pull-right el-modal-btn" style="margin-right: 50px;" >Подключить услугу</a> <script>
        $(document).ready(function() {
            $('#service_el_name').children().attr('value', $('title').text() ); 
            $('.el-modal-btn').click(function() {
               $('#type_service_el').text('услуги Обновление 1С'); 
            });
        });
    </script>
	<div class="row sectionTitle text-left">
		<h1 class="this-title">Обновление 1С</h1>
	</div>
	<p>
		Подключить услугу <b>1С Контрагент</b> вы всегда сможете в компании Центр, - мы поможем настроить любые услуги и опции вашего программного продукта, - низкие тарифы на обслуживания и качество исполнения. 1С Контрагент - это быстрая проверка информации о контрагентах по базе ФНС, автоматическое заполнение реквизитов контрагентов в различных документах и другие полезные функции. Сервис «1С:Контрагент» включает следующие возможности:&nbsp;
	</p>
	<ul>
		<li>проверка реквизитов контрагента по ИНН на сервере ФНС;</li>
		<li>автоподстановка реквизитов контрагента и организации по ИНН на основе ЕГРЮЛ/ЕГРИП.&nbsp;<br>
 </li>
	</ul>
	<p>
	</p>
	<h3>Преимущества</h3>
	<ul>
		<li>Сервис проверки реквизитов контрагента (ИНН и КПП) позволит избежать ошибок в счетах-фактурах, книгах покупок и продаж, а также в журналах учета счетов-фактур.</li>
		<li>Автоматическое заполнение реквизитов контрагента при указании ИНН экономит время, позволяет получить актуальную информацию о контрагенте, мгновенно зарегистрировать его в программе, исключить возможные ошибки.&nbsp;<br>
 </li>
	</ul>
	<p>
	</p>
	<h3>Условия получения</h3>
	<p>
		 Для использования сервиса 1С:Контрагент необходимо:
	</p>
	<ul>
		<li>являться зарегистрированным пользователем программ 1С;</li>
		<li><a href="/assistance/">иметь действующий договор информационно-технологического сопровождения (1С:ИТС)</a>&nbsp;</li>
	</ul>
 <br>
 <br>
	 <!--	 <a id="modal-free-call-its" class="btn btn-default btn-bg btn-round" style="font-size: 18px; text-transform: none; line-height: 50px; padding: 0px 25px; margin-top: 30px;" ><i class="fa fa-phone-square" style="font-size: 20px; padding-right: 10px;"></i>Заказать консультацию</a>-->
</div>
 </section>

 
 
</article>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>