@extends('template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.header_title_home')</div>
                    <p>@lang('auth.message_home')</p>
                    <!--<div class="panel-heading">Welcome</div>
                    <div class="panel-body">
                       <p>Welcome to Angeles Digitial Home !</p>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
@endsection