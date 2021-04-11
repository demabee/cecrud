<script>
  var token = $('input[name="_token"]').val();

  $('#edit-company-profile').on('click', function(){
    $(this).addClass('d-none');
    $(this).removeClass('d-block');
    $('#update-company-profile').addClass('d-block');
    $('#cancel-update').addClass('d-block');
    $('#update-company-profile').removeClass('d-none');
    $('#cancel-update').removeClass('d-none');

    $('#name').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#website').prop('disabled', false);
  });

  $('#cancel-update').on('click', function(){
    $(this).addClass('d-none');
    $(this).removeClass('d-block');
    $('#update-company-profile').addClass('d-none');
    $('#update-company-profile').removeClass('d-block');
    $('#edit-company-profile').addClass('d-block');
    $('#edit-company-profile').removeClass('d-none');

    $('#name').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#website').prop('disabled', true);
  });

  $('#logo').on('change', function(){
    $('#company_logo').attr('src', window.URL.createObjectURL(this.files[0]));
  });
</script>