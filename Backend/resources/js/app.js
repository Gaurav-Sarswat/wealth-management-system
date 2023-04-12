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

    // Chart JS Starts
    const ctx = document.getElementById('dashboard-chart');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    // Chart JS Ends
    const userChart = document.getElementById('userChart');
    let labelUser = $('#userChart').attr('data-labels').split(',')
    let dataUser = $('#userChart').attr('data-values').split(',')
    new Chart(userChart, {
      type: 'doughnut',
      data: {
        labels: labelUser,
        datasets: [{
          label: 'Count',
          data: dataUser,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const verificationstatusChart = document.getElementById('verificationstatusChart');
    let labelverification = $('#verificationstatusChart').attr('data-verification-labels').split(',')
    let dataverification = $('#verificationstatusChart').attr('data-verification-values').split(',')
    new Chart(verificationstatusChart, {
      type: 'doughnut',
      data: {
        labels: labelverification,
        datasets: [{
          label: ' Count',
          data: dataverification,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const statusChart = document.getElementById('statusChart');
    let labelstatus = $('#statusChart').attr('data-status-labels').split(',')
    let datastatus = $('#statusChart').attr('data-status-values').split(',')
    new Chart(statusChart, {
      type: 'doughnut',
      data: {
        labels: labelstatus,
        datasets: [{
          label: ' Number of Ideas',
          data: datastatus,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
 
})