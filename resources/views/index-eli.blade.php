@extends('layouts.eli')
@section('content')
<section class="content-section ">
    <div class="main-content ">
        <div class="main-content-inner ">
            <h1>
            @if(!empty($data))
                {{ $data->title }}
            @endif
            </h1>
            <div class="text">
                <p>
                @if(!empty($data))
                    {{ $data->description }}
                @endif
                </p>
            </div><!--/.text-->
        </div><!--/.main-content-inner-->     
        <div class="scroll-down"> 
                    <button type="button" class="scroll red">@lang('messages.homepage_scroll_down')</button>
               </div><!--/.scroll-down-->
    </div> <!--/.main-content-->   
    
</section><!--/.content-section-->

<section class="service-section">
    <div class="upper-main-content ">
        <div class="main-content-inner ">
            <h1>@lang('messages.index_page_first_title')</h1>
        </div><!--/.main-content-inner-->
    </div><!--/.upper-main-content-->
    <!-- <div class="main-content"> -->
        <div class="main-content-inner ">
            <div class="content ">
                <div class="service-inner">
                    <figure><!-- /.service-inner -->
                        <img src="/eli/css/images/forma-1.png ">
                    </figure>
                    <h2>@lang('messages.index_page_security_title')</h2>
                    <p>{{ $data->security_info }}</p>
                </div><!-- /.service-inner -->
                <div class="service-inner">
                    <figure>
                        <img src="/eli/css/images/forma-2.png ">
                    </figure>
                     <h2>@lang('messages.index_page_simplicity_title')</h2>
                        <p>{{ $data->simplicity_info }}</p>
                </div><!-- /.service-inner -->
                <div class="service-inner">
                    <figure>
                        <img src="/eli/css/images/forma-3.png ">
                    </figure>
                    <h2>@lang('messages.index_page_speed_title')</h2>
                    <p>{{ $data->speed_info }}</p>
                </div><!-- /.service-inner -->
                <div class="service-inner">
                    <figure>
                    <img src="/eli/css/images/forma-4.png ">
                    </figure>
                    <h2>@lang('messages.index_page_service_title')</h2>
                    <p>{{ $data->service_info }}</p>
                </div><!-- /.service-inner -->
            </div> <!--/.content-->
        </div><!--/.main-content-inner-->
        <div class="scroll-down"> 
                    <button type="button" class="scroll white">@lang('messages.homepage_scroll_down')</button>
               </div><!--/.scroll-down-->
</section><!--/.service-section-->
    <!-- </div> /.main-content -->
    <section class="parking-service-section">
        <div class="main-content-inner">
           
           <h2>Nos solutions de parking avec voiturier ou en self-service</h2>
           
            <div class="parking-service">

               <div class="normal-parking">
                  <p><span>Self Parking</span> - Déposez votre véhicule à notre parking couvert et rendez-vous à l’aéroport avec notre navette gratuite</p>
                </div>
                <p>Avec l’option Self, vous déposez votre véhicule dans notre parking couvert et sécurisé à l’adresse suivante: rue de la Pré-de-la-Fontaine 19, 1242 Satigny. Une navette vous conduira à l’aéroport sans frais supplémentaires. Le trajet dure environ 10 minutes et la navette circule toutes les demi-heures</p>
            </div><!--/.parking-service-->

            <div class="parking-service">

                 <div class="vip-parking">
                   <p><span>Privilège Parking</span> - Déposez votre véhicule devant nos locaux à l’aéroport et voyagez en toute sérénité</p>
                </div>
                <p>Avec l’option Privilège, vous déposez votre véhicule à notre agence à l’aéroport située au World Trade Center 1. Votre véhicule est alors pris en charge par un voiturier. A votre retour, votre véhicule vous attendra au même endroit. Un service rapide et pratique.</p>
            </div><!--/.parking-service-->


            <div class="parking-reservation-button">
                <button class="parking-button" type="button">@lang('messages.homepage_table_reservation')</button>
            </div><!--/.parking-reservation-button--> 

        </div><!--/.main-content-inner-->


        <div class="scroll-down"> 
            <button type="button" class="scroll red">@lang('messages.homepage_scroll_down')</button>
        </div><!--/.scroll-down-->

    </section><!--/.parking-service-section-->   
  
<section class="content-section">
    <div class="main-content ">
        <div class="main-content-inner ">
            <h1>@lang('messages.table_our_prices_header')</h1>
            <div class="table">
                <table class="left">
                    <thead>
                        <tr>
                            <th scope="col1">@lang('messages.table_head_days_name')</th>
                            <th scope="col2">@lang('messages.valet_title')</th>
                            <th scope="col3">@lang('messages.navet_title')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($pricesArray, 0, 20 / 2) as $k => $prices)
                        <tr>
                            @if ($k == '0')
                            <td class="title" scope="row">{{ $k+1 }} @lang('messages.table_day_name')</td>
                            @else
                            <td class="title" scope="row">{{ $k+1 }} @lang('messages.table_days_name')</td>
                            @endif
                            <td data-label="privilege parking">CHF {{ $prices['valet_price'] }}.-</td>
                            <td data-label="self parking">CHF {{ $prices['navet_price'] }}.-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- /.table-left -->
                <table class="right">
                    <thead>
                        <tr>
                            <th scope="col4">@lang('messages.table_head_days_name')</th>
                            <th scope="col5">@lang('messages.valet_title')</th>
                            <th scope="col6">@lang('messages.navet_title')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($pricesArray, 20 / 2) as $k => $prices)
                        <tr>
                            <td class="title" scope="row">{{ $k+11 }} @lang('messages.table_days_name')</td>
                            <td data-label="privilege parking">CHF {{ $prices['valet_price'] }}.-</td>
                            <td data-label="self parking">CHF {{ $prices['navet_price'] }}.-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- /.table-right -->
            </div><!--/.table-->
            <div class="table-reservation-button ">
                <button class="table-button" type="button ">@lang('messages.homepage_table_reservation')</button>
            </div><!--/.table-reservation-button-->  
        </div><!--/.main-content-inner-->
    </div><!--/.main-content-->
    <div class="scroll-down"> 
                    <button type="button" class="scroll red ">@lang('messages.homepage_scroll_down')</button>
               </div><!--/.scroll-down-->
</section><!--/.content-section-->
        
<section class="option-section ">
    <div class="main-content ">
        <div class="main-content-inner ">
            @if (!empty($faqData))
                @foreach ($faqData as $k => $row)
                <div class="accordion">
                    <h3>{!! $groups[app()->getLocale()][$k] !!}</h3>
                    @foreach ($row as $faq)
                    <div class="accordion-section">
                        <div class="accordion-section-title">{!! $faq['question'] !!}</div>
                        <div class="accordion-section-content">{!! $faq['answer'] !!}</div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            @endif
        </div><!--/.main-content-inner-->
    </div><!--/.main-content-->
</section><!--/.option-section-->
@endsection