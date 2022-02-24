<?php

function authenticate($email, $password)
{
    global $db;

    $statement = $db->prepare("
        SELECT COUNT(*) FROM users
        WHERE email=:email AND password=:password AND status='ACTIVE'
    ");

    $statement->execute([
        'email' => $email,
        'password' => md5($password),
    ]);
    
    return $statement->fetchColumn();
}

function prepareUserSession($email)
{
    global $db;

    $statement = $db->prepare("
        SELECT * FROM users
        WHERE email=:email
    ");

    $statement->execute([
        'email' => $email,
    ]);
    
    $_SESSION['_user'] = $statement->fetch(PDO::FETCH_ASSOC);
}

function redirect($location)
{
    header('location:' . $location);
    exit();
}

// Type: success|danger|warning|info
function flashMsg()
{
    echo $_SESSION['_flash_msg'];
    unset($_SESSION['_flash_msg']);
}

function setMsg($message, $type = 'danger')
{
    $_SESSION['_flash_msg'] = '
        <div class="alert alert-' . $type . '" role="alert">
            ' . $message . '
        </div>
    ';
}

function validateLogin()
{
    if (isset($_SESSION['_user']) && !empty($_SESSION['_user'])) {
        redirect('/dashboard.php');
    }
}

function sendMail($subject, $message, $receipents, $headers = [])
{
    if (!is_array($receipents) || empty($receipents)) {
        return false;
    }

    require_once BASE_DIR . '/vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '9e2544de8f7b35';                     //SMTP username
        $mail->Password   = '4e4f4bf0cc3b1f';                               //SMTP password
        $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@example.com');
        foreach ($receipents as $receipent) {
            $mail->addAddress($receipent);
        }
        $mail->addReplyTo('noreply@example.com');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
        exit;
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
