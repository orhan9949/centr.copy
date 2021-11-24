$(document).ready(function() {
    $('label').attr('click','on');
    $('label').click(function(e) {
        
    if ( $(this).attr('click') == 'on') {
        var demo = $(this).siblings().attr('demo');
        var price = $(this).parent().parent().parent().siblings('.pricingTable-header').children().children('.price-value-js').text();
        price = parseInt(price) + 0 + parseInt(demo);
        $(this).parent().parent().parent().siblings('.pricingTable-header').children().children('.price-value-js').text(price);
        $(this).attr('click','off');
    }
    else {
        var demo = $(this).siblings().attr('demo');
        var price = $(this).parent().parent().parent().siblings('.pricingTable-header').children().children('.price-value-js').text();
        price = parseInt(price) - 0 - parseInt(demo);
        $(this).parent().parent().parent().siblings('.pricingTable-header').children().children('.price-value-js').text(price);
        $(this).attr('click','on');
    }
    });
    $('.modal-calc_service').click(function(e) {
       
        var type = $(this).parent().siblings('.heading').text(); 
        $('.this-title-modal').text(type);
        
        var icon_type = $(this).parent().siblings('.pricingTable-header').children('i').attr('class');
        $('.modal-select-product').html('<i class="' + icon_type + '" style="font-size: 20px;color: #00b4fa;"></i>');
        
        var selected = $(this).parent().siblings('.pricing-content').children().find("label[click='off']").text();
        $('.modal-select-product-p').html('');
        $(this).parent().siblings('.pricing-content').children().find("label[click='off']").each(function(index, elem){
            $('.modal-select-product-p').append('<p> + ' + elem.innerHTML + '</p>');
        });
        
        var total_price = $(this).parent().siblings('.pricingTable-header').children('.price-value').children('.price-value-js').text();
        var users = $(this).parent().siblings('.pricing-content').children('#price-count').children('.price-options').children().children('#places-count-value').text();
        /*$('#total_plus').children().attr('value', $('title').text() + ' ' + type + ' - Пользователей - ' + users + ', '  + $(this).parent().siblings('.pricing-content').children().find("label[click='off']").text() );
        */
        $('#total_price').children().attr('value',total_price);
        $('#total_plus').children().attr('value',$('#title_price_table').text());
        if(users !== '') { users = '. Пользователей ' + users;} else {}
        $('#traif_idd').children().attr('value',type + users);
    });
    
    /* TOOLTIPS */
   jQuery(document).ready(function() {
       var $info = $('.price-tooltip');
        $info.each( function () {
          var dataInfo = $(this).data("tooltip");
          $( this ).append('<span class="inner-data" >' + dataInfo + '</span>');
        }); 
    });
    /* ------------ */
});