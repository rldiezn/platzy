
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        selectable: true,
        select: function(date, end, start) {
            var fecha = moment(date).format('ddd MMM DD YYYY');
            var start = moment(start).format('HH:mm:ss');
            var end = moment(end).format('HH:mm:ss');
            console.log(start)
            var mywhen = fecha  + ' - ' + start + ' - ' + end;
            $('#createEventModal #fecha').val(fecha);
            $('#createEventModal #horaIn').val(start);
            $('#createEventModal #horaOut').val(end);
            $('#createEventModal').modal('show');
        },
        nowIndicator:true,
        contentHeight: $(window).height()-240,
    });

    $('#submitButton').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();

        doSubmit();
    });

    function doSubmit(){

        console.log($('#fecha').val()+ ' ' +$('#horaIn').val());

        $("#createEventModal").modal('hide');
        $("#calendar").fullCalendar('renderEvent',
            {
                title: $('#nombre').val(),
                start: new Date( $('#fecha').val()+ ' ' +$('#horaIn').val() ),
                end:   new Date( $('#fecha').val()+ ' ' +$('#horaOut').val()  ),
                allDay: false,
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

