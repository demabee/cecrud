
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
                // $(nTd).addClass('text-center');
             }
        },
        {
          data: 'first_name', name: 'first_name'
        },
        { data: 'last_name', name: 'last_name' },
        { data: 'email', name: 'email' },
        { data: 'phone', name: 'contact' },
        { data: 'is_active', name: 'status',
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            console.log(oData.is_active);
                if(oData.is_active == 1){
                  $(nTd).html('<span class="badge rounded-pill bg-success text-white">Active</span>');
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
    var email = $('#email').val();
    var phone = $('#phone').val();

    $.ajax({
      url: "{{ route('employee.add') }}",
      method: "POST",
      data: {
        first_name: firstName,
        last_name: lastName,
        email: email,
        phone: phone,
        _token: token
      },
      success: function(data){
        console.log(data);
        $('#addModal').modal('hide');
        $('#firstName').val('');
        $('#lastName').val('');
        $('#email').val('');
        $('#phone').val('');
      }
    })
  });

</script>