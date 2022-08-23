<?php require_once('./component/Navbar.php')?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <!-- Content Row -->
                    <?php 
                  
                    if($_SESSION['role']=='Admin' || $_SESSION['role']=='Manager'){
                    ?>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Managers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas  fa-male fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total teachers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">21</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total
                                                Students
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total classes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-screen-users fa-2x text-gray-300"></i>
                                            <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <!-- Content Row -->
                    <!-- class table -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12 table-responsive">
                            <h1>Class Table</h1>
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Class name</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Link</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Science</td>
                                        <td>John</td>
                                        <td>22/dec/2022</td>
                                        <td>22:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>English</td>
                                        <td>Tonny</td>
                                        <td>31/dec/2022</td>
                                        <td>14:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Biology</td>
                                        <td>Maham</td>
                                        <td>3/dec/2022</td>
                                        <td>12:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4 table-responsive">
                            <h1>Managers</h1>
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Class name</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Link</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Science</td>
                                        <td>John</td>
                                        <td>22/dec/2022</td>
                                        <td>22:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>English</td>
                                        <td>Tonny</td>
                                        <td>31/dec/2022</td>
                                        <td>14:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Biology</td>
                                        <td>Maham</td>
                                        <td>3/dec/2022</td>
                                        <td>12:00</td>
                                        <td>http://hhriohrioerioero</td>
                                        <td><a type="button" class="btn btn-primary">Edit</a>
                                            <a type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script>
    setnavbar(0)

    function getselectedimage() {
        let selected_image = document.getElementById("iamgeselected");
        let profile_image = document.getElementById("profilepic");
        profile_image.src = URL.createObjectURL(event.target.files[0])
    }

    function show_hide_password() {
        let password_field = document.getElementById('exampleFormpassword');
        let eye = document.querySelector('#basic-addon2');
        if (password_field.type == "password") {
            password_field.type = "text";
            eye.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            password_field.type = "password";
            eye.innerHTML = '<i class="fas fa-eye-slash">';
        }
    }
</script>

</body>

</html>