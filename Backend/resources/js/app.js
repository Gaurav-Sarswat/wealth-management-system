require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
  $('.user-profile-nav').on('mouseover', function () {
    $('.hover-menu').addClass('show')
  })

  $('.user-profile-nav').on('mouseleave', function () {
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

  $('#filter_categories').on('change', function () {
    let val = $(this).val();
    insertParam('category', val)
  })

  $('#risk_rating').on('change', function () {
    let val = $(this).val();
    insertParam('risk', val)
  })


  if($('.select2') && $('.select2').length) {
    $('.select2').select2({});
  }

  // $('select.has-parent').children('option').attr('disabled', true)

  $('select.parent.sector').on('change', function () {
    $('select.has-parent.sector').val(null).trigger('change');
    let val = $(this).val()
    $('select.has-parent.sector').children('option').each(function () {
      if (val.includes($(this).attr('data-parent'))) {
        $(this).removeAttr('disabled')
      } else {
        $(this).attr('disabled', true)
      }
    })
  })

  $('select.parent.country').on('change', function () {
    $('select.has-parent.country').val(null).trigger('change');
    let val = $(this).val()
    $('select.has-parent.country').children('option').each(function () {
      if (val.includes($(this).attr('data-parent'))) {
        $(this).removeAttr('disabled')
      } else {
        $(this).attr('disabled', true)
      }
    })
  })

  $('#profile_picture').on('change', function () {
    const preview = document.querySelector('#profile_picture_placeholder');
    const input = document.querySelector('#profile_picture');

    // Make sure a file was selected
    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        console.log(e.target.result)
        preview.src = e.target.result;
      }

      reader.readAsDataURL(input.files[0]); // Read the selected file
    }
    else {
      preview.src = "{{ $imageUrl }}"; // Set the default image if no file selected
    }
  })

  // Chart JS Starts
  if($('#ideator-dashboard-chart') && $('#ideator-dashboard-chart').length) {
    const ctx = document.getElementById('ideator-dashboard-chart');
    let labelStatus = $('#ideator-dashboard-chart').attr('data-labels').split(',');
    let valueStatus = $('#ideator-dashboard-chart').attr('data-values').split(',');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labelStatus,
        datasets: [{
          label: 'Count ',
          data: valueStatus,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            display: false
          }
        }
      }
    });
  }

  if ($('#ideaStatusChartRM') && $('#ideaStatusChartRM').length) {
    const ideaStatusChartRM = document.getElementById('ideaStatusChartRM');
    let labelStatusRM = $('#ideaStatusChartRM').attr('data-labels-rm').split(',');
    let valueStatusRM = $('#ideaStatusChartRM').attr('data-values-rm').split(',');

    new Chart(ideaStatusChartRM, {
      type: 'doughnut',
      data: {
        labels: labelStatusRM,
        datasets: [{
          label: "Count",
          data: valueStatusRM,
          backgroundColor: [
            '#28a745',
            '#ffc107'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            display: false
          }
        }
      }
    });
  }

  if ($('#userChart') && $('#userChart').length) {
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
            beginAtZero: true,
            display: false
          }
        }
      }
    });

    if($('#verificationstatusChart') && $('#verificationstatusChart').length) {
      const verificationstatusChart = document.getElementById('verificationstatusChart');
      let labelverification = $('#verificationstatusChart').attr('data-verification-labels').split(',');
      let dataverification = $('#verificationstatusChart').attr('data-verification-values').split(',');
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
              beginAtZero: true,
              display: false
            }
          }
        }
      });
    }


    if($('#statusChart') && $('#statusChart').length) {
      const statusChart = document.getElementById('statusChart');
      let labelstatus = $('#statusChart').attr('data-status-labels').split(',');
      let datastatus = $('#statusChart').attr('data-status-values').split(',');
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
              beginAtZero: true,
              display: false
            }
          }
        }
      });
    }
    }
  // Chart JS Ends

  // Form Validtion Starts

  window.isNumberKey = function(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }

  $('#login-btn').on('click', function() {
    let error = false;
    $('small.error').remove();
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if($('#email').val().trim() === ''){
      error = true;
      $('#email').after('<small class="error text-danger">This field is required</small>');
    }
    if(($('#email').val().trim() !== '') && (!emailReg.test($('#email').val().trim()))) {
      $("#email").after('<small class="error text-danger">Please enter a valid email address</small>');
      error = true;
    }
    if($('#password').val().trim() === ''){
      error = true;
      $('#password').after('<small class="error text-danger">This field is required</small>');
    }

    if(error) {
      return false
    }
    return true
  })

  $('#register-btn').on('click', function() {
    let error = false;
    $('small.error').remove();
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if($('#name').val().trim() === ''){
      error = true;
      $('#name').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#email').val().trim() === ''){
      error = true;
      $('#email').after('<small class="error text-danger">This field is required</small>');
    }

    if(($('#email').val().trim() !== '') && (!emailReg.test($('#email').val().trim()))) {
      $("#email").after('<small class="error text-danger">Please enter a valid email address</small>');
      error = true;
    }

    if($('#number').val().trim() === ''){
      error = true;
      $('#number').after('<small class="error text-danger">This field is required</small>');
    }

    if(($('#number').val().trim() !== '') && ($('#number').val().trim().length !== 10)){
      error = true;
      $('#number').after('<small class="error text-danger">Please enter a valid number</small>');
    }

    if($('#password').val().trim() === ''){
      error = true;
      $('#password').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#password_confirmation').val().trim() === ''){
      error = true;
      $('#password_confirmation').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#password').val().trim() !== $('#password_confirmation').val().trim()){
      error = true;
      $('#password_confirmation').after('<small class="error text-danger">Password & Confirm Password don\'t match</small>');
    }
    

    if(error) {
      return false
    }
    return true
  })
  
  $('#edit-profile-btn').on('click', function() {
    let error = false;
    $('small.error').remove();
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    
    if($('#name').val().trim() === ''){
      error = true;
      $('#name').after('<small class="error text-danger">This field is required</small>');
    }
    
    if($('#email').val().trim() === ''){
      error = true;
      $('#email').after('<small class="error text-danger">This field is required</small>');
    }
    
    if(($('#email').val().trim() !== '') && (!emailReg.test($('#email').val().trim()))) {
      $("#email").after('<small class="error text-danger">Please enter a valid email address</small>');
      error = true;
    }
    
    if(error) {
      return false
    }
    return true
  })
  $('#idea-btn').on('click', function() {
    let error = false;
    $('small.error').remove();
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if($('#title').val().trim() === ''){
      error = true;
      $('#title').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#abstract').val().trim() === ''){
      error = true;
      $('#abstract').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#content').val().trim() === ''){
      error = true;
      $('#content').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#expiry_date').val().trim() === ''){
      error = true;
      $('#expiry_date').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#instruments').val().trim() === ''){
      error = true;
      $('#instruments').after('<small class="error text-danger">This field is required</small>');
    }

    if($('#categories').val().length < 1){
      error = true;
      $('#categories').parent().append('<small class="error text-danger">This field is required</small>');
    }

    if($('#currency').val().length < 1){
      error = true;
      $('#currency').parent().append('<small class="error text-danger">This field is required</small>');
    }

    if($('#major_sector').val().length < 1){
      error = true;
      $('#major_sector').parent().append('<small class="error text-danger">This field is required</small>');
    }

    if($('#minor_sector').val().length < 1){
      error = true;
      $('#minor_sector').parent().append('<small class="error text-danger">This field is required</small>');
    }

    if($('#region').val().length < 1){
      error = true;
      $('#region').parent().append('<small class="error text-danger">This field is required</small>');
    }

    if($('#country').val().length < 1){
      error = true;
      $('#country').parent().append('<small class="error text-danger">This field is required</small>');
    }
    
    if(error) {
      return false
    }
    return true
  })



  // Form Validtion Ends

})