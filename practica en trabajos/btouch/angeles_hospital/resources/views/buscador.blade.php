@extends('template.main')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none container_buscador">
                <div class="">
                    <div class="panel-body">
                        <h1 class="main_tittle_buscador">&nbsp;@lang('auth.header_title_home')</h1>

                        <div id="banner" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 containerc hide" >
                            <a href="#" target="_blank"><img id="img_banner_adwords" src=""  /></a>
                            <button type="button" class="close close_appwork" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
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