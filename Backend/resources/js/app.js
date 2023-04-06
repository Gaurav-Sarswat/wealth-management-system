require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('.user-profile-nav').on('mouseover', function() {
        $('.hover-menu').addClass('show')
    })
 
    $('.user-profile-nav').on('mouseleave', function() {
        $('.hover-menu').removeClass('show')
    })
    
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


    $('.select2').select2({});
    
    // $('select.has-parent').children('option').attr('disabled', true)

    $('select.parent.sector').on('change', function() {
        $('select.has-parent.sector').val(null).trigger('change');
        let val = $(this).val()
        $('select.has-parent.sector').children('option').each(function() {
            if(val.includes($(this).attr('data-parent'))) {
                $(this).removeAttr('disabled')
            } else {
                $(this).attr('disabled', true)
            }
        })
    })

    $('select.parent.country').on('change', function() {
        $('select.has-parent.country').val(null).trigger('change');
        let val = $(this).val()
        $('select.has-parent.country').children('option').each(function() {
            if(val.includes($(this).attr('data-parent'))) {
                $(this).removeAttr('disabled')
            } else {
                $(this).attr('disabled', true)
            }
        })
    })
 
})