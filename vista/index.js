document.addEventListener("DOMContentLoaded", function() {
    var Calendar = tui.Calendar;

    var calendar = new Calendar('#calendar', {
        defaultView: 'week',
        taskView: false,
        scheduleView: ['time'],
        week: {
            startDayOfWeek: 0,
            hourStart: 9, // Hora de inicio (9 AM)
            hourEnd: 22, // Hora de fin (10 PM)
        },
        template: {
            time: function(schedule) {
                return '<strong>' + schedule.title + '</strong>';
            }
        }
    });

    // Eventos de ejemplo
    calendar.createSchedules([
        {
            id: '1',
            calendarId: '1',
            title: 'Evento 1',
            category: 'time',
            start: '2024-05-30T10:00:00',
            end: '2024-05-30T11:00:00'
        },
        {
            id: '2',
            calendarId: '1',
            title: 'Evento 2',
            category: 'time',
            start: '2024-05-31T14:00:00',
            end: '2024-05-31T15:00:00'
        }
    ]);
});