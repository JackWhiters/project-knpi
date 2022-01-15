<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/icons/bootstrap-icons.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="assets/php/actions.php?login">
                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="assets/images/pictogram.png" alt="" height="45">
                </div>
                <h1 class="h5 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="text" name="username_email" value="<?=showFormData('username_email') ?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">username/email</label>
                </div>
                <?=showError('username_email')?>

                <div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">password</label>
                </div>
                <?=showError('password')?>
                <?=showError('checkuser')?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Masuk Euy</button>

                </div>
                <a href="?lupapassword" class="text-decoration-none">Lupa Password ?</a>
            </form>
        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>