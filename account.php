<?php

session_start();

$error = "";
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = trim($_POST['email']);

    if($email == ''){
        $error = "Enter your email address in the format: ...@example.com.";
    }elseif(!preg_match($pattern, $email)) {

        $error = "invalid email address.";

    }else{
        $_SESSION['email'] = $email;
        header("Location: complete_profile.php");
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your Corim account</title>
    
    <style>
        @font-face {
            font-family: "MyFont";
            src: url("../fontstyle/This Night/This Night.woff2") format("woff2");
        }

        @font-face {
            font-family: "AllFont";
            src: url("../fontstyle/Monstserrat/Roboto-Bold.woff2") format("woff2");
        }

        @font-face {
            font-family: "TextFont";
            src: url("../fontstyle/text/LibraSerifModern-Regular.otf") format("otf");
        }

        body{


             font-family: "AllFont";
             margin: 0;
             padding: 0;
        }

        .background{
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('picture/account.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.6);

            
        }

        .content{
            position: relative;
            z-index: 1;
        }

        .text-box{
            display: inline-block;
            background-color: white;
            padding: 20px;
            border-radius: 13px;
            width: 400px;
            height: 370px;
            margin: 0 auto;
            margin-top: 110px;
            margin-left: 550px;
            border: 30px  red;


        }

        .image-box{
            width: 60px;
            margin-left: 30%;   
            margin-top: 8px;         
        }

        .email{
            width: 330px;
            height: 31px;
            margin-left: 22px;
            margin-top: 14px;
            padding: 3px 12px;
            font-size: 16px;
            border: 0.5px double rgba(186, 182, 182, 0.6) ;
            border-bottom: 1px solid  rgba(0, 0, 0, 0.6) ;
            border-radius: 5px;
        
        }

        .email:focus{
            outline: none;
            border: 2.2px solid  rgba(7, 32, 132, 0.6) ;
        }
        

        .btn{
            text-decoration: none;
            display: inline-block;
            margin-left: 22px;
            margin-top: 20px;
            color: white;
            background-color:rgb(27, 116, 198);  
            border-radius: 5px;
            border: none;
            font-size: 15px;
            padding: 9px 162px;
            height: 37px;
            
           
        }

        .btn:hover{
            background-color: rgb(0, 98, 159);;
        }

        #text1{
            margin-top: 10px;
            font-size: 25px;
            margin-left: 45px;
            letter-spacing: 0.5px;
            
        }

        #text2{
            color: rgba(0, 0, 0, 0.7);
            margin-left: 123px;
            margin-top: 10px;
            font-size: 16px;
            font-family: "TextFont";
        }

        #logo-name{
            margin-left: 178px;
            margin-top: -48px;
            font-size: 30px;
            font-family: "MyFont";
            color: rgba(39, 83, 119, 1);
            
        }

        #text-under-box{
            color: rgba(0, 0, 0, 0.7);
            margin-left: 92px;
            margin-top: 34px;
            font-size: 16px;
            font-family: "TextFont";
        }


        #next-sign{
            color: rgb(27, 116, 198);  
            font-weight:bold;  
            font-size: 17px;
            text-decoration: none;
            font-family: "TextFont";
        }

        #next-sign:hover{
            text-decoration:  underline;
            text-decoration-color: rgba(3, 11, 32, 1);
            text-decoration-thickness: 1px;
            
        }

        #error{
            font-size: 13px;
            margin-left: 26px;
            margin-top: 10px;
            color: red;
        }
        
    

    </style>
</head>
<body>

<div class="background">
    <div class="overlay"></div>
    <div class="content">
        <div class="text-box">
            <img src="picture/logoo.png" alt="Italian Trulli" class="image-box">
            <p id="logo-name">Corime</p>
            <h1 id="text1">Create your Crime account</h1>
            <p id="text2">Enter your email address.</p>
            <div>  
                <form  method="post">
                    <input type="text" class="email" name="email" placeholder="Email"  maxlength="50" minlength="5">
                    
                    <?php if($error != ""): ?>
                        <p id="error"><?php echo $error; ?></p>
                    <?php endif ?>
                    
                    <button type="submit" class="btn"  onclick="window.location='complete_profile.php'">Next</button>
                </form>
                
            </div>
            

            <p id="text-under-box">Already have an account? <a  href="sign.php" id="next-sign">Sign in</a></p>

        </div>

    </div>
</div>
    
</body>
</html>