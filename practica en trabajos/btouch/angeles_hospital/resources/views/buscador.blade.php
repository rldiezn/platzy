@extends('template.main')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none container_buscador">
                <div class="">
                    <div class="panel-body">
                        <h1 class="main_tittle_buscador">&nbsp;@lang('auth.header_title_home')</h1>

                        <div id="banner" class="containerc">
                            <a href="http://www.example.com"><img src="/img/banneradwords.jpg" /></a>
                        </div>
                        
                        <h3 class="second_tittle_buscador">@lang('auth.second_tittle_home')</h3>

                        @include('search')

                        <div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid"></div>
                        <div id="result_search_not_found" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid"><span id="not_found" class="not_found hide">@lang('auth.not_found')</span></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection