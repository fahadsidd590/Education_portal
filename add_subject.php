<?php require_once('./component/Navbar.php') ?>
<?php
$db = new database();
$subject_names = $db->get_all_subject();
if(isset($_GET['subject_status1'])){
    $ms=$_GET['subject_status1'];
    echo "<script>Swal.fire({        
        text: '{$ms}',            
      })</script>";
}
if (isset($_GET['subject_status'])) {
    $status = $_GET['subject_status'];
    if ($status == "Successfully") {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Data saved',
            text: 'Data save successfully',            
          })</script>";
    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Subject already present',
            text: 'Already have this subject',            
          })</script>";
    }
}
if (isset($_POST['subject_submit'])) {
    $subject_name = $_POST['subjectname'];
    $check = $db->add_subject($subject_name);
    if ($check['status'] == "Data insert Successfully") {
        echo "<script>window.location.href = './add_subject.php?subject_status=Successfully'</script>";
    } else {
        echo "<script>window.location.href = './add_subject.php?subject_status=not_Successfully'</script>";
    }
}
if (isset($_POST['subject_level_submit'])) {
    $subject_id = $db->get_Subject_ID($_POST['Subject_name1']);
    $subject_level = $_POST['Subject_level'];
    $status = $db->add_subject_level($subject_id['data']['Subject_ID'], $subject_level);
    print_r($status);
    if ($status['status'] == "added successfully") {
        echo "<script>window.location.href = './add_subject.php?subject_status=Successfully'</script>";
    } else {
        echo "<script>window.location.href = './add_subject.php?subject_status=not_Successfully'</script>";
    }
}
if(isset($_POST['subject_unit_submit'])){
    $subject_name = $_POST['Subject_name2'];
    $levelname=  $_POST['Subject_level2'];
    $unit_name = $_POST['Subject_level_unit'];
    $subject_id= $db->get_Subject_ID($subject_name);
    if($subject_id['status']=="not found"){
        echo "<script>window.location.href = './add_subject.php?subject_status1=not_found_subject'</script>";
    }else{

    $level_id= $db->get_subject_level_id($levelname,$subject_id['data']['Subject_ID']);
    echo $levelname.$subject_id['data']['Subject_ID'];
    if($level_id['status']=="not found"){
        // echo "<script>window.location.href = './add_subject.php?subject_status1=not_found_level'</script>";
    }
    else{
        $check = $db->add_subject_units($subject_id['data']['Subject_ID'],$level_id['data']['Level_ID'],$unit_name);
        if($check['status']=="data added successfully"){
           echo "<script>window.location.href = './add_subject.php?subject_status1=data_added_successfully'</script>";
        }
        else if($check['status']=="not enter successfully"){
            echo "<script>window.location.href = './add_subject.php?subject_status1=data_not_added_successfully'</script>";
        }
    }
    }

}


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Course/Subject</h1>
    </div>
    <!-- Content Row -->
    <!-- add subject -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-9">
                    <form action="./add_subject.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputSubject" class="form-label">Subject Name</label>
                                    <input type="Text" class="form-control" name="subjectname" id="exampleInputSubject" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="subject_submit" value="Add subject" class="btn btn-primary">
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- subject end -->
    <!-- add levels -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Add levels to subjects</h1>
    </div>
    <!-- add levels -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-9">
                    <form action="./add_subject.php" method="POST">
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label for="exampleDataList" class="form-label">Select the subject</label>
                                <input class="form-control" list="datalistOptions" name="Subject_name1" id="exampleDataList" placeholder="Type to search...">
                                <?php
                                if ($subject_names['status'] == "found") {
                                ?>
                                    <datalist id="datalistOptions">
                                        <?php for ($i = 0; $i < count($subject_names['data']); $i++) { ?>
                                            <option value="<?php echo $subject_names['data'][$i][1]; ?>">
                                            <?php } ?>
                                    </datalist>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label for="Subjectlevel" class="form-label">Add the level</label>
                                <input class="form-control" name="Subject_level" id="Subjectlevel" placeholder="Enter the subject level">

                            </div>
                        </div>
                        <input type="submit" name="subject_level_submit" value="Add level" class="btn btn-primary">
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!--end levels  -->
    <!-- add units -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Add Units level of selected subject subjects</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-9">
                    <form action="./add_subject.php" method="POST">
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label for="subject" class="form-label">Select the subject</label>
                                <input class="form-control" list="datalistOptions" name="Subject_name2" id="exampleDataList" placeholder="Type to search...">
                                <?php
                                if ($subject_names['status'] == "found") {
                                ?>
                                    <datalist id="datalistOptions">
                                        <?php for ($i = 0; $i < count($subject_names['data']); $i++) { ?>
                                            <option value="<?php echo $subject_names['data'][$i][1]; ?>">
                                            <?php } ?>
                                    </datalist>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="levels" class="form-label">Select the level</label>
                                <input class="form-control" list="levels1" name="Subject_level2" id="levels" placeholder="Type to search...">

                                <datalist id="levels1">
                                    <datalist id="levels1">
                                        <option value="level 1">
                                        <option value="level 2">
                                        <option value="level 3">
                                        <option value="level 4">
                                        <option value="level 5">
                                    </datalist>
                                </datalist>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label for="Subjectlevelunit" class="form-label">Enter unit name</label>
                                <input class="form-control" name="Subject_level_unit" id="Subjectlevelunit" placeholder="Enter the subject level">

                            </div>
                        </div>
                        <input type="submit" name="subject_unit_submit" value="Add level" class="btn btn-primary">
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- add units -->
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
    setnavbar(3)

    function getselectedimage() {
        let selected_image = document.getElementById("iamgeselected");
        let profile_image = document.getElementById("profilepic");
        profile_image.src = URL.createObjectURL(event.target.files[0])
    }
</script>

</body>

</html>