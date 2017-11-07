$(function(){
    
    slider();
    
    function slider(){
        var cur = 0;
        var count = $('.box-slider').length;

        $('.box-slider').hide();
        $('.box-slider').eq(0).show();

        setInterval(function() {    
            $('.box-slider').eq(cur).fadeOut('slow',function () {
                $(this).removeClass('activo');
                cur = (cur + 1) % count;
                $('.box-slider').eq(cur).addClass('activo').fadeIn('slow');
            });
        }, 5000);
    }
    
    
    
    $('div.btnResp').on('click', function(){
        menu();
    });
    
    
    function menu(){
        
        if($('.btnResp').hasClass('cerrado')){
            $('div.primero').addClass('efecto3');
            $('div.segundo').addClass('efecto1');
            $('div.tercero').addClass('efecto2');
            $('.btnResp').addClass('efecto4').removeClass('cerrado').addClass('abierto');
            $('.menuResp').addClass('efectoMenuResp');
            
        }else{
            $('div.primero').removeClass('efecto3');
            $('div.segundo').removeClass('efecto1');
            $('div.tercero').removeClass('efecto2');
            $('.btnResp').removeClass('efecto4').removeClass('abierto').addClass('cerrado');
            $('.menuResp').removeClass('efectoMenuResp');
        }
    }
    
    
    
    
    
    $('.btnContacto').on('click', function(e){
        e.preventDefault();
        $('.box-contacto').toggleClass('box-efectoContacto');
    });
    
    $('.btnContactoResp').on('click', function(e){
        e.preventDefault();
        $('.box-contacto').toggleClass('box-efectoContacto');
        $('div.primero').removeClass('efecto3');
        $('div.segundo').removeClass('efecto1');
        $('div.tercero').removeClass('efecto2');
        $('.btnResp').removeClass('efecto4').removeClass('abierto').addClass('cerrado');
         $('.menuResp').removeClass('efectoMenuResp');
    });
    
    $('.filtroContact').on('click', function(){
        $('.box-contacto').removeClass('box-efectoContacto');
    });
    
    $('.formContact h1').on('click', function(){
        $('.box-contacto').removeClass('box-efectoContacto');
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});