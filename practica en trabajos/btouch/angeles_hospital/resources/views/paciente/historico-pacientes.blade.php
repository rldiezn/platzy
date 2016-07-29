@extends('template.main')
@section('title')
    @lang('auth.historic-patient')
@stop
@section('id-table-to-search')
    @lang('#historic_patient_list')
@stop
@section('content')
    <main>

        <h1 class="title_section blue">@lang('auth.historic-patient')</h1>

        <section class="padding">

            <div class="list-group list_ang" id="hospitales_list">
                <?php
                        foreach ($pacientes as $ind_p=>$p){
                ?>
                <div class="list-group-item">
                    <a href="<?php echo "/citas/historialCitas/$p->idtblpaciente" ?>">
                        <img src="<?php echo $p->srcImage?>" >
                        <h4 class="list-group-item-heading"><?php echo $p->nombre_paciente?></h4>
                        <h5 class="list-group-item-heading"><?php echo $p->edad?></h5>
                        <h5 class="list-group-item-heading"><?php echo $p->tblpacienteemail?></h5>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>

        </section>

    </main>
@stop
