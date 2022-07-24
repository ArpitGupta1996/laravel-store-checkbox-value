<!DOCTYPE html>
<html>
<head>
<title>Multiselect Dropdown With Checkbox In Laravel - Tutsmake.com </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-info">
<br /><br />
<div class="container" style="width:600px;">
<h2 align="center">Multiselect Dropdown With Checkbox In Laravel- Tutsmake.com</h2>
<br /><br />
<form method="post" id="category_form">
<div class="form-group">
<label>Select</label>
<select id="category" name="name[]" multiple class="form-control" >
<option value="Codeigniter">Codeigniter</option>
<option value="CakePHP">CakePHP</option>
<option value="Laravel">Laravel</option>
<option value="YII">YII</option>
<option value="Zend">Zend</option>
<option value="Symfony">Symfony</option>
<option value="Phalcon">Phalcon</option>
<option value="Slim">Slim</option>
</select>
</div>
<div class="form-group">
<input type="submit" class="btn btn-info" name="submit" value="Submit" />
</div>
</form>
<br />
</div>
</body>
<script>
$(document).ready(function(){
    $('#category').multiselect({
        nonSelectedText: 'Select category',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
    });
    
    $('#category_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url:"{{ url('store') }}",
        method:"POST",
        data:form_data,
        success:function(data)
        {
            $('#category option:selected').each(function(){
                $(this).prop('selected', false);
            });
        
            $('#category').multiselect('refresh');
                alert(data['success']);
        }
        });
    });
});
</script>
</html>