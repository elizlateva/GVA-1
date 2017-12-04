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
                    <button type="button" class="scroll red">Faire Défiler</button>
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
                    <button type="button" class="scroll white">Faire Défiler</button>
               </div><!--/.scroll-down-->
</section><!--/.service-section-->
    <!-- </div> /.main-content -->
    
<section class="content-section">
    <div class="main-content ">
        <div class="main-content-inner ">
            <h1>Nos Prix</h1>
            <div class="table">
                <table class="left">
                    <thead>
                        <tr>
                            <th scope="col1">les journées</th>
                            <th scope="col2">privilege parking</th>
                            <th scope="col3">self parking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($pricesArray, 0, 20 / 2) as $k => $prices)
                        <tr>
                            <td class="title" scope="row">{{ $k+1 }} Jour</td>
                            <td data-label="privilege parking">CHF {{ $prices['valet_price'] }}.-</td>
                            <td data-label="self parking">CHF {{ $prices['navet_price'] }}.-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- /.table-left -->
                <table class="right">
                    <thead>
                        <tr>
                            <th scope="col4">les journées</th>
                            <th scope="col5">privilege parking</th>
                            <th scope="col6">self parking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($pricesArray, 20 / 2) as $k => $prices)
                        <tr>
                            <td class="title" scope="row">{{ $k+11 }} Jour</td>
                            <td data-label="privilege parking">CHF {{ $prices['valet_price'] }}.-</td>
                            <td data-label="self parking">CHF {{ $prices['navet_price'] }}.-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- /.table-right -->
            </div><!--/.table-->
            <div class="table-reservation-button ">
                <button class="table-button" type="button ">Réservation</button>
            </div><!--/.table-reservation-button-->  
        </div><!--/.main-content-inner-->
    </div><!--/.main-content-->
    <div class="scroll-down"> 
                    <button type="button" class="scroll red ">Faire Défiler</button>
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