<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Dashboard</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{url('assets/dashboard/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{url('assets/dashboard/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{url('assets/dashboard/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{url('assets/dashboard/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{url('assets/dashboard/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="{{url('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{url('assets/dashboard/css/admin.css')}}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{url('assets/dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="{{url('assets/dashboard/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{url('assets/dashboard/vendor/dropzone.css')}}" rel="stylesheet">
    <link href="{{url('assets/dashboard/css/date_picker.css')}}" rel="stylesheet">
    
    <!-- Your custom styles -->
    <link href="{{url('assets/dashboard/css/custom.css')}}" rel="stylesheet">

    <!-- WYSIWYG Editor -->
    <link rel="stylesheet" href="{{url('assets/dashboard/js/editor/summernote-bs4.css')}}">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    @include('components.dashboard.navigation')
    <!-- /Navigation-->

    <!-- /.container-wrapper-->
    @yield('content')
    <!-- end -->

    <!-- footer -->
    @include('components.dashboard.footer')
    <!-- end of footer -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{url('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{url('assets/dashboard/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/chart.js/Chart.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/jquery.selectbox-0.2.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/retina-replace.min.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/jquery.magnific-popup.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{url('assets/dashboard/js/admin.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{url('assets/dashboard/js/admin-charts.js')}}"></script>
    <script src="{{url('assets/dashboard/js/admin-datatables.js')}}"></script>

    <script src="{{url('assets/dashboard/vendor/dropzone.min.js')}}"></script>
    <script src="{{url('assets/dashboard/vendor/bootstrap-datepicker.js')}}"></script>
    <script>$('input.date-pick').datepicker();</script>
    <!-- WYSIWYG Editor -->
    <script src="{{url('assets/dashboard/js/editor/summernote-bs4.min.js')}}"></script>
    <script>
    $('.editor').summernote({
    fontSizes: ['10', '14'],
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough']],
    ['fontsize', ['fontsize']],
    ['insert', ['link', 'picture', 'video']],
    ['para', ['ul', 'ol', 'paragraph']]
    ],
        placeholder: 'Write here your description....',
        tabsize: 2,
        height: 500
    });
    </script>
</body>

</html>