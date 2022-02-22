<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farmaga Warehouse</title>

    @include('includes/style')
    @include('includes.script')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('sweetalert::alert')
        @include('includes.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('includes.navbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            @include('includes.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Halo, {{Auth::user()->name}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> -->
            <div class="modal-body">
                <div class="page-content page-container" id="page-content">

                    <div class="row container d-flex justify-content-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25"> <img src="{{ url('backend/img/male.png')}}"
                                                    class="img-radius" style="max-width:100px;max-height:100px;"
                                                    alt="User-Profile-Image"> </div>
                                            <h6 class="f-w-600">{{Auth::user()->name }}</h6>
                                            <p></p> <i
                                                class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400">{{Auth::user()->email}}</h6>
                                                </div>
                                               
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Username</p>
                                                    <h6 class="text-muted f-w-400">{{Auth::user()->username}}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Kode Divisi</p>
                                                    <h6 class="text-muted f-w-400">{{ Auth::user()->cabang }}</h6>
                                                </div>
                                            </div>
                                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="facebook" data-abc="true"><i
                                                            class="mdi mdi-facebook feather icon-facebook facebook"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="twitter" data-abc="true"><i
                                                            class="mdi mdi-twitter feather icon-twitter twitter"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="instagram" data-abc="true"><i
                                                            class="mdi mdi-instagram feather icon-instagram instagram"
                                                            aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</body>

</html>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('backend/js/sb-admin-2.min.js')}}"></script>

