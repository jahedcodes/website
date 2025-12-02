<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$email = $_SESSION['email'];
$name = $_SESSION['old']['name'] ?? '';
unset($_SESSION['errors'], $_SESSION['old']);


?>


<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="complete_profile.css">
    <title>registration</title>

</head>
<body>

<div class="background">
    <div class="overlay"></div>
    <div class="content">
        <div class="text-box">
            <img src="picture/logoo.png" alt="logo" class="logo">
            <p id="logo-name">Corime</p>
            <p id="first-text">create account</p>

            <form method="post" action="validate_profile.php">
                            
                <div class="form-group">
                    <label for="email_label">Enter email</label>
                    <input type="text" id="email" name="email" value=<?php echo $email ?>><br><br>
                </div>


                <div class="form-group">
                <label for="name_label">Your name</label>
                <input type="text" id="name" name="name" placeholder="First name or Last name" value="<?= isset($name)? $name : ''   ?>"><br><br>
                </div>
                
                <?php if(isset($errors['name'])):?>
                    <p id="name-error"><?php echo "❗" . $errors['name']; ?></p>
                <?php endif; ?>

                <div class="form-group">
                <label for="password_label">Password</label>
                <input type="password" id="password" name="password"><br><br>
                </div>

                <?php if(isset($errors['password'])):?>
                    <p id="password-error"><?php echo "❗" . $errors['password']; ?></p>
                <?php endif; ?>

                <div class="form-group">
                <label for="password2_label">Re-enter password</label>
                <input type="password" id="password2" name="password2"  maxlength="40" ><br><br> 
                </div>

                <?php if(isset($errors['confirm'])):?>
                    <p id="comfirm-error"><?php echo "❗" . $errors['confirm']; ?></p>
                <?php endif; ?>
                
                <button type="submit" class="btn"  onclick="window.location=''">Verity email</button>



            </form>
            
            
        </div>

    </div>
</div>
    
</body>
</html>