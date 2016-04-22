@extends('template.main')
@section('content')
{{--    <a class="openmodal" href="#contact" data-latitude="44.5403" data-longitude="-78.5463"  data-toggle="modal" data-id="Peggy Guggenheim Collection - Venice">Contact</a>
    <div class="modal fade" id="contact" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="back" >
                <div class="modal-header">
                    <h4>Contact</h4>
                </div>
                <div class="modal-body">

                    {!!$map['html']!!}
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>





    --}}


<a data-latitude="44.5403" data-longitude="-78.5463" data-map-show="map_1" data-target="#myMapModal" class="btn location" data-toggle="modal">Launch Map Modal</a>

<div class="modal fade" id="myMapModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div id="map-canvas" class=""></div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{--<script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}--}}
<style>
    html, body, #map-canvas  {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    #map-canvas {
        width:500px;
        height:480px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgbcjRttGZcpZhR3fO6GKrTZSqijlniBM"></script>
<script>

</script>

    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgbcjRttGZcpZhR3fO6GKrTZSqijlniBM"></script>--}}
@stop()
