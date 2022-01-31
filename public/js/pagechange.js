$(document).ready(function() {
    $( "nav-item" ).css('background-color','');
    $( "nav-item" ).css('border-right','');
    if ((window.location.href.indexOf("home") > -1)) {
        $("#home").css('background-color','#444');
        $("#home").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("produk") > -1)) {
        $("#product").css('background-color','#444');
        $("#product").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("order") > -1)) {
        $("#order").css('background-color','#444');
        $("#order").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("produkOrder") > -1)) {
        $("#orderProduct").css('background-color','#444');
        $("#orderProduct").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("kategori") > -1)) {
        $("#category").css('background-color','#444');
        $("#category").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("pembayaran") > -1)) {
        $("#payment").css('background-color','#444');
        $("#payment").css('border-right','10px solid #fb6340');
    }else if ((window.location.href.indexOf("status") > -1)) {
        $("#status").css('background-color','#444');
        $("#status").css('border-right','10px solid #fb6340');
    }else {
        return;
    }
});
