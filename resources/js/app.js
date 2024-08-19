import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import jQuery from 'jquery';
import 'select2/dist/js/select2.full.min.js';

//window.$ = jQuery;
window.$ = window.jQuery = jQuery; // Ensure global jQuery

window.Alpine = Alpine;

Alpine.start();
