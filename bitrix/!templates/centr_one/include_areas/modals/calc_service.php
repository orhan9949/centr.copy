<!-- modal -->
<div class="modal-overlay calc_service-overlay" style="z-index: 1000;">
  <div class="modal calc_service">
    <a class="close-modal">
      <svg viewBox="0 0 20 20">
        <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
      </svg>
    </a><!-- close modal -->
        <div class="modal-contents">
        <div class="row free-analysis-form style2" style="padding: 20px;margin-top: 0px;padding-top: 0px;">
    	<?	$APPLICATION->IncludeComponent(
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
    		"WEB_FORM_ID" => "3",
    		"VARIABLE_ALIASES" => array(
    			"WEB_FORM_ID" => "WEB_FORM_ID",
    			"RESULT_ID" => "RESULT_ID",
    		)
    	),
    	false
         );
    ?>
		</div>
		
      
    </div><!-- content -->
    
  </div><!-- modal -->
</div><!-- overlay -->