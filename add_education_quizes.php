<?php require_once('./component/Navbar.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Education Quizes</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="row">
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
                                    <label for="exampleFormTitle" class="form-label">Title:</label>
                                    <label for="exampleFormTitle" class="form-label">Quize</label>
                                </div>
                            </div>
                        </div>
                        <!-- picture section -->
                        <div class="row p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add picture questions</h3>
                                <h3>How many question want to enter</h3>
                                <input type="number" name="numberofpicquestion" oninput="addpicquestion()" class="form-control numberofpicquestion">
                                <small>only accept image formate</small>
                                <div class="box_for_show_question">

                                </div>
                            </div>
                        </div>
                        <!-- MCQS upload section -->
                        <div class="row mt-3 p-3" style="border-style:dashed ;">
                            <div class="col-12">
                                <h3>Add Mcqs</h3>
                                <h3>How many Mcqs want to enter</h3>
                                <input type="number" name="numberofmcqquestion" oninput="addmcqquestion()" class="form-control numberofmcqquestion">
                                <div class="box_of_MCQS">
                                 
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
                                            <input class="form-control" style="padding:3px ;" type="file" name="audio" multiple id="formFile" accept=" video/*">
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
    setnavbar(5)

    function addpicquestion() {
        let num = document.querySelector(".numberofpicquestion")
        let data1 = `
        <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="formFile" class="form-label">Please upload a doc or drag</label>
                <input class="form-control" style="padding:3px ;" type="file" name="quiz_picture[]" multiple id="formFile" accept="application/pdf,application/vnd.ms-excel">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add correct answer</label>
                <input type="text" name="correct_answer" class="form-control" placeholder="correct answer">
            </div>
        </div>
    </div>`;
        // console.log(num.value)
        let box = document.querySelector('.box_for_show_question');
        box.innerHTML = "";
        for (let i = 0; i < num.value; i++) {
            box.innerHTML += `<h6>Question number ${i+1}</h6>` + data1;
        }
    }

    function addmcqquestion() {
        let num = document.querySelector(".numberofmcqquestion");
        let data = `     
        <div class="row">
           <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add Mcqs Question</label>
                <input type="text" class="form-control" name="MCQS[]">
            </div>
            </div>
        </div>
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add correct answer</label>
                <input type="text" class="form-control" name="correct[]">
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add other options</label>
                <input type="text" class="form-control" name="otheoption1[]">
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add other option</label>
                <input type="text" class="form-control" name="otheoption2[]">
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add other option</label>
                <input type="text" class="form-control" name="otheoption3[]">
            </div>
        </div>
    </div>`;
let box = document.querySelector('.box_of_MCQS');
box.innerHTML = "";
        for (let i = 0; i < num.value; i++) {
            box.innerHTML += `<h6>Question number ${i+1}</h6>` + data;
        }

    }
</script>

</body>

</html>