<?php require 'includes/connection.php' ?>
<?php require 'includes/functions.php' ?>
<?php

sendMail('test', '<h1>Hi There</h1>', ['test@test.ocm']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <?php require 'includes/head.php'; ?>
</head>
<body class="text-center">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <main class="form-signin">
        <form method="POST" action="/login-action.php">
            <img class="mb-4" src="/assets/images/bootstrap.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Forgot Password</h1>
            <?php flashMsg(); ?>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
    </main>
</body>
</html>