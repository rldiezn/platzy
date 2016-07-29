@extends('template.main')
@section('title')
    @lang('auth.historic-patient')
@stop
@section('id-table-to-search')
    @lang('#historic_patient_list')
@stop
@section('content')

    @include('search-box')
    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">

            <table class="table">
                <thead>
                <tr>
                    <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.historic-patient')</b></h2></th>
                </tr>
                </thead>
            </table>
            <table class="table" id="historic_patient_list">
                <?php
                    foreach ($pacientes as $ind_p=>$p){
                ?>
                    <tr>
                        <td>
                            <img class="img_profile_list" src="<?php echo $p->srcImage?>" >
                        </td>
                        <td width="55%" class="text_aling_left" >
                            <h4><?php echo $p->nombre_paciente?></h4>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                                <span><b> @lang('auth.age-label')</b>  <?php echo $p->edad ?></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                                <span><b> @lang('validation.attributes.email-label')</b> <?php echo $p->tblpacienteemail ?></span>
                            </div>
                        </td>
                        <td style="padding-top: 30px">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <a href='/citas/historialCitas/<?php echo $p->idtblpaciente?>'><img src="/img/summary-icon copy.png" width="50px"></a>
                            </div>

                        </td>
                    </tr>
                <?php
                    }
                ?>

            </table>

        </div>

        <br><br>

    </div>
@stop
