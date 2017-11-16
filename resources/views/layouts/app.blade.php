<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <title>@yield('page-title')</title>
  <meta name="description" content="@yield('page-description')"/>
  <link rel="shortcut icon" type="image/png" href="{!! asset('image/favoticon.png') !!}"/>

  @yield('plugin-css')
  <link rel="stylesheet" href="{!! asset('lib/bootstrap/css/bootstrap.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('lib/jquery-ui/jquery-ui.css') !!}">
  <link rel="stylesheet" href="{!! asset('lib/bootstrap-select/css/bootstrap-select.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('lib/aos-master/aos.css') !!} ">
  <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

  <script type="text/javascript" src="{!! asset('js/jquery-2.2.4.min.js') !!}"></script>
  <script src="{!! asset('lib/bootstrap/js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('lib/bootstrap-select/js/bootstrap-select.min.js') !!}"></script>
  <script src="{!! asset('lib/jquery-ui/jquery-ui.js') !!}"></script>
  <script src="{!! asset('lib/aos-master/aos.js') !!}"></script>
  @yield('plugin-js')
  <script type="text/javascript" src="{!! asset('js/custom.js') !!}"></script>
  @yield('data-layer')

  <!-- DATATRANS EXAMPLE STYLE AND JS 1100002469 -->
  <script type="text/javascript" src="https://pay.sandbox.datatrans.com/upp/ajax/api.js?merchantId=1100006700"></script>    
  <style>
      table td { white-space: nowrap; }
      h3 { font-size: 14px; }
      .err { color: red; font-weight: bold; }
  </style>
  <!-- DATATRANS EXAMPLE STYLE AND JS -->

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({
    'gtm.start':  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P9MRJXX');</script>
  <!-- End Google Tag Manager -->
</head>
<body class="
@if( \Route::current()->getName() == 'home' )
        home-page
@elseif( \Route::current()->getName() == 'avis-clients' )
      testimonials-page
@elseif( (\Route::current()->getName() == 'reservation.get') || (\Route::current()->getName() == 'video') )
        reservation-page
@elseif( \Route::current()->getName() == 'contact' )
        contact-page
@elseif( \Route::current()->getName() == 'parking-service' )
        notre-service-page
@elseif( (\Route::current()->getName() == 'reservation.cart.get') || (\Route::current()->getName() == 'reservation.cart.post') )
        panier-page
@elseif( (\Route::current()->getName() == 'reservation.checkout.get') || (\Route::current()->getName() == 'reservation.checkout.post') )
        sortie-page
@elseif( \Route::current()->getName() == 'video' )
        videos-page
@endif">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9MRJXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="container-fluid">
    <div class="row header">
      <div class="container-fluid menu">
        <div class="row">
          <div class="col-md-6 col-md-offset-6 col-xs-8 col-xs-offset-4 text-right">
             <a href="{{ route('reservation.cart.get') }}" class="shop-car"></a>
            @if (session('success_auth_client') == 1)
              <a href="{{ route('reservation.show.client.profile', [session('clientData')['id']])}}" class="button-login name-acc"><span></span>{{ session('clientData')['first_name'] }} {{ session('clientData')['last_name'] }}</a>
              <a href="{{ route('reservation.client.logout') }}" class="button-login">@lang('messages.only_logout')</a>
            @else
              <a class="button-login" onClick="showClientLoginModal()"  id="initClientAuthModal">@lang('messages.only_login')</a>
            @endif
          </div>
          <div class="modal fade" id="clientCheckoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">@lang('messages.only_log_in')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
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
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  {!! Form::submit(trans('messages.client_login_button'), array('class'=>'button')) !!}
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="clientInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">HEADER</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="answer">
                        Helo
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-3 text-right col-sm-2">
            <a href="{{ route('home') }}">
              <img class="logo" src="{!! asset('image/logo.png') !!}" alt="">
              <img class="logo-mobile" src="{!! asset('image/logo-m.png') !!}" alt="">
            </a>
          </div>
          <div class="col-xl-8 col-xl-offset-1 navigation col-md-9 ">
            <nav class="navbar">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/')? 'active': '' }}"><a href="{{ route('home') }}">@lang('messages.menu_home')</a></li>
                    <li class="{{ Request::is('parking-service')? 'active': '' }}"><a href="{{ route('parking-service') }}">@lang('messages.menu_our_service')</a></li>
                    <li class="{{ Request::is('reservation')? 'active': '' }}"><a href="{{ route('reservation.get') }}">@lang('messages.menu_reservation')</a></li>
                    <li class="{{ Request::is('avis-clients')? 'active': '' }}"><a href="{{ route('avis-clients') }}">@lang('messages.menu_avis_clients')</a></li>
                    <li class="{{ Request::is('videos')? 'active': '' }}"><a href="{{ route('video') }}">@lang('messages.menu_videos')</a></li>
                    <li class="{{ Request::is('contact')? 'active': '' }}"><a href="{{ route('contact') }}">@lang('messages.menu_contact')</a></li>
                    <!--
                    <li class="social-menu">
                      <a href="https://www.facebook.com/gvapark" target="_blank">
                        <span></span>
                      </a>
                    </li>
                    -->
                    <li>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">{{ app()->getLocale() }}
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          @foreach (config('app.locales') as $lang => $language)
                              @if ($lang != app()->getLocale())
                                  <li>
                                      <a style="color:black" href="{{ route('lang.switch', [$lang]) }}">
                                          {{ $language }}
                                      </a>
                                  </li>
                              @endif
                          @endforeach
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <div class="container reservation-error">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="reservation">
              {!! Form::open(['action' => 'ReservationController@postReservationCart', 'method' => 'POST']) !!}
                {!! Form::hidden('request_homepage', true) !!}
                <div class="row form-inline">
                  <div class="col-sm-6 form-group">
                    <label for="datededepart">@lang('messages.reservation_date_arrival')</label>
                    {!! Form::input('text', 'date_of_arrival', session('selectedDates') ? session('selectedDates')['date_of_arrival'] : \Carbon\Carbon::now()->format('Y/m/j'), ['class' => 'form-control', 'id'=>'datepicker-depart']) !!}
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <label for="datededepart">@lang('messages.reservation_hour_arrival')</label>
                        <div class="col-xs-6 form-group">
                          {!! Form::select('hour_of_arrival', Config::get('select_hours'), session('selectedDates') ? session('selectedDates')['hour_of_arrival'] : '', ['class' => 'form-control selectpicker']) !!}
                        </div>
                        <div class="col-xs-6 form-group">
                          {!! Form::select('minute_of_arrival', Config::get('select_minutes'), session('selectedDates') ? session('selectedDates')['minute_of_arrival'] : '', ['class' => 'form-control selectpicker']) !!}
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row form-inline">
                  <div class="col-sm-6 form-group">
                    <label for="datederetour">@lang('messages.reservation_date_departure')</label>
                    {!! Form::input('text', 'date_of_departure', session('selectedDates') ? session('selectedDates')['date_of_departure'] : \Carbon\Carbon::tomorrow()->format('Y/m/j'), ['class' => 'form-control', 'id'=>'datepicker-retour']) !!}
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <label for="datededepart">@lang('messages.reservation_hour_departure')</label>
                        <div class="col-xs-6 form-group">
                          {!! Form::select('hour_of_departure', Config::get('select_hours'), session('selectedDates') ? session('selectedDates')['hour_of_departure'] : '', ['class' => 'form-control selectpicker']) !!}
                        </div>
                        <div class="col-xs-6 form-group">
                          {!! Form::select('minute_of_departure', Config::get('select_minutes'), session('selectedDates') ? session('selectedDates')['minute_of_departure'] : '', ['class' => 'form-control selectpicker']) !!}
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row button text-center">
                <div class="col-xs-6 col-xs-offset-3">
                  {!! Form::submit(trans('messages.reservation_main_button')) !!}
                </div>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row after-header">
      <div class="container text-center">
        <img src="{!! asset('image/car-icon.png') !!}" alt="" data-aos="zoom-in">
        <h3 data-aos="zoom-in"  data-aos-delay="100">@lang('messages.homepage_first_title')</h3>
        <img src="{!! asset('image/fly-icon.png') !!}" alt=""  data-aos="zoom-in">
      </div>
    </div>
    <div class="modal fade" id="clientTermsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('messages.tc_title_main_2')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_1')</h4>
                  <p>@lang('messages.tc_description_1')</p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_2')</h4>
                  <p>@lang('messages.tc_description_2')</p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_3')</h4>
                  <p>
                    @lang('messages.tc_description_3')
                  </p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_4')</h4>
                  <p>
                    @lang('messages.tc_description_4')
                  </p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_5')</h4>
                  <p>
                    @lang('messages.tc_description_5')
                  </p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_6')</h4>
                  <p>
                    @lang('messages.tc_description_6')
                  </p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_7')</h4>
                  <p>
                    @lang('messages.tc_description_7')
                  </p>
                </div>

                <div class="answer">
                  <h4 style="font-family:'Open Sans';font-size:24px;color:#bf1e2d;text-align:center;">@lang('messages.tc_title_8')</h4>
                  <p>
                    @lang('messages.tc_description_8')
                  </p>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  HEADER GORE
    @yield('content')
    FOOTER DOLU
    <footer>
      <div class="container">
        <div class="col-sm-8">
          <div class="social text-center">
            <a href="https://www.facebook.com/gvapark" target="_blank">
              <span>@lang('messages.homepage_follow_us')</span>
              <span></span></a>
          </div>
          <p>@lang('messages.homepage_copyright')</p>
          <div class="text-center" style="margin-bottom:20px">
            <meta class="netreviewsWidget" id="netreviewsWidgetNum10350" data-jsurl="//cl.avis-verifies.com/fr/cache/1/b/a/1ba5dcf9-461f-17c4-d903-78e3a32c285a/widget4/widget03-10350_script.js"/><script src="//cl.avis-verifies.com/fr/widget4/widget03.min.js"></script>
          </div>
        </div>
        <div class="col-sm-4">
          <img style="margin-left: 30%;" src="{!! asset('image/footer_3.png') !!}" alt="" />
          <p style="text-align:right"><a style="color:#fff;" class="" onClick="showTermsAndConditionsModal()" id="initTermsAndConditionsModal">@lang('messages.tc_title_main_2')</a></p>
        </div>
      </div>
    </footer>
    <script type="text/javascript">
    
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
  </body>
</html>
