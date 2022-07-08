<html>
<head>
    <title>Laravel 8 Datatables Filter with Dropdown - web-tuts.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
     
<div class="container">
    <h1>Laravel 8 Datatables Filter with Dropdown - web-tuts.com</h1>
      
    <div class="card">
        <div class="card-body">
            
        </div>
    </div>
 
    <table class="table table-bordered data-table">
    <div class="form-group">
                <label><strong>Approved :</strong></label>
                <select id='approved' class="form-control" style="width: 200px">
                    <option value="">Approved</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                </select>
            </div>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Approved</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
     
</body>
     
<script type="text/javascript">


  $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('customsearch.index') }}",
          data: function (d) {
                d.approved = $('#approved').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'approved', name: 'approved'},
        ]
    });
  
    $('#approved').change(function(){
        table.draw();
    });
      
  });
</script>
</html>