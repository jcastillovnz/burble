

Vue.component('proyecto-fecha-recepcion', Vue.extend(VueBootstrapDatetimePicker));


Vue.component('proyecto-fecha-entrega', VueBootstrapDatetimePicker);

Vue.component('fechaProyecto', VueBootstrapDatetimePicker);

Vue.component('date-picker-edit-tarea', VueBootstrapDatetimePicker);

Vue.component('tarea-fecha-inicio', VueBootstrapDatetimePicker);

Vue.component('fecha-inicio-tarea',  VueBootstrapDatetimePicker);
Vue.component('fecha-termino-tarea',  VueBootstrapDatetimePicker);

// Initialize as global component
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











