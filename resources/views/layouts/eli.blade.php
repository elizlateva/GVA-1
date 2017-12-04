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
    <script src="https://pay.datatrans.com/upp/payment/js/datatrans-1.0.2.js"></script>
    <!-- DATATRANS LIGHTBOX MODE -->
    <script src="/eli/vendors/app.js"></script>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9MRJXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <header class="header">
        <div class="shell">
            <a href="{{ route('reservation.cart.get') }}" class="shop-car"></a>
            @if (session('success_auth_client') == 1)
            <a href="{{ route('reservation.show.client.profile', [session('clientData')['id']])}}" class="user"></a>
            <a href="{{ route('reservation.client.logout') }}" class="exit"></a>
            @else
            <a class="button-login" onClick="showClientLoginModal()"  id="initClientAuthModal">@lang('messages.only_login')</a>
            @endif
        </div>
        <div class="header-inner">
            <a href="{{ route('home') }}" class="logo" alt="">
                <img src="/eli/css/images/logo.png">
            </a>
            <nav class="menu">
                <ul class="active">
                    <li>
                        <a href="{{ route('home') }}">@lang('messages.menu_home')</a>
                    </li>
                    <li>
                        <a href="{{ route('parking-service') }}">@lang('messages.menu_our_service')</a>
                    </li>
                    <li>
                        <a href="{{ route('reservation.get') }}">@lang('messages.menu_reservation')</a>
                    </li>
                    <li>
                        <a href="{{ route('avis-clients') }}">@lang('messages.menu_avis_clients')</a>
                    </li>
                    <li>
                        <a href="{{ route('video') }}">@lang('messages.menu_videos')</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">@lang('messages.menu_contact')</a>
                    </li>
                </ul>
                <div class="select-lang ">
                    <select onChange="window.location.href=this.value">
                        @foreach (config('app.locales') as $lang => $language)
                            <option value="{{ route('lang.switch', [$lang]) }}" {{ app()->getLocale() == $lang ? 'selected' : '' }}>{{ $language }}</option>
                        @endforeach
                    </select>
                </div> <!--/.select-lang-->
                <a class="toggle-nav"><i class=" fa fa-bars fa-2x " aria-hidden="true "></i></a>
            </nav><!--/.menu-->
        </div><!--/.header-inner-->
    </header> <!--/header-->
  
    <section class="reservation-section">
        <div class="main ">
            <!-- ERRORS -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(['action' => 'ReservationController@postReservationCart', 'method' => 'POST', 'class'=>'reservation-section-form']) !!}
                {!! Form::hidden('request_homepage', true) !!}
                <div class="input-inline">
                    <label>@lang('messages.reservation_date_arrival')</label>
                    <!-- <input type="date " name="calendar "> -->
                    {!! Form::input('text', 'date_of_arrival', session('selectedDates') ? session('selectedDates')['date_of_arrival'] : \Carbon\Carbon::now()->format('Y/m/j'), ['class' => 'form-control', 'id'=>'datepicker-depart']) !!}
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label class="label-center">@lang('messages.reservation_hour_arrival')</label>
                    <div class="select-center">
                        <div class="select-wrapper">
                            {!! Form::select('hour_of_arrival', Config::get('select_hours'), session('selectedDates') ? session('selectedDates')['hour_of_arrival'] : '', ['class' => '']) !!}
                        </div>
                        <div class="select-wrapper ">
                            {!! Form::select('minute_of_arrival', Config::get('select_minutes'), session('selectedDates') ? session('selectedDates')['minute_of_arrival'] : '', ['class' => '']) !!}
                        </div>
                    </div>
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label>@lang('messages.reservation_date_departure')</label>
                    {!! Form::input('text', 'date_of_departure', session('selectedDates') ? session('selectedDates')['date_of_departure'] : \Carbon\Carbon::tomorrow()->format('Y/m/j'), ['class' => 'form-control', 'id'=>'datepicker-retour']) !!}
                </div><!-- /.input-inline -->
                <div class="input-inline">
                    <label class="label-center">@lang('messages.reservation_hour_departure')</label>
                <div class="select-center">
                <div class="select-wrapper ">
                    {!! Form::select('hour_of_departure', Config::get('select_hours'), session('selectedDates') ? session('selectedDates')['hour_of_departure'] : '', ['class' => '']) !!}
                </div>
                <div class="select-wrapper ">
                    <!-- class = form-control selectpicker -->
                    {!! Form::select('minute_of_departure', Config::get('select_minutes'), session('selectedDates') ? session('selectedDates')['minute_of_departure'] : '', ['class' => '']) !!} 
                </div>
                </div>
                </div><!-- /.input-inline -->
            <div class="reservation-button ">
                <button type="submit">@lang('messages.reservation_main_button')</button>
            </div><!--/.reservation-button-->
        </form><!--/form-->

        </div> <!--/.main-->
        <div class="reservation-section-footer ">
           <div class="reservation-section-footer-center ">
               <img src="/eli/css/images/car-icon.png">
                <p class="reservation-footer-text">@lang('messages.homepage_first_title')</p>
                <img src="/eli/css/images/fly-icon.png">
                <div class="scroll-down"> 
                    <button type="button" class="scroll white top">Faire Défiler</button>
               </div><!--/.scroll-down-->
            </div><!--/.reservation-section-footer-center-->
        </div><!--/.reservation-section-footer-->
    </section>

        @yield('content')
   
    <footer class="footer">
        <div class="footer-inner ">
            <div class="contact ">
                <p>022 510 14 40</p>
                <span class="conditionsInit">Conditiones Generales</span>
            </div> <!--/.contact-->
            
            <div class="footer-image-center">
                <div class="clients ">
                    <div class="text-center">
                        <meta class="netreviewsWidget" id="netreviewsWidgetNum10350" data-jsurl="//cl.avis-verifies.com/fr/cache/1/b/a/1ba5dcf9-461f-17c4-d903-78e3a32c285a/widget4/widget03-10350_script.js"/><script src="//cl.avis-verifies.com/fr/widget4/widget03.min.js"></script>
                    </div>
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
                <p>@lang('messages.homepage_copyright')</p>
            </div><!--/.cr-text-->
            <div class="social ">
                <a target="_blank" href="https://www.facebook.com/gvapark">@lang('messages.homepage_follow_us')</a>
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
    <div id="dialogTerms" style="display:none" title="Conditiones Generales">
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
    <!-- MODAL -->
    <script type="text/javascript">
    var windowWidth = self.innerWidth;
    
    if (windowWidth < 480) {
      var width = 300;
      var height = 300;
    } else if (windowWidth > 481) {
      var width = 450;
      var height = 300;
    } else if (windowWidth > 768) {
      var width = 650;
      var height = 300;
    }

    $('#initClientAuthModal').click( function() {
        $( "#dialog" ).dialog({
            height: height,
            width: width,
        });
    });

    $('.conditionsInit').click( function() {
        $( "#dialogTerms" ).dialog({
            height: height+300,
            width: width,
            position: { my: "center center", at: "center center", of: window },
            open: function() { $.scrollify.update() }
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
</body>
</html>