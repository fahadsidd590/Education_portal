<?php
class database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "education_portal";
    private $conn;
    private $sql;
    public function __construct()
    {
        $this->conn =  new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }       
    }
    public function check_email($email)
    {
        $this->sql = "SELECT * FROM `employees_login` WHERE User_Email='$email'";
        $result = $this->conn->query($this->sql);
        return $result;
    }
    public function Registar_Employee($email, $f_name, $l_name, $phone, $language, $role, $password,$profilepic)
    {
        $result = $this->check_email($email);
        if ($result->num_rows > 0) {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User is already registar!',                
              })</script>";
        } else {
            $this->sql = "INSERT INTO `employees_login`(`User_Email`, `User_Password` ,`User_First_Name`, `User_Last_Name`, `User_Phone_num`, `User_language`, `User_Role`, `Profile_Pic`)
             VALUES ('$email','$password','$f_name','$l_name','$phone','$language','$role','$profilepic')";
            if ($this->conn->query($this->sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function Get_password($email)
    {
        $result = $this->check_email($email);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $password12 = $row['User_Password']; 
                $f_name= $row['User_First_Name'];
                $l_name= $row['User_Last_Name'];
                $role = $row['User_Role'];     
                $phone = $row['User_Phone_num']; 
                $profile_pic = $row['Profile_Pic'];                     
            }
            return array("Fname"=>$f_name,"Lname"=>$l_name,"password"=>$password12,"Role"=>$role,"email"=>$email,"Profile_Pic"=>$profile_pic,"phone"=>$phone);
        } else {
            return "not found";
        }
    }
    public function Get_info($email){
        $result = $this->check_email($email);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              return array('status'=>"found",'data'=>$row);
            }
          } else {
            return array('status'=>"not found");
          }        

    }
    public function update_user_data($email,$fname,$lname,$Pnum,$language,$profile_pic){
        $this->sql ="UPDATE `employees_login` SET User_First_Name='$fname',User_Last_Name='$lname',User_language='$language',User_Phone_num='$Pnum',Profile_Pic='$profile_pic' WHERE User_Email= '$email'";
        if ($this->conn->query($this->sql) === TRUE) {
          return array('status'=>"Data update Successfully");
          } else {
            return array('status'=>"Error updating record: " . $this->conn->error);
          }
    }
    public function add_subject($subject_name){
        $this->sql= "INSERT INTO `subjects`( `Subject_Name`) VALUES ('$subject_name')";
        if ($this->conn->query($this->sql) === TRUE) {
            return array('status'=>"Data insert Successfully");
            } else {
              return array('status'=>"Error updating record: " . $this->conn->error);
            }
    }
    public function get_Subject_ID($subject_name){
        $this->sql= "SELECT * FROM subjects WHERE Subject_Name = '$subject_name'" ;
        $result= $this->conn->query($this->sql);
        if($result->num_rows > 0){
            $row= $result->fetch_assoc();
            return array('status'=>"found",'data'=>$row);
        }
        else{
            return array('status'=>"not found");
        }
    }
    public function get_all_subject(){
        $this->sql= "SELECT * FROM subjects ";
        $result= $this->conn->query($this->sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_all();
            return array('status'=>"found",'data'=>$row);
              
            
          } else {
            return array('status'=>"not found");
          }
    }
    public function add_subject_level($subject_id,$subject_level){
        $this->sql = "INSERT INTO `subject_levels`(`Subject_ID` ,`Level_Name`) 
         VALUES ('$subject_id','$subject_level')";
        $result = $this->conn->query($this->sql);
        if($result==true){
            return array('status'=>"added successfully");
        } 
        else{
            return array('status'=>"not added");
        }
    }
    public function get_subject_level_id($subject_level,$subjectid){
        $this-> sql="SELECT * FROM `subject_levels` WHERE Level_Name= '$subject_level' and Subject_ID= '$subjectid'";
        $result = $this->conn->query($this->sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return array('status'=>"found",'data'=>$row);
        }
        else{
            return array('status'=>"not found");
        }
    }
    public function add_subject_units($subject_id,$subject_level_id,$unit_name){
        $this->sql = "INSERT INTO `subject_levels_units`(`Subject_ID`, `Level_ID`, `Units_name`) VALUES ('$subject_id','$subject_level_id','$unit_name')";
        $result = $this->conn->query($this->sql);
        if($result==true){
            return array('status'=>"data added successfully");
        }
        else{
            return array('status'=>"not enter successfully");
        }
    }
}