var Events="";

$.ajax({
    type     : "POST",
    url      : "/citas/obtener_agenda",
    dataType : "json",
    data     : {idtblcita:idtblDrCalendar},
    success  : function(data){
        if(data.estado=="1"){
            //mostrar_modal_dinamic(data.msg,'success');
            Events=data.events;
            console.log(data.events);
        } else{
            //mostrar_modal_dinamic(data.msg,'danger');
            alert("Error!");
        }
    },
    error: function (request, status, error){
        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
    },
    complete: function(){
        $(".loading_calendar").hide();
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            selectable: true,
            // select: function(start, end, date) {
            select: function(date, end, start) {
                if($(".fc-day-number").hasClass("fc-past")){
                    if($('.fc-agendaDay-button').hasClass('fc-state-active')){
                        // var fecha = moment(date).format('ddd MMM DD YYYY');
                        var fecha = moment(date).format('YYYY-MM-DD');
                        var start = moment(date).format('HH:mm:ss');
                        var end = moment(end).format('HH:mm:ss');

                        // var mywhen = fecha  + ' - ' + start + ' - ' + end;
                        $('#createEventModal #fecha_reserva').val(fecha);
                        $('#createEventModal #hora_reserva').val(start);
                        $('#createEventModal #hora_fin').val(end);
                        $('#createEventModal').modal('show');

                    }else{
                        $('#calendar').fullCalendar( 'gotoDate', date);
                        $('.fc-agendaDay-button').trigger('click');
                    }
                }

            },
            // events: Events,
            events: [//ejemplo de eventos
                {
                    id: 999,
                    title: 'Nombre paciente Cita por cerrar',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-03T16:00:00',
                    end: '2016-07-03T18:00:00',
                    servicio:'Cirugía',
                    especialidad:'Cardiología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                    className:'no-cerrada'
                },
                {
                    id: 999,
                    title: 'Lorem ipsun dolor',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-20T16:00:00',
                    end: '2016-07-20T18:00:00',
                    servicio:'Cirugía',
                    especialidad:'Cardiología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],

                },
                {
                    id: 998,
                    title: 'Juan Perez',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-23T09:00:00',
                    end: '2016-07-23T09:30:00',
                    servicio:'Rehabilitación',
                    especialidad:'Dermatología',
                    description: 'Descripción pequeña',
                    place:'Hospital Ángeles Sur',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Lorena del Pozo',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-23T11:00:00',
                    end: '2016-07-23T12:00:00',
                    servicio:'Consulta Médica',
                    especialidad:'Cardiología',
                    description: 'Para pre estudios del corazon',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Ricardo Mares Gaytán',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-23T10:00:00',
                    end: '2016-07-23T12:30:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                },
                {
                    id: 999,
                    title: 'Lorem ipsun dolor',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T16:00:00',
                    end: '2016-07-27T18:00:00',
                    servicio:'Cirugía',
                    especialidad:'Cardiología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    className:'no-confirmada'

                },
                {
                    id: 998,
                    title: 'Juan Perez',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T09:00:00',
                    end: '2016-07-27T09:30:00',
                    servicio:'Rehabilitación',
                    especialidad:'Dermatología',
                    description: 'Descripción pequeña',
                    place:'Hospital Ángeles Sur',
                    map:'',
                    className:'no-confirmada'
                },
                {
                    id: 998,
                    title: 'Lorena del Pozo',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T11:00:00',
                    end: '2016-07-27T12:00:00',
                    servicio:'Consulta Médica',
                    especialidad:'Cardiología',
                    description: 'Para pre estudios del corazon',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Ricardo Mares Gaytán',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T10:00:00',
                    end: '2016-07-27T12:30:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Camilia Impsun',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T17:00:00',
                    end: '2016-07-27T18:00:00',
                    servicio:'Consulta Médica',
                    especialidad:'Cardiología',
                    description: 'Para pre estudios del corazon',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                },
                {
                    id: 998,
                    title: 'Joaquin Paciente',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-27T18:00:00',
                    end: '2016-07-27T19:00:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],

                },


                {
                    id: 998,
                    title: 'Ricardo Mares Gaytán',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-25T10:00:00',
                    end: '2016-07-25T12:30:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                },
                {
                    id: 999,
                    title: 'Lorem ipsun dolor',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-25T16:00:00',
                    end: '2016-07-25T18:00:00',
                    servicio:'Cirugía',
                    especialidad:'Cardiología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',

                },
                {
                    id: 998,
                    title: 'Juan Perez',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-25T09:00:00',
                    end: '2016-07-25T09:30:00',
                    servicio:'Rehabilitación',
                    especialidad:'Dermatología',
                    description: 'Descripción pequeña',
                    place:'Hospital Ángeles Sur',
                    map:'',
                },
                {
                    id: 998,
                    title: 'Lorena del Pozo',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-25T11:00:00',
                    end: '2016-07-25T12:00:00',
                    servicio:'Consulta Médica',
                    especialidad:'Cardiología',
                    description: 'Para pre estudios del corazon',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Ricardo Mares Gaytán',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-25T10:00:00',
                    end: '2016-07-25T12:30:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },
                {
                    id: 998,
                    title: 'Camilia Impsun',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-24T17:00:00',
                    end: '2016-07-24T18:00:00',
                    servicio:'Consulta Médica',
                    especialidad:'Cardiología',
                    description: 'Para pre estudios del corazon',
                    place:'Hospital Ángeles Clínica Londres',
                    map:'',
                },
                {
                    id: 998,
                    title: 'Joaquin Paciente',
                    sintoma: 'Dolor de estomago',
                    start: '2016-07-24T17:00:00',
                    end: '2016-07-24T18:00:00',
                    servicio:'Nuevo servicio',
                    especialidad:'Oftalmología',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    place:'Hospital Ángeles Norte',
                    map:'',
                    adjuntos:['/img/hospital2.jpg','/img/hospital-angeles-lindavista.png'],
                },

                {
                    id: 998,
                    title: 'Vacaciones',
                    start: '2016-07-30T00:00:00',
                    end: '2016-08-07T24:00:00',
                    className:'vacaciones'
                },
            ],
            eventClick: function(calEvent, view) {
                //mostrar en la vista una descripcion de evento y llenar campos
                $("#eventModal p:not(.medicina,.hora)").empty();
                $("#eventModal p.confirmacion").empty();
                $("#eventModal p.medicina span,#eventModal p.hora span").empty();
                $("#eventModal ul.adjuntos").empty();
                $("#eventModal .modal-header h3").text(calEvent.title);
                $("#eventModal p.fecha").text(moment(calEvent.start).format('DD MMM YYYY'));
                $("#eventModal p.hora span.inicio").text(moment(calEvent.start).format('HH:mm'));
                $("#eventModal p.hora span.termino").text(moment(calEvent.end).format('HH:mm'));

                $("#eventModal p.confirmacion").text(calEvent.className);
                $("#eventModal p.sintoma").text(calEvent.sintoma);
                $("#eventModal p.medicina span.especialidad").text(calEvent.especialidad);
                $("#eventModal p.medicina span.servicio").text(calEvent.servicio);
                $("#eventModal p.lugar").text(calEvent.place);
                $("#eventModal p.descripcion").text(calEvent.description);
                $.each( calEvent.adjuntos, function( key, value ) {
                    $("#eventModal ul.adjuntos").append('<li><span style="background-image:url('+value+')"></span>'+value+'</li>')
                });
                $("#eventModal").modal('show');
            },
            // eventColor: '#378006',
            nowIndicator:true,
            contentHeight: $(window).height()-240,
            eventRender: function(event, element) {
                // element.find('.fc-title').append("<br/>" + event.description+"<br/>" +event.start );
            }
        });

        //Buscar citas



        $(".fc-time").addClass("hide");

        $('#submitButton').on('click', function(e){
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();
            doSubmit();
        });

        function doSubmit(){

            console.log($('#fecha_reserva').val()+ ' ' +$('#hora_reserva').val());

            $("#createEventModal").modal('hide');
            $("#calendar").fullCalendar('renderEvent',
                {
                    title: $('#sintoma').val(),
                    start: new Date( $('#fecha_reserva').val()+ ' ' +$('#hora_reserva').val()),
                    end:   new Date( $('#fecha_reserva').val()+ ' ' +$('#hora_fin').val()),
                    allDay: false
                },
                true);
        }


    }
});
$("#calendar-mini").fullCalendar({
    defaultView:'month',
    header: {
        left: 'prev,',
        center: 'title',
        right: 'next'
    },
    selectable: true,
    contentHeight: 270,
    dayClick: function(date, jsEvent, view) {
        $('#calendar').fullCalendar( 'gotoDate', date.format() );
    }
});

$(document).on("click","[class*='idtblcitas']",function(){
    var classes = $(this).attr("class");
    var arrClasses= classes.split(" ");
    var idtblcitas = arrClasses[arrClasses.length-1];
    idtblcitas=idtblcitas.split("-");
    $.ajax({
        type     : "POST",
        url      : '/citas/detalleCita',
        dataType : "json",
        data     : {idtblcitas:'doctor-'+idtblcitas[1],disp:'Mobile'},
        success  : function(data){
            console.log(data);

            $('#createEventModal #fecha_reserva').val(data[0]['fecha_reserva']);
            $('#createEventModal #hora_reserva').val(data[0]['hora_reserva']);
            $('#createEventModal #hora_fin').val(data[0]['hora_fin']);
            $('#createEventModal #sintoma').val(data[0]['sintoma']);
            $('#createEventModal #padecimiento').val(data[0]['padecimiento']);
            $('#createEventModal #nombre_paciente').val(data[0]['nombre_paciente']);
            $('#createEventModal #nombre_hospital').val(data[0]['catHospitalName']);
            $('#createEventModal #I_ESPECIALIDAD').val(data[0]['tblLinkedInDrProfHead']);
            $('#createEventModal #idtblaletascitas').val(data[0]['idtblaletascitas']);
            /*if(data.estado=="1"){
                //mostrar_modal_dinamic(data.msg,'success');
                location.reload();
                $btn.button('reset');
            } else{
                //mostrar_modal_dinamic(data.msg,'danger');
            }*/
        },
        error: function (request, status, error){
            //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
        },
        complete: function(){
            $('#createEventModal').modal('show');
        }
    });
});


/*
var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        selectable: true,
        // select: function(start, end, date) {
        select: function(date, end, start) {
            if($(".fc-day-number").hasClass("fc-past")){
                if($('.fc-agendaDay-button').hasClass('fc-state-active')){
                    // var fecha = moment(date).format('ddd MMM DD YYYY');
                    var fecha = moment(date).format('YYYY-MM-DD');
                    var start = moment(date).format('HH:mm:ss');
                    var end = moment(end).format('HH:mm:ss');

                    // var mywhen = fecha  + ' - ' + start + ' - ' + end;
                    $('#createEventModal #fecha_reserva').val(fecha);
                    $('#createEventModal #hora_reserva').val(start);
                    $('#createEventModal #hora_fin').val(end);
                    $('#createEventModal').modal('show');

                }else{
                    $('#calendar').fullCalendar( 'gotoDate', date);
                    $('.fc-agendaDay-button').trigger('click');
                }
            }
            
        },
        // ,
        // events: [
        //     {
        //         id:'TEST-10',
        //         title: '5 por confirmar',
        //         start: new Date("2016", "04", 20-4,10,00,00),
        //         end: new Date("2016", "04", 20-4,13,00,00)
        //     },
        //     {
        //         id:'TEST-10',
        //         title: '8 confirmadas',
        //         start: new Date("2016", "04", 20-4,10,00,00),
        //         end: new Date("2016", "04", 20-4,13,00,00)
        //     }
        // ],
        events: {
                    url: '/citas/obtener_agenda',
                    type: 'POST',
                    data: {idtblcita:idtblDrCalendar},
                    error: function() {
                        alert('there was an error while fetching events!');
                    },
                    // color: 'yellow',   // a non-ajax option
                    // textColor: 'black' // a non-ajax option
                },
        // eventColor: '#378006',
        nowIndicator:true,
        contentHeight: $(window).height()-240,
    });


    $(".fc-time").addClass("hide");

    $('#submitButton').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();
        doSubmit();
    });

    function doSubmit(){

        console.log($('#fecha_reserva').val()+ ' ' +$('#hora_reserva').val());

        $("#createEventModal").modal('hide');
        $("#calendar").fullCalendar('renderEvent',
            {
                title: $('#sintoma').val(),
                start: new Date( $('#fecha_reserva').val()+ ' ' +$('#hora_reserva').val()),
                end:   new Date( $('#fecha_reserva').val()+ ' ' +$('#hora_fin').val()),
                allDay: false
            },
            true);
    }

    $("#calendar-mini").fullCalendar({
        defaultView:'month',
        header: {
            left: 'prev,',
            center: 'title',
            right: 'next'
        },
        selectable: true,
        contentHeight: 270,
        dayClick: function(date, jsEvent, view) {
            $('#calendar').fullCalendar( 'gotoDate', date.format() );
        }
    });
*/

$("#editar").click(function(){
    $('#paciente').val($("#eventModal .modal-header h3").text());
    $('#paciente,#sintoma,#especialidad,#servicio').attr('readonly',true);
    $('#sintoma').val($("#eventModal p.sintoma").text());
    $('#fecha').val($("#eventModal p.fecha").text()).removeAttr('readonly');
    $('#horaIn').val( $("#eventModal p.hora .inicio").text() );
    $('#lugar').val($("#eventModal p.lugar").text());
    $('#description').val($("#eventModal p.description").text());
    $('#eventModal .adjuntos').clone().appendTo('#createAppointmentForm');
    $("#eventModal").modal('hide');
    $("#createEventModal").modal('show');
});