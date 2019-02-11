

Vue.component('date-picker2', VueBootstrapDatetimePicker);
// Using font-awesome 5 icons

Vue.component('fechaProyecto', VueBootstrapDatetimePicker);

Vue.component('date-picker-edit-tarea', VueBootstrapDatetimePicker);

Vue.component('date-picker', VueBootstrapDatetimePicker);
// Using font-awesome 5 icons
$.extend(true, $.fn.datetimepicker.defaults, {
  icons: {
    time: 'far fa-clock',
    date: 'far fa-calendar',
    up: 'fas fa-arrow-up',
    down: 'fas fa-arrow-down',
    previous: 'fas fa-chevron-left',
    next: 'fas fa-chevron-right',
    today: 'fas fa-calendar-check',
    clear: 'far fa-trash-alt',
    close: 'far fa-times-circle'
  }
});



$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


