<!-- modalx lightspeed -->
	<div id="modalx-slideUp" class="body-modalx" style="display: none">
		<div class="row free-analysis-form style2" style="padding: 20px;margin-top: 0px;padding-top: 0px;">		
		<?	    //Подключаем компонент для вывода нашей веб-формы
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
			"WEB_FORM_ID" => "1",
			"VARIABLE_ALIASES" => array(
				"WEB_FORM_ID" => "WEB_FORM_ID",
				"RESULT_ID" => "RESULT_ID",
			)
		),
		false
		);
		?>
		</div>
		</div>