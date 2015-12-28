/**
 * Created by kyledinh on 12/17/15.
 */

$(function () {
    new WOW().init();

    window.Globalize.cultureSelector = 'vi-VN';
    window.Globalize.cultures['vi-VN'].numberFormat.currency.decimals = 0;

    $("input[type='checkbox']").iCheck({
        checkboxClass: 'icheckbox_flat'
    });

    //$("input[type='number']").stepper();
    //$("input[type='number']").keypress(function(event){
    //    event.preventDefault();
    //});

    $(".navbar-fixed-top").autoHidingNavbar();
});