@extends('adminlte::page')

@section('htmlheader_title')
	Example Calendar!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
            <div class="col-md-3">
                <div class="box box-success box-solid">
                    <div class="box-header box-border-with-border">
                        <h3 class="box-title">Esdeveniments</h3>
                    </div>
                    <div class="box-body">
                        <div id='external-events'>
                            <div class='fc-event'>My Event 1</div>
                            <div class='fc-event'>My Event 2</div>
                            <div class='fc-event'>My Event 3</div>
                            <div class='fc-event'>My Event 4</div>
                            <div class='fc-event'>My Event 5</div>
                            <p>
                                <input type='checkbox' id='drop-remove' />
                                <label for='drop-remove'>remove after drop</label>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-success box-solid">
                    <div class="box-header box-border-with-border">
                        <h3 class="box-title">Calendar</h3>
                    </div>
                    <div class="box-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
		</div>
	</div>

    <script>
        $(document).ready(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            $('#external-events .fc-event').each(function() {
                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                theme: true,
                editable: true,
                droppable: true,
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    {
                        title: 'All Day Event',
                        start: '2017-04-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2017-04-07',
                        end: '2017-04-10'
                    },
                ]
            })
        });
    </script>
@endsection
