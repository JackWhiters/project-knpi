<?php
global $user;

?>
    <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="assets/php/actions.php?verify_email">
                <div class="d-flex justify-content-center">


                </div>
                <h1 class="h5 mb-3 fw-normal">Verifikasi Email Kamu (<?=$user['email'] ?>)</h1>


                <p>Enter 6 Digit Code Sended to You</p>
                <div class="form-floating mt-1">

                    <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">######</label>
                </div>

    
                <?php
                if(isset($_GET['resended']))
                    {
                     ?>
                     <p class="text-success">Kode Verifikasi Telah Dikirim Ulang! </p>
                     <?php
                    }
                ?>
                <?=showError('email_verify');?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Verifikasi Email</button>
                    <a href="assets/php/actions.php?resend_code" class="text-decoration-none" type="submit">Kirim Ulang Kode</button>





                </div>
                <br>
                <a href="assets/php/actions.php?logout" class="text-decoration-none mt-5"><i class="bi bi-arrow-left-circle-fill"></i>
                    Logout</a>
            </form>
        </div>
    </div>