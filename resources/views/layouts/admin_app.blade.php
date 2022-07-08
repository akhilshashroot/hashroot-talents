<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Stakefield </title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{asset('plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<!-- Custom Css -->
<link  rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/color_skins.css')}}">
</head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">        
        <div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
        <p>Please wait...</p>
        <!-- <div class="m-t-30"><img src="{{asset('images/logo.svg')}}" width="48" height="48" alt="admin"></div> -->
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('home')}}">Stakefield Talents</a>
        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
       </ul>
        <ul class="nav navbar-nav navbar-right"> 
            <li class="dropdown">
                <a href="{{route('changePasswordGet')}}"  role="button">Change Password
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks list-unstyled">
                            <li><a href="javascript:void(0);">
                                <h4> Footer display issue <small>72%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                <h4> Make new buttons <small>56%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                <h4> Create new dashboard <small>68%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                <h4> Solve transition issue <small>77%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                <h4> Answer GitHub questions <small>87%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="footer"><a href="javascript:void(0);">View All Tasks</a></li>
                </ul>
            </li>
            
            <li><form action="{{ route('logout') }}" method="post">
@csrf.
<button type="submit"><i class="zmdi zmdi-power"></i></button>
</form></li>
            <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"></a></li>
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="{{asset('images/xs/avatar1.jpg')}}" width="48" height="48" alt="User" /> </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Admin User</div>
            <div class="email">{{{ isset(Auth::user()->email) ? Auth::user()->email : Auth::user()->email }}}</div>
            <div class="btn-group user-helper-dropdown"> <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li class="divider"></li>
                    <li><a href="sign-in.html"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info --> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('home')}}" class=""><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{route('enquirylist')}}" class=""><i class="zmdi zmdi-accounts-list"></i><span>Enquiry List</span></a>
            </li>
        </ul>
    </div>
    <!-- #Menu --> 
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane in active in active slideRight" id="skins">
                <div class="slim_scroll">
                <h6>Flat Color</h6>
                <ul class="choose-skin">                   
                    <li data-theme="purple"><div class="purple"></div><span>Purple</span></li>
                    <li data-theme="blue"><div class="blue"></div><span>Blue</span></li>
                    <li data-theme="cyan"><div class="cyan"></div><span>Cyan</span></li>
                </ul>                    
                <h6>Multi Color</h6>
                <ul class="choose-skin">                        
                    <li data-theme="black"><div class="black"></div><span>Black</span></li>
                    <li data-theme="deep-purple"><div class="deep-purple"></div><span>Deep Purple</span></li>
                    <li data-theme="red"><div class="red"></div><span>Red</span></li>                        
                </ul>                    
                <h6>Gradient Color</h6>
                <ul class="choose-skin">                    
                    <li data-theme="green"><div class="green"></div><span>Green</span> </li>
                    <li data-theme="orange" class="active"><div class="orange"></div><span>Orange</span></li>
                    <li data-theme="blush"><div class="blush"></div><span>Blush</span></li>
                </ul>
            </div>
        </div>
    </div>
</aside>

@yield('content')

@yield('modal')



<!-- Jquery Core Js --> 
<script src="{{asset('bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<!-- Jquery DataTable Plugin Js --> 
<script src="{{asset('bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css --> 
<script src="{{asset('plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js --> 

<script src="{{asset('js/pages/forms/form-validation.js')}}"></script> 

<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('js/fontadmin.js')}}" crossorigin='anonymous'></script>
<script>
    function editfn(id) {
        console.log("hi");
        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = "{{ route('employee.edit', ":id") }}";
    url = url.replace(':id', id);
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#largeModal').modal('show');
            $('#name').val(res.name);
            $('#email').val(res.email);
            $('#phone').val(res.phone);
            $('#skillset').val(res.skill_set);
            $('#experience').val(res.experience);
            $('#time').val(res.turnaround_time);
            $('#availability').val(res.availability);
            $('#rate').val(res.rate);
            $('#talentid').val(res.employee_id);
            $('#comments').val(res.comments);
            $('#userid').val(id);
            $('#ectc').val(res.ectc);
            let updateurl = "{{ route('employee.update', ':id') }}";
            updateurl = updateurl.replace(':id', id);
            //$("#employee_add").attr("method", "patch");
            //$('#employee_add').attr('action', updateurl);
        }
      });
    }
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
      function resetfn() {
        $('#form_validation').trigger("reset");
        $('#userid').val('');
      }
      $(function () {
    $('#changepwd_form').validate({
        rules: {
            'current-password': {
                required: true
            },
            'new-password': {
                required: true
            },
            'new-password-confirm': {
                required: true,
                equalTo : "#new-password"
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
});
function deletefn(id) {
    let updateurl = "{{ route('employee.destroy', ':id') }}";
    updateurl = updateurl.replace(':id', id);
    $('#deleteform').attr('action', updateurl);
}
function viewfn(talentid) {
        console.log(talentid);
        var talentid = $.trim(talentid);
        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = "{{ route('employee.show', ":talentid") }}";
    url = url.replace(':talentid', talentid);
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function(res) {
            
            if(Object.keys(res).length === 0) {
                console.log(Object.keys(res).length);
                $("#viewheader").html("<h4 class='modal-title head' id='viewModalLabel'>View Employee <b style='color:red;'>(Removed)</b></h4>");
            } else {
                $("#viewheader").html("<h4 class='modal-title head' id='viewModalLabel'>View Employee</h4>");
            }
            $('#empname').val(res.name);
            $('#empemail').val(res.email);
            $('#empphone').val(res.phone);
            $('#empskillset').val(res.skill_set);
            $('#empexperience').val(res.experience);
            $('#emptime').val(res.turnaround_time);
            $('#empavailability').val(res.availability);
            $('#emprate').val(res.rate);
            $('#empectc').val(res.ectc);
            $('#emptalentid').val(res.employee_id);
            $('#empcomment').val(res.comments);

        }
      });
    }
</script>
</body>
</html>