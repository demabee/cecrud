
<script>
  var token = $('input[name="_token"]').val();

  $(document).ready(function(){
    fetch_specific_employee_in_company();
  });

  function fetch_specific_employee_in_company(){
    
    $('#employee-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('employee.fetch_specific_employee_in_company') }}",
      columns: [
        {
          data: 'DT_RowIndex', name: 'DT_RowIndex',
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                $(nTd).addClass('text-center');
             }
        },
        {
          data: 'first_name', name: 'first_name'
        },
        { data: 'last_name', name: 'last_name' },
        { data: 'emp_email', name: 'email' },
        { data: 'phone', name: 'contact' },
        { data: 'is_active', name: 'status',
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                if(oData.is_active == 1){
                  $(nTd).html('<span class="badge rounded-pill bg-success text-white">Active</span>');
                } else {
                  $(nTd).html('<span class="badge rounded-pill bg-danger text-white">Deactivated</span>');
                }
             }
        },
        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true
        },
      ],
    }); 
  }

  $('#addEmployee').on('click', function(){
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#emp_email').val();
    var phone = $('#phone').val();

    $.ajax({
      url: "{{ route('employee.add') }}",
      method: "POST",
      data: {
        first_name: firstName,
        last_name: lastName,
        emp_email: email,
        phone: phone,
        _token: token
      },
      success: function(data){
        $('#addModal').modal('hide');
        $('#firstName').val('');
        $('#lastName').val('');
        $('#emp_email').val('');
        $('#phone').val('');
        $('#success').removeClass('d-none');
        $('#success').removeClass('d-block');
        $('#success-text').text(data);
        $('#employee-table').DataTable().ajax.reload();
      }
    })
  });

  $(document).on('click', '#edit-employee', function(e){
    e.preventDefault();

    var id = $(this).attr('data-id');

    $.ajax({
      url: "{{ route('employee.edit') }}",
      data: {
        id
      },
      success: function(data){
        $('#edit-firstName').attr('value', data.first_name);
        $('#edit-lastName').attr('value', data.last_name);
        $('#edit-email').attr('value', data.emp_email);
        $('#edit-phone').attr('value', data.phone);
        $('#editEmployee').attr('data-id', data.id);
      }
    });
  });

  $('#editEmployee').on('click', function(){
    var id = $(this).attr('data-id');

    var firstName = $('#edit-firstName').val();
    var lastName = $('#edit-lastName').val();
    var email = $('#edit-email').val();
    var phone = $('#edit-phone').val();

    $.ajax({
      url: "{{ route('employee.update') }}",
      method: "POST",
      data: {
        id,
        first_name: firstName,
        last_name: lastName,
        emp_email: email,
        phone: phone,
        _token: token
      },
      success: function(data){
        $('#editModal').modal('hide');
        $('#edit-firstName').val('');
        $('#edit-lastName').val('');
        $('#edit-email').val('');
        $('#edit-phone').val('');
        $('#success').removeClass('d-none');
        $('#success').removeClass('d-block');
        $('#success-text').text(data);
        $('#employee-table').DataTable().ajax.reload();
      }
    });
  });

  $(document).on('click', '#deactivate-employee', function(){
    var id = $(this).attr('data-id');

    $.ajax({
      url: "{{ route('employee.conf_deact') }}",
      data: {
        id
      },
      success: function(data){
        $('#first_name').text(data.first_name);
        $('#last_name').text(data.last_name);
        $('#deactivateEmployee').attr('data-id', data.id);
      }
    });
  });

  $(document).on('click', '#deactivateEmployee', function(){
    var id = $(this).attr('data-id');

    $.ajax({
      url: "{{ route('employee.deactivate') }}",
      data: {
        id
      },
      success: function(data){
        $('#deactivateModal').modal('hide');
        $('#success').removeClass('d-none');
        $('#success').removeClass('d-block');
        $('#success-text').text(data);
        $('#employee-table').DataTable().ajax.reload();
      }
    })
  });
</script>