<?php require_once('./component/Navbar.php') ?>
<?php
$db = new database();
$user_info = $db->Get_info($_SESSION['email']);
if(isset($_GET['status'])){
     if($_GET['status']=="Successfully"){
        echo "<script>Swal.fire(
            'Successfully updated!',
            'your profile Successfully updated!',
            'success'
          )</script>";
     }
     else{
        echo "<script>Swal.fire(
            'system eerror!',
            'System error!',
            'error'
          )</script>";
     }
}
$langauges= json_decode($user_info['data']['User_language']);
if (isset($_POST['update'])) {
    $img_name = $_FILES['filename']['name'];
    $img_size = $_FILES['filename']['size'];
    $img_type = $_FILES['filename']['type'];
    $img_tmp_name = $_FILES['filename']['tmp_name'];
    $error = $_FILES['filename']['error'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $lang = $_POST['languages'];
    // print_r($lang);
    $lang = json_encode($lang);
    if ($error == 0) {
        $img_upload = "./img/" . $email . "/" . $img_name;
        move_uploaded_file($img_tmp_name, $img_upload);
        $img_upload = $img_name;
    } else {
        $img_upload = $_SESSION['profile_pic'];
    }
    $update = $db->update_user_data($email, $fname, $lname, $phone, $lang, $img_upload);
    if($update['status']=="Data update Successfully"){
        echo "<script>window.location.href = './profile.php?status=Successfully'</script>";
        die();
    }
    else{
        echo "<script>window.location.href = './profile.php?status=unSuccessfully'</script>";
        die();
    }
}
$userpass = $db->Get_password($_SESSION['email']);

?>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <form action="./profile.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <p>Profile picture</p>
                        <img id="profilepic" src="<?php echo './img/' . $_SESSION['email'] . '/' . $userpass['Profile_Pic']; ?>" width="70%" alt="">
                        <input type="file" name="filename" accept="image/png, image/gif, image/jpeg" class="mt-2" onchange="getselectedimage()" id="iamgeselected" style="width:100% ;">
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First
                                        Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="fname" placeholder="Enter your first name" value="<?php echo $userpass['Fname']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Last
                                        Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2" name="lname" placeholder="Enter your last name" value="<?php echo $userpass['Lname']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="Enter your phonenumber" value="<?php echo $userpass['phone']; ?>">

                                </div>
                                <div class="mb-3">
                                    <select class="form-select form-control"  multiple aria-label="Default select example" id="languages" name="languages[]">
                                        <option>Select Language</option>
                                        <?php 
                                        for($i = 0 ;$i<count($langauges);$i++){
                                        ?>
                                        <option selected value="<?php echo $langauges[$i]; ?>"><?php echo $langauges[$i]; ?></option>
                                       <?php }?>
                                        <option  value="Afrikaans">Afrikaans</option>
                                        <option value="Albanian - shqip">Albanian - shqip</option>
                                        <option value="Amharic - ????????????">Amharic - ????????????</option>
                                        <option value="Arabic - ??????????????">Arabic - ??????????????</option>
                                        <option value="Aragonese - aragon??s">Aragonese - aragon??s</option>
                                        <option value="Armenian - ??????????????">Armenian - ??????????????</option>
                                        <option value="Asturian - asturianu">Asturian - asturianu</option>
                                        <option value="Azerbaijani - az??rbaycan dili">Azerbaijani - az??rbaycan dili</option>
                                        <option value="Basque - euskara">Basque - euskara</option>
                                        <option value="Belarusian - ????????????????????">Belarusian - ????????????????????</option>
                                        <option value="Bengali - ???????????????">Bengali - ???????????????</option>
                                        <option value="Bosnian - bosanski">Bosnian - bosanski</option>
                                        <option value="Breton - brezhoneg">Breton - brezhoneg</option>
                                        <option value="Bulgarian - ??????????????????">Bulgarian - ??????????????????</option>
                                        <option value="Catalan - catal??">Catalan - catal??</option>
                                        <option value="Central Kurdish">Central Kurdish - ?????????? (???????????????? ????????????)</option>
                                        <option value="Chinese - ??????">Chinese - ??????</option>
                                        <option value="Chinese (Hong Kong) - ??????????????????">Chinese (Hong Kong) - ??????????????????</option>
                                        <option value="Chinese (Simplified) - ??????????????????">Chinese (Simplified) - ??????????????????</option>
                                        <option value="Chinese (Traditional) - ??????????????????">Chinese (Traditional) - ??????????????????</option>
                                        <option value="Corsican">Corsican</option>
                                        <option value="Croatian - hrvatski">Croatian - hrvatski</option>
                                        <option value="Czech - ??e??tina">Czech - ??e??tina</option>
                                        <option value="Danish - dansk">Danish - dansk</option>
                                        <option value="Dutch - Nederlands">Dutch - Nederlands</option>
                                        <option value="English">English</option>
                                        <option value="English (Australia)">English (Australia)</option>
                                        <option value="English (Canada)">English (Canada)</option>
                                        <option value="English (India)">English (India)</option>
                                        <option value="English (New Zealand)">English (New Zealand)</option>
                                        <option value="English (South Africa)">English (South Africa)</option>
                                        <option value="English (United Kingdom)">English (United Kingdom)</option>
                                        <option value="English (United States)">English (United States)</option>
                                        <option value="Esperanto - esperanto">Esperanto - esperanto</option>
                                        <option value="Estonian - eesti">Estonian - eesti</option>
                                        <option value="Faroese - f??royskt">Faroese - f??royskt</option>
                                        <option value="Filipino">Filipino</option>
                                        <option value="Finnish - suomi">Finnish - suomi</option>
                                        <option value="French - fran??ais">French - fran??ais</option>
                                        <option value="French (Canada) - fran??ais (Canada)">French (Canada) - fran??ais (Canada)</option>
                                        <option value="French (France) - fran??ais (France)">French (France) - fran??ais (France)</option>
                                        <option value="French (Switzerland) - fran??ais (Suisse)">French (Switzerland) - fran??ais (Suisse)</option>
                                        <option value="Galician - galego">Galician - galego</option>
                                        <option value="Georgian - ?????????????????????">Georgian - ?????????????????????</option>
                                        <option value="German - Deutsch">German - Deutsch</option>
                                        <option value="German (Austria) - Deutsch (??sterreich)">German (Austria) - Deutsch (??sterreich)</option>
                                        <option value="German (Germany) - Deutsch (Deutschland)">German (Germany) - Deutsch (Deutschland)</option>
                                        <option value="German (Liechtenstein) - Deutsch (Liechtenstein)">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                        <option value="German (Switzerland) - Deutsch (Schweiz)">German (Switzerland) - Deutsch (Schweiz)</option>
                                        <option value="Greek - ????????????????">Greek - ????????????????</option>
                                        <option value="Guarani">Guarani</option>
                                        <option value="Gujarati - ?????????????????????">Gujarati - ?????????????????????</option>
                                        <option value="Hausa">Hausa</option>
                                        <option value="Hawaiian - ????lelo Hawai??i">Hawaiian - ????lelo Hawai??i</option>
                                        <option value="Hebrew - ??????????">Hebrew - ??????????</option>
                                        <option value="Hindi - ??????????????????">Hindi - ??????????????????</option>
                                        <option value="Hungarian - magyar">Hungarian - magyar</option>
                                        <option value="Icelandic - ??slenska">Icelandic - ??slenska</option>
                                        <option value="Indonesian - Indonesia">Indonesian - Indonesia</option>
                                        <option value="Interlingua">Interlingua</option>
                                        <option value="Irish - Gaeilge">Irish - Gaeilge</option>
                                        <option value="Italian - italiano">Italian - italiano</option>
                                        <option value="Italian (Italy) - italiano (Italia)">Italian (Italy) - italiano (Italia)</option>
                                        <option value="Italian (Switzerland) - italiano (Svizzera)">Italian (Switzerland) - italiano (Svizzera)</option>
                                        <option value="Japanese - ?????????">Japanese - ?????????</option>
                                        <option value="Kannada - ???????????????">Kannada - ???????????????</option>
                                        <option value="Kazakh - ?????????? ????????">Kazakh - ?????????? ????????</option>
                                        <option value="Khmer - ???????????????">Khmer - ???????????????</option>
                                        <option value="Korean - ?????????">Korean - ?????????</option>
                                        <option value="Kurdish - Kurd??">Kurdish - Kurd??</option>
                                        <option value="Kyrgyz - ????????????????">Kyrgyz - ????????????????</option>
                                        <option value="Lao - ?????????">Lao - ?????????</option>
                                        <option value="Latin">Latin</option>
                                        <option value="Latvian - latvie??u">Latvian - latvie??u</option>
                                        <option value="Lingala - ling??la">Lingala - ling??la</option>
                                        <option value="Lithuanian - lietuvi??">Lithuanian - lietuvi??</option>
                                        <option value="Macedonian - ????????????????????">Macedonian - ????????????????????</option>
                                        <option value="Malay - Bahasa Melayu">Malay - Bahasa Melayu</option>
                                        <option value="Malayalam - ??????????????????">Malayalam - ??????????????????</option>
                                        <option value="Maltese - Malti">Maltese - Malti</option>
                                        <option value="Marathi - ???????????????">Marathi - ???????????????</option>
                                        <option value="Mongolian - ????????????">Mongolian - ????????????</option>
                                        <option value="Nepali - ??????????????????">Nepali - ??????????????????</option>
                                        <option value="Norwegian - norsk">Norwegian - norsk</option>
                                        <option value="Norwegian Bokm??l - norsk bokm??l">Norwegian Bokm??l - norsk bokm??l</option>
                                        <option value="Norwegian Nynorsk - nynorsk">Norwegian Nynorsk - nynorsk</option>
                                        <option value="Occitan">Occitan</option>
                                        <option value="Oriya - ???????????????">Oriya - ???????????????</option>
                                        <option value="Oromo - Oromoo">Oromo - Oromoo</option>
                                        <option value="Pashto - ????????">Pashto - ????????</option>
                                        <option value="Persian - ??????????">Persian - ??????????</option>
                                        <option value="Polish - polski">Polish - polski</option>
                                        <option value="Portuguese - portugu??s">Portuguese - portugu??s</option>
                                        <option value="Portuguese (Brazil) - portugu??s (Brasil)">Portuguese (Brazil) - portugu??s (Brasil)</option>
                                        <option value="Portuguese (Portugal) - portugu??s (Portugal)">Portuguese (Portugal) - portugu??s (Portugal)</option>
                                        <option value="Punjabi - ??????????????????">Punjabi - ??????????????????</option>
                                        <option value="Quechua">Quechua</option>
                                        <option value="Romanian - rom??n??">Romanian - rom??n??</option>
                                        <option value="Romanian (Moldova) - rom??n?? (Moldova)">Romanian (Moldova) - rom??n?? (Moldova)</option>
                                        <option value="Romansh - rumantsch">Romansh - rumantsch</option>
                                        <option value="Russian - ??????????????">Russian - ??????????????</option>
                                        <option value="Scottish Gaelic">Scottish Gaelic</option>
                                        <option value="Serbian - ????????????">Serbian - ????????????</option>
                                        <option value="Serbo-Croatian - Srpskohrvatski">Serbo-Croatian - Srpskohrvatski</option>
                                        <option value="Shona - chiShona">Shona - chiShona</option>
                                        <option value="Sindhi">Sindhi</option>
                                        <option value="Sinhala - ???????????????">Sinhala - ???????????????</option>
                                        <option value="Slovak - sloven??ina">Slovak - sloven??ina</option>
                                        <option value="Slovenian - sloven????ina">Slovenian - sloven????ina</option>
                                        <option value="Somali - Soomaali">Somali - Soomaali</option>
                                        <option value="Southern Sotho">Southern Sotho</option>
                                        <option value="Spanish - espa??ol">Spanish - espa??ol</option>
                                        <option value="Spanish (Argentina) - espa??ol (Argentina)">Spanish (Argentina) - espa??ol (Argentina)</option>
                                        <option value="Spanish (Latin America) - espa??ol (Latinoam??rica)">Spanish (Latin America) - espa??ol (Latinoam??rica)</option>
                                        <option value="Spanish (Mexico) - espa??ol (M??xico)">Spanish (Mexico) - espa??ol (M??xico)</option>
                                        <option value="Spanish (Spain) - espa??ol (Espa??a)">Spanish (Spain) - espa??ol (Espa??a)</option>
                                        <option value="Spanish (United States) - espa??ol (Estados Unidos)">Spanish (United States) - espa??ol (Estados Unidos)</option>
                                        <option value="Sundanese">Sundanese</option>
                                        <option value="Swahili - Kiswahili">Swahili - Kiswahili</option>
                                        <option value="Swedish - svenska">Swedish - svenska</option>
                                        <option value="Tajik - ????????????">Tajik - ????????????</option>
                                        <option value="Tamil - ???????????????">Tamil - ???????????????</option>
                                        <option value="Tatar">Tatar</option>
                                        <option value="Telugu - ??????????????????">Telugu - ??????????????????</option>
                                        <option value="Thai - ?????????">Thai - ?????????</option>
                                        <option value="Tigrinya - ????????????">Tigrinya - ????????????</option>
                                        <option value="Tongan - lea fakatonga">Tongan - lea fakatonga</option>
                                        <option value="Turkish - T??rk??e">Turkish - T??rk??e</option>
                                        <option value="Turkmen">Turkmen</option>
                                        <option value="Twi">Twi</option>
                                        <option value="Ukrainian - ????????????????????">Ukrainian - ????????????????????</option>
                                        <option value="Urdu - ????????">Urdu - ????????</option>
                                        <option value="Uyghur">Uyghur</option>
                                        <option value="Uzbek - o???zbek">Uzbek - o???zbek</option>
                                        <option value="Vietnamese - Ti???ng Vi???t">Vietnamese - Ti???ng Vi???t</option>
                                        <option value="Walloon - wa">Walloon - wa</option>
                                        <option value="Welsh - Cymraeg">Welsh - Cymraeg</option>
                                        <option value="Western Frisian">Western Frisian</option>
                                        <option value="Xhosa">Xhosa</option>
                                        <option value="Yiddish">Yiddish</option>
                                        <option value="Yoruba - ??d?? Yor??b??">Yoruba - ??d?? Yor??b??</option>
                                        <option value="Zulu - isiZulu">Zulu - isiZulu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">Email</label>
                                    <input type="email" class="form-control disabled" id="exampleFormControlInput4" placeholder="Enter your email" name="email" value="<?php echo $userpass['email']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">Role: <?php echo $userpass['Role']; ?></label>
                                </div>
                                <?php if($user_info['data']['User_Role']==""){}?>
                                <input type="submit" name="update" value="Update" class="btn btn-primary" id="">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
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
                    <span aria-hidden="true">??</span>
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
<script>
    setnavbar(1)
</script>
<script src="js/demo/chart-pie-demo.js"></script>
<script>
    function getselectedimage() {
        let selected_image = document.getElementById("iamgeselected");
        let profile_image = document.getElementById("profilepic");
        profile_image.src = URL.createObjectURL(event.target.files[0])
    }
</script>

</body>

</html>