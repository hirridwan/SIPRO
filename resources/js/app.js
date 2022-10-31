
require('tooltip.js');

import iziToast from 'izitoast';
import swal from 'sweetalert';
import $ from 'jquery';
window.$ = window.jQuery = $;

// import 'jquery-ui/ui/widgets/datepicker.js';
require('@popperjs/core');
require('bootstrap');
require('jquery.nicescroll');
require('moment');
require('owl.carousel/dist/owl.carousel.min.js');
require('datatables');
require('datatables.net-bs4/js/dataTables.bootstrap4.min.js');
require('datatables.net-select-bs4/js/select.bootstrap4.min.js');
require('promise-polyfill');
require('sweetalert');
require('select2');
require('bootstrap-timepicker');
require('cleave.js/dist/cleave.min.js');

window.Select2 = $('.select2').select2();

window.toastr = require('toastr');
window.iziToast = iziToast;

