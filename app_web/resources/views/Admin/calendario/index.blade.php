@extends('layouts.app')

@section('content')
<div class="container py-5">
    <a href="{{ route('admin.index') }}" class="btn btn-dark mb-4">
        <i class="bi bi-arrow-left-circle"></i> Volver
    </a>

    <div class="card">
        <div class="card-body">
            <h2 class="mb-4 text-primary text-center">Calendario de Eventos</h2>

            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/locales/es.js"></script>

<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
        min-height: 600px;
    }
</style>

<script>
    $(document).ready(function() {
        var calendar = new FullCalendar.Calendar($('#calendar')[0], {
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: "{{ route('admin.calendario.eventos') }}", // Aquí estamos usando la ruta para obtener los eventos en formato JSON
            eventDidMount: function(info) {
                // Personalización para eventos con descripción
                if (info.event.extendedProps.description) {
                    var tooltip = new bootstrap.Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                }
            },
            navLinks: true, // Permite navegar entre los días
            editable: true,  // Habilita la edición
            droppable: true, // Permite arrastrar los eventos si se configura
            selectable: true, // Permite seleccionar fechas
        });

        calendar.render();
    });
</script>
@endsection
