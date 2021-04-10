
<script>

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
</script>