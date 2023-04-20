<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />    
    <meta name="locale" content="{{ App::getLocale() }}" />
    <base href="{{ asset('') }}">
    {{--  <link rel="stylesheet" href="/static/css/bootstrap.min.css">  --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/static/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="stylesheet" href="/static/css/skin-blue.min.css">
    <link rel="stylesheet" href="/static/js/plugins/pace/pace.min.css">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @routes
    @inertiaHead
  </head>
  <body class="hold-transition skin-blue   sidebar-mini"  style="overflow-y:scroll">
   
    @inertia
        {{-- <script src="/static/js/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="/static/js/plugins/bootstrap/bootstrap.min.js"></script>  --}}
 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
   <script src="/static/js/plugins/AdminLTE/app.min.js"></script>
    <script src="/static/js/plugins/pace/pace.min.js"></script>
    <script src="//d2wy8f7a9ursnm.cloudfront.net/v4/bugsnag.min.js"></script>
    <script src="//d2wy8f7a9ursnm.cloudfront.net/bugsnag-plugins/v1/bugsnag-vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>//<![CDATA[
      if (address_2 = localStorage.getItem('address_2_saved')) {
        $('select[name="calc_shipping_district"] option').each(function() {
          if ($(this).text() == address_2) {
            $(this).attr('selected', '')
          }
        })
        $('input.billing_address_2').attr('value', address_2)
      }
      if (district = localStorage.getItem('district')) {
        $('select[name="calc_shipping_district"]').html(district)
        $('select[name="calc_shipping_district"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
          address_2 = target.text()
          $('input.billing_address_2').attr('value', address_2)
          district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.setItem('address_2_saved', address_2)
        })
      }
      $('select[name="calc_shipping_provinces"]').each(function() {
        var $this = $(this),
          stc = ''
        c.forEach(function(i, e) {
          e += +1
          stc += '<option value=' + e + '>' + i + '</option>'
          $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
          if (address_1 = localStorage.getItem('address_1_saved')) {
            $('select[name="calc_shipping_provinces"] option').each(function() {
              if ($(this).text() == address_1) {
                $(this).attr('selected', '')
              }
            })
            $('input.billing_address_1').attr('value', address_1)
          }
          $this.on('change', function(i) {
            i = $this.children('option:selected').index() - 1
            var str = '',
              r = $this.val()
            if (r != '') {
              arr[i].forEach(function(el) {
                str += '<option value="' + el + '">' + el + '</option>'
                $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
              })
              var address_1 = $this.children('option:selected').text()
              var district = $('select[name="calc_shipping_district"]').html()
              localStorage.setItem('address_1_saved', address_1)
              localStorage.setItem('district', district)
              $('select[name="calc_shipping_district"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                var address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
              })
            } else {
              $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
              district = $('select[name="calc_shipping_district"]').html()
              localStorage.setItem('district', district)
              localStorage.removeItem('address_1_saved', address_1)
            }
          })
        })
      })
      //]]></script>

  </body>
</html>