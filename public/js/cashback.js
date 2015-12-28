/**
 * Created by kyledinh on 12/17/15.
 */

$(function () {
    new WOW().init();

    window.Globalize.cultureSelector = 'vi-VN';

    $("input[type='checkbox']").iCheck({
        checkboxClass: 'icheckbox_flat'
    });

    $("span.currency").each(function (i, elm) {
        elm.innerText = Globalize.format(Globalize.parseInt(elm.innerText), "C0");
    })

    //console.log($("span.currency").innerText);
    //$(".currency").text(Globalize.format( $(".currency").innerText, "c" ))

    $(".navbar-fixed-top").autoHidingNavbar();
});