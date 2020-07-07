$(document).ready(function(){

    //mobile-toggle
    $('.mobile_toggle').click(function(){
        $('body').toggleClass('nav_open');
    });
    $('.menu_backdrop').click(function(){
        $('body').removeClass('nav_open');
    });

    //--mobile-search
    /*$('.srch_mobile').click(function(){
        $('#search').slideToggle();
    });*/

    //---mobile-categories
    $('.parent_nav > span').click(function(){
        $(this).parent('.parent_nav').siblings().removeClass('active');
        $(this).parent('.parent_nav').toggleClass('active');
        $(this).parent('.parent_nav').siblings().children('.parent_nav > ul').slideUp();
        $(this).parent('.parent_nav').children('.parent_nav > ul').slideToggle();
    });

    //--increment-dec-js--
    var incrementPlus;
    var incrementMinus;

    var buttonPlus  = $(".cart-qty-plus");
    var buttonMinus = $(".cart-qty-minus");

    var incrementPlus = buttonPlus.click(function() {
        var $n = $(this)
            .parent(".qty_buttons")
            .parent(".qty_wrap")
            .find(".qty");
        $n.val(Number($n.val())+1 );
    });

    var incrementMinus = buttonMinus.click(function() {
            var $n = $(this)
            .parent(".qty_buttons")
            .parent(".qty_wrap")
            .find(".qty");
        var amount = Number($n.val());
        if (amount > 0) {
            $n.val(amount-1);
        }
    });
    
});