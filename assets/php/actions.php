<?php
require_once 'functions.php';
//dibuat setelah menggunakan PHPMailer
require_once 'send_code.php';
// print_r($_POST);

//untuk mengunset lupa password
if(isset($_GET['newfp']))
{
    unset($_SESSION['auth_temp']);
    unset($_SESSION['lupa_email']);
    unset($_SESSION['lupa_code']);
}
//fungsi manajement daftar
if(isset($_GET['daftar']))
{
   $response=validateDaftarForm($_POST);
   print_r($response);
   if($response['status'])
   {
    if(createUser($_POST))
    {
        header('location:../../?login');

    }
    else
    {
        echo "<script>alert ('ada yang salah')</script>";
    }
   }
   else
   {
       $_SESSION['error']=$response;
       $_SESSION['formdata']=$_POST;
       header("location:../../?daftar");
   }
}

//fungsi manajement login
if(isset($_GET['login']))
{
    $response=validateLoginForm($_POST);

   print_r($response);
   if($response['status'])
   {
       $_SESSION['Auth'] = true;
       $_SESSION['userdata'] = $response['user']; 

       //ditambahkan setelah menggunakan PHPMailer
       if($response['user']['ac_status']==0)
       {
            $_SESSION['code']= $code = rand(111111,999999);
            sendCode($response['user']['email'],"Veirikasi Email Kamu",$code);
       }

       header("location:../../");


   }
   else
   {
       $_SESSION['error']=$response;
       $_SESSION['formdata']=$_POST;
       header("location:../../?login");
   }
}

//kirim ulang kode
if(isset($_GET['resend_code']))
{
   
         $_SESSION['code']= $code = rand(111111,999999);
         sendCode($_SESSION['userdata']['email'],"Veirikasi Email Kamu",$code);
         header('location:../../?resended');
}

//Verifikasi Email dari kode
if(isset($_GET['verify_email']))
{
   $user_code = $_POST['code'];
   $code = $_SESSION['code'];
   if($code==$user_code)
   {
    
    if(verifyEmail($_SESSION['userdata']['email'])){
        header('location:../../');
    }
    else
    {
        echo "ada yang salah (error)";
    }
   }
   else
   {
       $response['msg']="Kode Verifikasi Salah!";

       if(!$_POST['code'])
       {
           $response['msg']="Masukkan 6 Digit Code!";
       }
       $response['field']='email_verify';
    $_SESSION['error']=$response;
    header('location:../../');
   }
}

//untuk Logout users
if(isset($_GET['logout']))
{
    session_destroy();
    header('location:../../');
}

//Lupa Password
if(isset($_GET['lupapassword']))
{
    if(!$_POST['email'])
    {
        $response['msg']="Masukkan email kamu ";
        $response['field']='email';
        $_SESSION['error']=$response;
        header('location:../../?lupaPassword');
    }
    elseif(!isEmailRegistered($_POST['email']))
    {
            $response['msg']="email tidak terdaftar";
            $response['field']='email'; 
            $_SESSION['error']=$response; 
            header('location:../../?lupaPassword');
    }
    else
    {
        $_SESSION['lupa_email']=$_POST['email'];
        $_SESSION['lupa_code']= $code = rand(111111,999999);
        sendCode($_POST['email'],"Lupa Password ? ",$code);
        header('location:../../?lupapassword&resended');
    }
}

//verifikasi kode lupa password
    if(isset($_GET['verifycode']))
    {
        $user_code = $_POST['code'];
        $code = $_SESSION['lupa_code'];

        if($code==$user_code)
        {
                $_SESSION['auth_temp'] = true;
                header('location:../../');
        }
        else
        {
                $response['msg']="Kode Verifikasi Salah!";

                if(!$_POST['code'])
                {
                    $response['msg']="Masukkan 6 Digit Code!";
                }
        
                $response['field']='email_verify';
                $_SESSION['error']=$response;
                header('location:../../?lupapassword');
        }
}

if(isset($_GET['ubahpassword']))
{
    if(!$_POST['password'])
    {
        $response['msg']="Masukkan password baru ";
        $response['field']='password';
        $_SESSION['error']=$response;
        header('location:../../?lupapassword');
    }
    else
    {
    resetPassword($_SESSION['lupa_email'],$_POST['password']);
    header('location:../../?reseted');
    }
}
?>