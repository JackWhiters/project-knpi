<?php
require_once 'assets/php/functions.php';



// if(isset($_GET['daftar']))
// {
//     showPage('header',['page_title'=>'daftar']);
//     showPage('daftar');

// }
// else if(isset($_GET['login']))
// {
//     showPage('header',['page_title'=>'login']);
//     showPage('login');    
// }


//Level User ditaro setelah menggunakan PHPMailer
if(isset($_SESSION['Auth'])) {
    $user = getUser($_SESSION['userdata']['id']);
}

$pagecount = count($_GET);

// ROUTES atau manajement page
if(isset($_SESSION['Auth']) && $user['ac_status']==1 && !$pagecount)
{
    // echo "Pengguana Telah Login";
    // $userdata = $_SESSION['userdata'];
    // echo "<pre>";
    // print_r($userdata);
    showPage('header',['page_title'=>'dashboard']);
    showPage('navbar');
    showPage('dashboard');

}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==0  && !$pagecount)
{
    showPage('header',['page_title'=>'belom verifikasi']);
    showPage('verify_email');
}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==2  && !$pagecount)
{
    showPage('header',['page_title'=>'super admin -']);
    showPage('navbar');
    showPage('dashboard_super');
}
// elseif(isset($_SESSION['Auth']) && isset($_GET['dashboard_super']) && $user['ac_status']==1)
// {
//     showPage('header',['page_title'=>'dashboard_super']);
//     showPage('navbar');
//     showPage('dashboard_super');
// }
// elseif(isset($_GET['daftar']))
// {
//     showPage('header',['page_title'=>'daftar']);
//     showPage('daftar');

// }
else if(isset($_GET['login']))
{
    showPage('header',['page_title'=>'login']);
    showPage('login');    
}
else if(isset($_GET['lupapassword']))
{
    showPage('header',['page_title'=>'Lupa Password']);
    showPage('forgot_password');    
}
else
{
    if(isset($_SESSION['Auth']) && $user['ac_status']==1)
    {
        showPage('header',['page_title'=>'Dashboard']);
        showPage('navbar');
        showPage('wall');
    }
    elseif(isset($_SESSION['Auth']) && $user['ac_status']==0)
    {
    showPage('header',['page_title'=>'verifikasi email']);
    showPage('verify_email');
    }
    elseif(isset($_SESSION['Auth']) && $user['ac_status']==2 )
    {
    showPage('header',['page_title'=>'super_admin']);
    showPage('super_admin');
    }
    else
    {
        showPage('header',['page_title'=>'Login']);
        showPage('login'); 
    }
  
}


showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);
?>