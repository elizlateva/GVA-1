<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- eli -->
    <link rel="stylesheet" href="/eli/scss/style.css">
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- eli -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <title>@yield('page-title')</title>
    <meta name="description" content="@yield('page-description')"/>
    <link rel="shortcut icon" type="image/png" href="{!! asset('image/favoticon.png') !!}"/>

    @yield('plugin-css')
    <link rel="stylesheet" href="{!! asset('lib/jquery-ui/jquery-ui.css') !!}">
    <link rel="stylesheet" href="{!! asset('lib/bootstrap-select/css/bootstrap-select.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('lib/aos-master/aos.css') !!} ">
    @if( \Route::current()->getName() != 'home.eli' )
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    @endif
    <script type="text/javascript" src="{!! asset('js/jquery-2.2.4.min.js') !!}"></script>
    <script src="{!! asset('lib/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('lib/bootstrap-select/js/bootstrap-select.min.js') !!}"></script>
    <script src="{!! asset('lib/jquery-ui/jquery-ui.js') !!}"></script>
    <script src="{!! asset('lib/aos-master/aos.js') !!}"></script>
    <!-- eli -->
    <script src="https://projects.lukehaas.me/scrollify/script/jquery.scrollify.js"></script>
    <!-- eli -->

    @yield('plugin-js')
    <script type="text/javascript" src="{!! asset('js/custom.js') !!}"></script>
    @yield('data-layer')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({
    'gtm.start':  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P9MRJXX');</script>
    <!-- End Google Tag Manager -->
    <!-- DATATRANS LIGHTBOX MODE -->
    <script src="https://pay.sandbox.datatrans.com/upp/payment/js/datatrans-1.0.2.js"></script>
    <!-- DATATRANS LIGHTBOX MODE -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9MRJXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <header class="header">
        <div class="shell">
                     <!-- butoni novi -->
            <a href="{{ route('reservation.cart.get') }}" class="shop-car"></a>
            @if (session('success_auth_client') == 1)
            <a href="{{ route('reservation.show.client.profile', [session('clientData')['id']])}}" class="button-login name-acc"><span></span>{{ session('clientData')['first_name'] }} {{ session('clientData')['last_name'] }}</a>
            <a href="{{ route('reservation.client.logout') }}" class="button-login">@lang('messages.only_logout')</a>
            @else
            <a class="button-login" onClick="showClientLoginModal()"  id="initClientAuthModal">@lang('messages.only_login')</a>
            @endif
            <a href="#" class="user">Username</a>
            <a href="#" class="exit"></a>
            <!-- butoni novi -->
        </div>
        <div class="header-inner">

            <a href="#" class="logo" alt="">
                <img src="/eli/css/images/logo.png">
            </a>
            
            <nav class="menu">
                <ul class="active">
                    
                    <li>
                        <a href="# ">Accueil </a>
                    </li>
                    <li>
                        <a href="# ">Notre service</a>
                    </li>
                    <li>
                        <a href="# ">Réservation  </a>
                    </li>
                    <li>
                        <a href="# "> Avis clients </a>
                    </li>
                    <li>
                        <a href="# "> Accès </a>
                    </li>
                    <li>
                        <a href="# ">Contact</a>
                    </li>
                </ul>
                <div class="select-lang ">
                <select onChange="window.location.href=this.value">
                    <option value="/link/to/somewhere" selected=" ">fr</option>
                    <option value="/link/to/somewhere">en</option>
                    <option value="/link/to/somewhere">de</option>
                </select>
            </div> <!--/.select-lang-->
                <a class="toggle-nav"><i class=" fa fa-bars fa-2x " aria-hidden="true "></i></a>
            </nav><!--/.menu-->
        </div><!--/.header-inner-->
    </header> <!--/header-->
  
    <section class="reservation-section">
        <div class="main ">
            <form>
                <div class="input-inline">
                    <label>Date de départ</label>
                    <input type="date " name="calendar ">
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label class="label-center">Heure de rendez-vous</label>
                    <div class="select-center">
                        <div class="select-wrapper ">
                            <select> 
                              <option value="HH " selected=" ">HH</option>
                              <option value="00 ">00</option>
                              <option value="01 ">01</option>
                              <option value="02 ">02</option>
                              <option value="03 ">03</option>
                              <option value="04 ">04</option>
                              <option value="05 ">05</option>
                              <option value="06 ">06</option>
                            </select>
                        </div>
                        <div class="select-wrapper ">
                            <select> 
                               <option value="MM " selected=" ">MM</option>
                               <option value="00 ">00</option>
                               <option value="30 ">10</option>
                               <option value="0100 ">20</option>
                               <option value="0130 ">30</option>
                               <option value="0200 ">40</option>
                               <option value="0230 ">50</option>
                            </select>
                        </div>
                    </div>
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label>Date de retour</label>
                    <input type="date " name="calendar ">
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label class="label-center">Heure de retour</label>
                <div class="select-center">
                <div class="select-wrapper ">
                    <select> 
                        <option value="HH " selected=" ">HH</option>
                        <option value="00 ">00</option>
                        <option value="01 ">01</option>
                        <option value="02 ">02</option>
                        <option value="03 ">03</option>
                        <option value="04 ">04</option>
                        <option value="05 ">05</option>
                        <option value="06 ">06</option>
                    </select>
                </div>
                <div class="select-wrapper ">
                    <select> 
                        <option value="MM " selected=" ">MM</option>
                        <option value="00 ">00</option>
                        <option value="30 ">10</option>
                        <option value="0100 ">20</option>
                        <option value="0130 ">30</option>
                        <option value="0200 ">40</option>
                        <option value="0230 ">50</option>
                    </select>
                </div>
                </div>
                </div><!-- /.input-inline -->
            <div class="reservation-button ">
                <button type="button ">Réservation</button>
            </div><!--/.reservation-button-->
        </form><!--/form-->

     </div> <!--/.main-->
        <div class="reservation-section-footer ">
           <div class="reservation-section-footer-center ">
                <img src="/eli/css/images/car-icon.png">
                <p class="reservation-footer-text">Park &amp; Fly</p>
                <img src="/eli/css/images/fly-icon.png">
            </div><!--/.reservation-section-footer-center-->
            <div class="scroll-down">
                <a href="#" class="scroll">Faire Défiler</a>
            </div><!--/.scroll-down-->
        </div><!--/.reservation-section-footer-->
    </section>

        @yield('content')

    <footer class="footer">
        <div class="footer-inner ">
            <div class="contact ">
                <p>022 510 14 40</p>
            </div> <!--/.contact-->
            <div class="footer-image-center">
                <div class="clients ">
                    <img src="/eli/css/images/widget.png ">
                </div><!--/.clients-->
                <div class="payments ">
                    <ul>
                        <li><img class="image-center" src="/eli/css/images/post_finance.png"></li>
                        <li><img class="image-center" src="/eli/css/images/visa.png"></li>
                        <li><img class="image-center" src="/eli/css/images/master_card.png"></li>
                        <li><img class="image-center" src="/eli/css/images/pay_pal.png"></li>
                        <li><img src="/eli/css/images/american_express.png" class="round-border"></li>
                        <li><img src="/eli/css/images/twint.png"></li>
                        <li><img src="/eli/css/images/klarna.png"></li>
                    </ul>
                </div><!--/.payments-->
            </div><!--/.footer-image-center-->
            <div class="cr-text ">
                <p>© Copyright 2017 GVA park.Ch. Tous Droits Sont réservé création du site internet – BGCS</p>
            </div><!--/.cr-text-->
            <div class="social ">
                <a href="#">Follow us</a>
            </div> <!--/.social-->
        </div><!--/.footer-inner-->
    </footer><!--footer-->
    <!-- MODAL -->
    <div id="dialog" style="display:none" title="Login Modal">
        <div class="answer">
            @lang('messages.order_description_instructions')
        </div>
        {!! Form::open(['action' => 'ReservationController@authClient', 'method' => 'POST']) !!}
            <div class="form-group">
                <label for="login_email"> @lang('messages.form_email')</label>
                <input type="email" class="form-control" name="login_email" id="login_email">
            </div>
            <div class="form-group">
                <label for="login_password"> @lang('messages.form_password')</label>
                <input type="password" class="form-control" name="login_password" id="login_password">
            </div>
            <a class="btn btn-link" href="{{ route('password.reset') }}"> @lang('messages.form_password_reset')</a>
            {!! Form::submit(trans('messages.client_login_button'), array('class'=>'button')) !!}
        {!! Form::close() !!}
    </div>
    <!-- MODAL -->
    <script type="text/javascript">
    $('#initClientAuthModal').click(function(){
        $( "#dialog" ).dialog({
            height: 400,
            width: 650,
        });
    });
    $('#datepicker-reservation-1').datepicker({
      dateFormat: "yy/m/d",
      onSelect: function(dateText, inst) {
          var date = $(this).datepicker('getDate');
          var    day  = date.getDate();  
          var   month = date.getMonth() + 1;       
          var    year =  date.getFullYear();
          
          $('input[name="date_arrival_calc"]').val(year+'/'+month+'/'+day);
          setCalculatedPrices();
      }
    });

    $('#datepicker-reservation-2').datepicker({
      dateFormat: "yy/m/d",
      onSelect: function(dateText, inst) {
          var date = $(this).datepicker('getDate');
          var    day  = date.getDate();  
          var   month = date.getMonth() + 1;       
          var    year =  date.getFullYear();
          
          $('input[name="date_departure_calc"]').val(year+'/'+month+'/'+day);
          setCalculatedPrices();
      }
    });

    function setCalculatedPrices() {

      var r_hour_arrival = '';
      var r_minute_arrival = '';
      var r_hour_departure = '';
      var r_minute_departure = '';

      setTimeout(function() {

        var hour_arrival = $("select[name='hour_of_arrival']").prev().prev().text();
        r_hour_arrival = hour_arrival.substr(hour_arrival.length - 3);

        var hour_departure = $("select[name='hour_of_departure']").prev().prev().text();
        r_hour_departure = hour_departure.substr(hour_departure.length - 3);

        var minute_arrival = $("select[name='minute_of_arrival']").prev().prev().text();
        r_minute_arrival = minute_arrival.substr(minute_arrival.length - 3);

        var minute_departure = $("select[name='minute_of_departure']").prev().prev().text();
        r_minute_departure = minute_departure.substr(minute_departure.length - 3);

      }, 100);

      if ($("body").hasClass("reservation-page")) {
        setTimeout(function() {
          var data = {};

          data.date_of_arrival = $("input[name='date_arrival_calc']").val();
          data.hour_of_arrival = r_hour_arrival.trim();
          data.minute_of_arrival = r_minute_arrival.trim();
          data.date_of_departure = $("input[name='date_departure_calc']").val();
          data.hour_of_departure = r_hour_departure.trim();
          data.minute_of_departure = r_minute_departure.trim();

          $.ajaxSetup( { headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() } } );
          $.ajax({
              method: "POST",
              url: "{{ route('get.calculated.prices') }}",
              dataType: "json",
              data: data,
              success: function (response) {
                if ($('.cards').length > 0) {
                  // if disable_valet = 1 DISABLE INPUT FOR VIP
                  if (response.disable_valet == 0) {
                    $('.vip.card').show();
                    $('.vip.card.disabled').hide();
                    $('.vip.card .card__content h2').html('CHF '+response.prices.valet_total);
                  } else {
                    $('.vip.card').hide();
                    $('.vip.card.disabled').show();
                    $('.vip.card.disabled .card__content h2').html('CHF --');
                  }
                  $('.normal.card .card__content h2').html('CHF '+response.prices.navet_total);
                }
              }
          });
        }, 200);
      }
    }
    </script>
    <script src="/eli/vendors/app.js"></script>
</body>

</html>