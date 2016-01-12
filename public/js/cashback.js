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

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1512050339095136";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));