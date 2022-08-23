<?php require_once('./component/Navbar.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Education Lecture</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- <div class="col-12 col-md-3">
                                    <p>Profile picture</p>
                                    <img id="profilepic" src="./img/profile.jpg" width="70%" alt="">
                                    <input class="mt-2" onchange="getselectedimage()" id="iamgeselected" type="file" id="myFile" name="filename" style="width:47% ;">
                                </div> -->
                <div class="col-12 col-md-9">
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleDataList" class="form-label">Select subject name</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        <option value="Biology">
                                        <option value="Science">
                                        <option value="Math">
                                        <option value="Computer Science">
                                        <option value="Phycics">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormLevel" class="form-label">Add Level</label>
                                    <input type="email"  class="form-control" id="exampleFormLevel" placeholder="Like: lecture#1,...">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormUnit" class="form-label">Add unit</label>
                                    <input type="email"  class="form-control" id="exampleFormUnit" placeholder="Like: lecture#1,...">
                                </div>
                            </div>
                        </div>
                        <!-- document section -->
                        <div class="row p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add document</h3>
                                <small>only accept pdf,doc formate</small>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Please upload a doc or drag</label>
                                            <input class="form-control" style="padding:3px ;" type="file" name="document" multiple id="formFile" accept="application/pdf,application/vnd.ms-excel">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Add Description</label>
                                            <textarea class="form-control" name="descriptionofdoc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- audio upload section -->
                        <div class="row mt-3 p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add Audio</h3>
                                <small>only accept mp3 formate</small>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Please choice a audio or drag</label>
                                            <input class="form-control" style="padding:3px ;" type="file" name="audio" multiple id="formFile" accept=".mp3,audio/*">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Add Description</label>
                                            <textarea class="form-control" name="descriptionofdoc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- video upload section -->
                        <div class="row mt-3 p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add Video</h3>
                                <small>only accept video formate</small>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Please choice a audio or drag</label>
                                            <input class="form-control" style="padding:3px ;" type="file" name="audio" multiple id="formFile"accept=" video/*">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Add Description</label>
                                            <textarea class="form-control" name="descriptionofdoc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- upload picture  -->
                        <div class="row mt-3 p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add Picture</h3>
                                <small>only accept picture formate</small>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Please choice a audio or drag</label>
                                            <input class="form-control" style="padding:3px ;" type="file" name="audio" multiple id="formFile"accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Add Description</label>
                                            <textarea class="form-control" name="descriptionofdoc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    setnavbar(4)

    function getselectedimage() {
        let selected_image = document.getElementById("iamgeselected");
        let profile_image = document.getElementById("profilepic");
        profile_image.src = URL.createObjectURL(event.target.files[0])
    }
</script>

</body>

</html>