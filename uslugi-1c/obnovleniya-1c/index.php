<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "���������� 1�");
$APPLICATION->SetTitle("��������� 1�");
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
);?> <a class="btn btn-default pull-right el-modal-btn" style="margin-right: 50px;" >���������� ������</a> <script>
        $(document).ready(function() {
            $('#service_el_name').children().attr('value', $('title').text() ); 
            $('.el-modal-btn').click(function() {
               $('#type_service_el').text('������ ���������� 1�'); 
            });
        });
    </script>
	<div class="row sectionTitle text-left">
		<h1 class="this-title">���������� 1�</h1>
	</div>
	<p>
		���������� ������ <b>1� ����������</b> �� ������ ������� � �������� �����, - �� ������� ��������� ����� ������ � ����� ������ ������������ ��������, - ������ ������ �� ������������ � �������� ����������. 1� ���������� - ��� ������� �������� ���������� � ������������ �� ���� ���, �������������� ���������� ���������� ������������ � ��������� ���������� � ������ �������� �������. ������ �1�:���������� �������� ��������� �����������:&nbsp;
	</p>
	<ul>
		<li>�������� ���������� ����������� �� ��� �� ������� ���;</li>
		<li>��������������� ���������� ����������� � ����������� �� ��� �� ������ �����/�����.&nbsp;<br>
 </li>
	</ul>
	<p>
	</p>
	<h3>������������</h3>
	<ul>
		<li>������ �������� ���������� ����������� (��� � ���) �������� �������� ������ � ������-��������, ������ ������� � ������, � ����� � �������� ����� ������-������.</li>
		<li>�������������� ���������� ���������� ����������� ��� �������� ��� �������� �����, ��������� �������� ���������� ���������� � �����������, ��������� ���������������� ��� � ���������, ��������� ��������� ������.&nbsp;<br>
 </li>
	</ul>
	<p>
	</p>
	<h3>������� ���������</h3>
	<p>
		 ��� ������������� ������� 1�:���������� ����������:
	</p>
	<ul>
		<li>�������� ������������������ ������������� �������� 1�;</li>
		<li><a href="/assistance/">����� ����������� ������� �������������-���������������� ������������� (1�:���)</a>&nbsp;</li>
	</ul>
 <br>
 <br>
	 <!--	 <a id="modal-free-call-its" class="btn btn-default btn-bg btn-round" style="font-size: 18px; text-transform: none; line-height: 50px; padding: 0px 25px; margin-top: 30px;" ><i class="fa fa-phone-square" style="font-size: 20px; padding-right: 10px;"></i>�������� ������������</a>-->
</div>
 </section>

 
 
</article>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>