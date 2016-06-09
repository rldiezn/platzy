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
            events: Events,
            // eventColor: '#378006',
            nowIndicator:true,
            contentHeight: $(window).height()-240,
            eventRender: function(event, element) {
                element.find('.fc-title').append("<br/>" + event.description+"<br/>" +event.start );
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

