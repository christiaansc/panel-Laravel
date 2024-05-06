@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-2 order-xl-1"></div>
            <div class="col-xl-8 order-xl-1">
                <div id='calendar'></div>
            </div>
    </section>


    <div class="modal fade" id="modal-add-event">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control"
                                aria-describedby="helpId" required>
                        </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('js')
    <script>
        console.log(@json($events));
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    center: 'dayGridMonth,timeGridWeek,listWeek'
                }, // buttons for switching between views
                locale: 'es',
                timeZone: 'local',
                events: "http://127.0.0.1:8000/event",
                dateClick: function() {
                    $('#modal-add-event').modal('show')
                },
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    daysOfWeek: [1, 2, 3, 4,5,6], // Monday - Thursday

                    startTime: '07:00', // a start time (10am in this example)
                    endTime: '18:00', // an end time (6pm in this example)
                }
            });
            calendar.render();
        });
    </script>
@stop
