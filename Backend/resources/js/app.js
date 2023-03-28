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
    
    function insertParam(key, value) { 
        key = encodeURIComponent(key); 
        value = encodeURIComponent(value); 
        console.log('inside params') 
        // kvp looks like ['key1=value1', 'key2=value2', ...] 
        var kvp = document.location.search.substr(1).split("&"); 
        let i = 0; 
        for (; i < kvp.length; i++) {
            if (kvp[i].startsWith(key + "=")) {
                let pair = kvp[i].split("="); 
                pair[1] = value; 
                kvp[i] = pair.join("="); 
                break;
            }
        } 
        if (i >= kvp.length) {
            kvp[kvp.length] = [key, value].join("="); 
        } // can return this or... 
        let params = kvp.join("&"); 
        // reload page with new params 
        document.location.search = params; 
    }
    
    
    $('#filter_categories').on('change', function() {
        let val = $(this).val();
        insertParam('category', val)
    })


})