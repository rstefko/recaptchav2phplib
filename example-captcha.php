<html>
  <body>
    <form action="" method="post">
<?php

require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin
$publickey = "";
$privatekey = "";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["g-recaptcha-response"]) {
    $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["g-recaptcha-response"]);

    if ($resp->is_valid) {
            echo "Everything's OK!";
    } else {
            # set the error code so that we can display it
            # use $resp->error for error message
            $error = $resp->error_code;
    }
}
echo recaptcha_get_html($publickey);
?>
    <br/>
    <input type="submit" value="submit" />
    </form>
  </body>
</html>
