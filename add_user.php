<?php require_once('./component/Navbar.php') ?>
<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$database = new database();
if (isset($_POST['update'])) {
    $mail = new PHPMailer(true);
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $langaue = $_POST['language'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $profilepic = $f_name . ".png";
    mkdir("./img/" . $email);
    $from = "img/user-default-img.png";
    $to = "img/" . $email . "/user-default-img.png";
    copy($from, $to);
    rename("img/" . $email . "/user-default-img.png", "img/" . $email . "/" . $f_name . ".png");
    $password1 = password_hash($password, PASSWORD_DEFAULT);
    $registar = $database->Registar_Employee($email, $f_name, $l_name, $phone, $langaue, $role, $password1, $profilepic);
    if ($registar == true) {
        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = "smtp.stackmail.com";                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'info@teckteam.org';                     //SMTP username
            $mail->Password   = 'Ot19662c0';                               //SMTP passwo      //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom("info@teckteam.org", "Tech Team LLC");
            $mail->addAddress($email, $f_name);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Client user name and password ";
            $mail->Body   = "your user name is " . $email . " your password is " . $password;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Done',
            text: 'User is  registar!'})</script>";
    } else {
        echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User is already registar!',                
                  })</script>";
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-3">
                    <p>Profile picture</p>
                    <img id="profilepic" src="./img/user-default-img.png" width="90%" alt="">
                    <!-- <input class="mt-2" onchange="getselectedimage()" id="iamgeselected" type="file" id="myFile" name="filename" style="width:47% ;"> -->
                </div>
                <div class="col-12 col-md-9">
                    <form action="./add_user.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First
                                        Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="f_name" placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Last
                                        Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2" name="l_name" placeholder="Enter your last name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="Enter your phonenumber" required>

                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <select required class="form-select form-control" name="language" aria-label="Default select example" id="languages" name="languages">
                                                <option>Select Language</option>
                                                <option value="af">Afrikaans</option>
                                                <option value="sq">Albanian - shqip</option>
                                                <option value="am">Amharic - ????????????</option>
                                                <option value="ar">Arabic - ??????????????</option>
                                                <option value="an">Aragonese - aragon??s</option>
                                                <option value="hy">Armenian - ??????????????</option>
                                                <option value="ast">Asturian - asturianu</option>
                                                <option value="az">Azerbaijani - az??rbaycan dili</option>
                                                <option value="eu">Basque - euskara</option>
                                                <option value="be">Belarusian - ????????????????????</option>
                                                <option value="bn">Bengali - ???????????????</option>
                                                <option value="bs">Bosnian - bosanski</option>
                                                <option value="br">Breton - brezhoneg</option>
                                                <option value="bg">Bulgarian - ??????????????????</option>
                                                <option value="ca">Catalan - catal??</option>
                                                <option value="ckb">Central Kurdish - ?????????? (???????????????? ????????????)</option>
                                                <option value="zh">Chinese - ??????</option>
                                                <option value="zh-HK">Chinese (Hong Kong) - ??????????????????</option>
                                                <option value="zh-CN">Chinese (Simplified) - ??????????????????</option>
                                                <option value="zh-TW">Chinese (Traditional) - ??????????????????</option>
                                                <option value="co">Corsican</option>
                                                <option value="hr">Croatian - hrvatski</option>
                                                <option value="cs">Czech - ??e??tina</option>
                                                <option value="da">Danish - dansk</option>
                                                <option value="nl">Dutch - Nederlands</option>
                                                <option value="en">English</option>
                                                <option value="en-AU">English (Australia)</option>
                                                <option value="en-CA">English (Canada)</option>
                                                <option value="en-IN">English (India)</option>
                                                <option value="en-NZ">English (New Zealand)</option>
                                                <option value="en-ZA">English (South Africa)</option>
                                                <option value="en-GB">English (United Kingdom)</option>
                                                <option value="en-US">English (United States)</option>
                                                <option value="eo">Esperanto - esperanto</option>
                                                <option value="et">Estonian - eesti</option>
                                                <option value="fo">Faroese - f??royskt</option>
                                                <option value="fil">Filipino</option>
                                                <option value="fi">Finnish - suomi</option>
                                                <option value="fr">French - fran??ais</option>
                                                <option value="fr-CA">French (Canada) - fran??ais (Canada)</option>
                                                <option value="fr-FR">French (France) - fran??ais (France)</option>
                                                <option value="fr-CH">French (Switzerland) - fran??ais (Suisse)</option>
                                                <option value="gl">Galician - galego</option>
                                                <option value="ka">Georgian - ?????????????????????</option>
                                                <option value="de">German - Deutsch</option>
                                                <option value="de-AT">German (Austria) - Deutsch (??sterreich)</option>
                                                <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                                <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                                <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                                <option value="el">Greek - ????????????????</option>
                                                <option value="gn">Guarani</option>
                                                <option value="gu">Gujarati - ?????????????????????</option>
                                                <option value="ha">Hausa</option>
                                                <option value="haw">Hawaiian - ????lelo Hawai??i</option>
                                                <option value="he">Hebrew - ??????????</option>
                                                <option value="hi">Hindi - ??????????????????</option>
                                                <option value="hu">Hungarian - magyar</option>
                                                <option value="is">Icelandic - ??slenska</option>
                                                <option value="id">Indonesian - Indonesia</option>
                                                <option value="ia">Interlingua</option>
                                                <option value="ga">Irish - Gaeilge</option>
                                                <option value="it">Italian - italiano</option>
                                                <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                                <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                                <option value="ja">Japanese - ?????????</option>
                                                <option value="kn">Kannada - ???????????????</option>
                                                <option value="kk">Kazakh - ?????????? ????????</option>
                                                <option value="km">Khmer - ???????????????</option>
                                                <option value="ko">Korean - ?????????</option>
                                                <option value="ku">Kurdish - Kurd??</option>
                                                <option value="ky">Kyrgyz - ????????????????</option>
                                                <option value="lo">Lao - ?????????</option>
                                                <option value="la">Latin</option>
                                                <option value="lv">Latvian - latvie??u</option>
                                                <option value="ln">Lingala - ling??la</option>
                                                <option value="lt">Lithuanian - lietuvi??</option>
                                                <option value="mk">Macedonian - ????????????????????</option>
                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                <option value="ml">Malayalam - ??????????????????</option>
                                                <option value="mt">Maltese - Malti</option>
                                                <option value="mr">Marathi - ???????????????</option>
                                                <option value="mn">Mongolian - ????????????</option>
                                                <option value="ne">Nepali - ??????????????????</option>
                                                <option value="no">Norwegian - norsk</option>
                                                <option value="nb">Norwegian Bokm??l - norsk bokm??l</option>
                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                <option value="oc">Occitan</option>
                                                <option value="or">Oriya - ???????????????</option>
                                                <option value="om">Oromo - Oromoo</option>
                                                <option value="ps">Pashto - ????????</option>
                                                <option value="fa">Persian - ??????????</option>
                                                <option value="pl">Polish - polski</option>
                                                <option value="pt">Portuguese - portugu??s</option>
                                                <option value="pt-BR">Portuguese (Brazil) - portugu??s (Brasil)</option>
                                                <option value="pt-PT">Portuguese (Portugal) - portugu??s (Portugal)</option>
                                                <option value="pa">Punjabi - ??????????????????</option>
                                                <option value="qu">Quechua</option>
                                                <option value="ro">Romanian - rom??n??</option>
                                                <option value="mo">Romanian (Moldova) - rom??n?? (Moldova)</option>
                                                <option value="rm">Romansh - rumantsch</option>
                                                <option value="ru">Russian - ??????????????</option>
                                                <option value="gd">Scottish Gaelic</option>
                                                <option value="sr">Serbian - ????????????</option>
                                                <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                                <option value="sn">Shona - chiShona</option>
                                                <option value="sd">Sindhi</option>
                                                <option value="si">Sinhala - ???????????????</option>
                                                <option value="sk">Slovak - sloven??ina</option>
                                                <option value="sl">Slovenian - sloven????ina</option>
                                                <option value="so">Somali - Soomaali</option>
                                                <option value="st">Southern Sotho</option>
                                                <option value="es">Spanish - espa??ol</option>
                                                <option value="es-AR">Spanish (Argentina) - espa??ol (Argentina)</option>
                                                <option value="es-419">Spanish (Latin America) - espa??ol (Latinoam??rica)</option>
                                                <option value="es-MX">Spanish (Mexico) - espa??ol (M??xico)</option>
                                                <option value="es-ES">Spanish (Spain) - espa??ol (Espa??a)</option>
                                                <option value="es-US">Spanish (United States) - espa??ol (Estados Unidos)</option>
                                                <option value="su">Sundanese</option>
                                                <option value="sw">Swahili - Kiswahili</option>
                                                <option value="sv">Swedish - svenska</option>
                                                <option value="tg">Tajik - ????????????</option>
                                                <option value="ta">Tamil - ???????????????</option>
                                                <option value="tt">Tatar</option>
                                                <option value="te">Telugu - ??????????????????</option>
                                                <option value="th">Thai - ?????????</option>
                                                <option value="ti">Tigrinya - ????????????</option>
                                                <option value="to">Tongan - lea fakatonga</option>
                                                <option value="tr">Turkish - T??rk??e</option>
                                                <option value="tk">Turkmen</option>
                                                <option value="tw">Twi</option>
                                                <option value="uk">Ukrainian - ????????????????????</option>
                                                <option value="ur">Urdu - ????????</option>
                                                <option value="ug">Uyghur</option>
                                                <option value="uz">Uzbek - o???zbek</option>
                                                <option value="vi">Vietnamese - Ti???ng Vi???t</option>
                                                <option value="wa">Walloon - wa</option>
                                                <option value="cy">Welsh - Cymraeg</option>
                                                <option value="fy">Western Frisian</option>
                                                <option value="xh">Xhosa</option>
                                                <option value="yi">Yiddish</option>
                                                <option value="yo">Yoruba - ??d?? Yor??b??</option>
                                                <option value="zu">Zulu - isiZulu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <select class="form-select form-control" name="role" aria-label="Default select example" required>
                                                <option selected>Please select the role</option>
                                                <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                    <option value="Admin">Admin</option>
                                                <?php } ?>
                                                <option value="Manager">Manager</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput4" placeholder="Enter your email" name="email" required>
                                </div>
                                <label for="exampleFormpassword" class="form-label">Password</label>
                                <div class="input-group mb-3 ">

                                    <input type="password" class="form-control" id="exampleFormpassword" name="password" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text" id="basic-addon2" onclick="show_hide_password()"><i class="fas fa-eye-slash"></i>
                                        <!-- <i class="fas fa-eye"></i> -->
                                    </span>
                                </div>
                                <input type="submit" name="update" value="Submit" class="btn btn-primary" id="">
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
<script src="js/demo/chart-pie-demo.js"></script>
<script>
    setnavbar(2)

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