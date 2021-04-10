
<script>

  var data = [];

  $(document).ready(function(){
    console.log($().jquery);
    fetch_data();
  });

  function fetch_data(){
    $.ajax({
      url: "{{ route('companies.fetch_data') }}",
      success: function(result){
        company_list(result);
      }
    });
  }

  function company_list(data){
    $.each(data, function(index, result){
      $('#company').append(`<option value="${result.id}">${result.name}</option>`);
    });
  }

  function validate_logo(a, b, data){
    if(a == b){
      $('#company_logo').attr('src', data);
    }
  }

  $('#company').on('change', function(value){
    var selected = $(this).children("option:selected").val();
    $.ajax({
      url: "{{ route('companies.fetch_data') }}",
      success: function(result){
        $.each(result, function(index, data){
          validate_logo(selected, data.id, data.logo);
        });
      }
    });
  });

</script>