<?php
require_once 'config.php';
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("DATABASE GAGAL KONEK");
//Fungsi untuk menampilkan pages
function showPage($page,$data="")
{
    include("assets/pages/$page.php");
}

//fungsi untuk menampilkan error
function showError($field)
{
    if(isset($_SESSION['error']))
    {
        $error =$_SESSION['error'];
        // if($field==$error['field'])
        //Undefied Array fix
        if(isset($error['field']) && $field==$error['field'])
        {
            ?>
            <div class="alert alert-danger my-2" role="alert"><?=$error['msg'] ?></div>
            <?php
        }
    }
}

//check duplicate username
function isUsernameRegistered($username)
{
    global $db;

    $query="SELECT count(*) as row FROM users WHERE username='$username'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}



//check duplicate email
function isEmailRegistered($email)
{
    global $db;

    $query="SELECT count(*) as row FROM users WHERE email='$email'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

//fungi untuk menampilkan form data sebelumnya setelah daftar
function showFormData($field)
{
    if(isset($_SESSION['formdata']))
    {
        $formdata = $_SESSION['formdata'];
        return $formdata[$field];
    }
}


//untuk validasi form pendaftaraan
function validateDaftarForm($form_data)

{
    $response=array();
    $response['status']=true;
    if(!$form_data['password'])
    {
        $response['msg']="password tidak boleh kosong";
        $response['status']=false;
        $response['field']='password';

    }
    if(!$form_data['username'])
    {
        $response['msg']="username tidak boleh kosong";
        $response['status']=false;
        $response['field']='username';

    }
    if(!$form_data['email'])
    {
        $response['msg']="email tidak boleh kosong";
        $response['status']=false;
        $response['field']='email';

    }
    if(!$form_data['last_name'])
    {
        $response['msg']="last name tidak boleh kosong";
        $response['status']=false;
        $response['field']='last_name';

    }
    if(!$form_data['first_name'])
    {
        $response['msg']="first name tidak boleh kosong";
        $response['status']=false;
        $response['field']='first_name';

    }

    //Validasi Email duplikat
    if(isEmailRegistered($form_data['email']))
    {
        $response['msg']="email telah terdaftar";
        $response['status']=false;
        $response['field']='email';
    }

    //Validasi Username Duplikat
    if(isUsernameRegistered($form_data['username']))
    {
        $response['msg']="username telah terdaftar";
        $response['status']=false;
        $response['field']='username';
    }


    return $response;
}



//untuk membuat user baru
function createUser($data)
{
    global $db;
    $first_name = mysqli_real_escape_string($db,$data['first_name']);
    $last_name = mysqli_real_escape_string($db,$data['last_name']);
    $gender = $data['gender'];
    $email= mysqli_real_escape_string($db,$data['email']);
    $username= mysqli_real_escape_string($db,$data['username']);
    $password= mysqli_real_escape_string($db,$data['password']);
    $password = md5($password);


    $query = "INSERT INTO users(first_name,last_name,gender,email,username,password)";
    $query .="VALUES ('$first_name','$last_name',$gender,'$email','$username','$password')";
    return mysqli_query($db,$query);
}

//untuk validasi form Login
function validateLoginForm($form_data)

{
    $response=array();
    $response['status']=true;
    $blank = false;
    if(!$form_data['password'])
    {
        $response['msg']="password tidak boleh kosong";
        $response['status']=false;
        $response['field']='password';
        $blank=true;

    }

    if(!$form_data['username_email'])
    {
        $response['msg']="username/email tidak boleh kosong";
        $response['status']=false;
        $response['field']='username_email';
        $blank=true;

    }

    if(!$blank && !checkUser($form_data)['status'])
    {
        $response['msg']="username tidak ada";
        $response['status']=false;
        $response['field']='checkuser';

    }
    else
    {
        $response['user'] = checkUser($form_data)['user'];
    }

    return $response;


}
    //untuk check user
    function checkUser($login_data)
    {
        global $db;
        $username_email = $login_data['username_email'];
        $password = md5($login_data['password']);
        
        $query = "SELECT * FROM users WHERE (email='$username_email' || username='$username_email') && password = '$password'";
        $run = mysqli_query($db,$query);
        $data['user'] = mysqli_fetch_assoc($run)??array();
        if(count($data['user'])>0)
        {
            $data['status'] = true;
        }
        else
        {
            $data['status'] = false;
        }

        return $data;
    }

    //untuk mendapatkan user berdasarkan id
    function getUser($user_id)
    {
        global $db;
        
        $query = "SELECT * FROM users WHERE id=$user_id";
        $run = mysqli_query($db,$query);
        return mysqli_fetch_assoc($run);
    }

    //fungsi untuk verifikasi email (PHPMailer)
    function verifyEmail($email)
    {
        global $db;
        $query="UPDATE users SET ac_status=1 WHERE email='$email'";
        return mysqli_query($db,$query);
    }

    //fungsi Reset password dari lupa password
    function resetPassword($email,$password)
    {
        global $db;
        $password=md5($password);
        $query="UPDATE users SET password='$password' WHERE email='$email'";
        return mysqli_query($db,$query);
    }
    
    //Untuk Validasi Form Update
    function validateUpdateForm($form_data,$image_data)

{
    $response=array();
    $response['status']=true;

    if(!$form_data['username'])
    {
        $response['msg']="username tidak boleh kosong";
        $response['status']=false;
        $response['field']='username';

    }   
    if(!$form_data['last_name'])
    {
        $response['msg']="last name tidak boleh kosong";
        $response['status']=false;
        $response['field']='last_name';

    }
    if(!$form_data['first_name'])
    {
        $response['msg']="first name tidak boleh kosong";
        $response['status']=false;
        $response['field']='first_name';

    }


    //Validasi Username Duplikat
    if(isUsernameRegisteredByOther($form_data['username']))
    {
        $response['msg']= $form_data['username']." telah terdaftar";
        $response['status']=false;
        $response['field']='username';
    }

    if($image_data['name'])
    {
        $image = basename($image_data['name']);
        $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $size = $image_data['size']/2000;
        if($type!=='jpg'&& $type!='jpeg' && $type!='png')
        {
            $response['msg']="Format Gambar yang di izinkan hanya Jpg,Jpeg,png";
            $response['status']=false;
            $response['field']='profile_pic';
    
        }

        if($size>2000)
        {
            $response['msg']="Upload gambar maksimal 2 mb";
            $response['status']=false;
            $response['field']='profile_pic';
        }
    }


    return $response;
}
    //check duplicate username by other
    function isUsernameRegisteredByOther($username)
    {
        global $db;
        $user_id=$_SESSION['userdata']['id'];
        $query="SELECT count(*) as row FROM users WHERE username='$username' && id!=$user_id";
        $run=mysqli_query($db,$query);
        $return_data = mysqli_fetch_assoc($run);
        return $return_data['row'];
    }
?>