$('.btn_cart').click(function(){
    $('.tab_cart').fadeIn();
})
$('.btn_close').click(function(){
    $('.tab_cart').fadeOut();
})

$(".btn_buynow").click(function(e) {
    console.log("buy now");
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "buynow",
      type: 'post',
      data: {
        product_id :$("#product_id").val(),
        quantity_cart :$("#quantity_cart").val()
      },
      success: function(cart) {
        console.log(cart);
        window.location = window.location.href + "?opencart=1";
        // $('.tab_cart').fadeIn();
      }
    });

});

$("#btn_delete_all").click(function(e){
    console.log("btn_delete_all");
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "clearcart",
      type: 'get',
      success: function(result) {
        console.log(result);
        // $('.tab_cart').fadeIn();
      }
    });
});
