<?php 


session_start();

require_once './db_connect.php';


$stu_name = filter_var($_POST['stu_name'],FILTER_SANITIZE_STRING);
$phone = $_POST['phone'];
$email =filter_var( $_POST['email'],FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];
$pass_len = strlen($password);



$all_caps = preg_match("@[A-Z]@",$password);
$all_small = preg_match("@[a-z]@",$password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$all_chars = preg_match($pattern,$password);


if($stu_name==null || $phone==null || $email==null || $password==null){
    $_SESSION['reg_err'] = "Please fild requred all filds";
    header("Location: register_info.php");
}else{
   if(strlen($phone) == 11){
        if($email){
            if($pass_len >=6 && $all_caps == 1 && $all_small == 1 && $all_chars == 1){
                    
                $sql = "SELECT COUNT(*) AS total_email FROM tbl_student WHERE email='$email'";
                $email_count = mysqli_query($db_connect,$sql);
                $total_email = mysqli_fetch_assoc($email_count);
                // print_r($total_email);

            if($total_email['total_email'] == 0){

                        $encrypt_pass = md5($password);
                        $sql ="INSERT INTO tbl_student (stu_name,phone,email,password) VALUES ('$stu_name','$phone','$email','$encrypt_pass')";
                        $insert_query = mysqli_query($db_connect,$sql);
                        if($insert_query){
                            $_SESSION['reg_err'] = "Congratulations! Registation Successfully";
                            header("Location: register_info.php");
                        }
                        else{
                            $_SESSION['reg_err'] = "Registation Failed";
                            header("Location: register_info.php");
                        }
                }else{
                 $_SESSION['reg_err'] = "All reday Registerted";
                 header("Location: register_info.php");
                }    
           }else{
              $_SESSION['reg_err'] = "Password must be at last 1 Caps, 1 Small, 1 Special Character and 6 character";
              header("Location: register_info.php");
            }
        }else{
            $_SESSION['reg_err'] = 'Invalid Email';
            header("Location: register_info.php");
        }
   }else{
        $_SESSION['reg_err'] ='Please inter vaild phone number';
        header("Location: register_info.php");
   }
}

 



?>