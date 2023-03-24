require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('.hover-menu-wrapper').on('mouseover', function() {
        $('.hover-menu').addClass('show')
    })
 
    $('.hover-menu-wrapper').on('mouseleave', function() {
        $('.hover-menu').removeClass('show')
    })

    $('.select2').select2({
        placeholder: 'Select Categories'
    });
 
})