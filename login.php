
<?php
session_start();
$conn =mysqli_connect('localhost','root','','db_school') or die('Unable to connect');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <title>login form</title>
    <style>
body{

background:#033b4a;

}
.login{
width: 400px;
margin:0 auto;
padding: 200px;


}
.login-hader{
    background:#20caa7;
    color:#fff;
    text-align:center;
    padding:14px;
    font-weight:normal;
    margin:0;
}
form{
background:#fff;
padding:15px;


}
form p{

    padding:10px;
    margin:0;

}
form input{
width:100%;
display:block;
border-style:solid;
border-width:1px;
padding: 10px;
box-sizing:border-box;
background-color: #00f4ab0c;
  border:  1px solid #bbb;

}
form input[type="submit"]{
background:#20caa7;
color:#fff;
font-size:.95em;
cursor:pointer;


}
form input[type="submit"]:focus{
    background:#15a076;

}


    </style>
</head>
<body>

    <div class="login">
        <h2 class="login-hader">تسجيل الدخول</h2>
        <form action="" method="post">
            <p><input type="text" name="username"  placeholder="اسم المستخدم" required></p>
            <p><input type="password" name="pass"  placeholder="كلمة المرور" required></p>
            <p><input type="submit" name="login" value="سجل الان"></p>
</form>
</div>
<?php
if(isset($_POST['login'])){

    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $select=mysqli_query($conn,"SELECT *FROM td_student WHERE username='$username' AND pass='$pass'");
    $row=mysqli_fetch_array($select);

   

    if(is_array($row)){
        $_SESSION["username"]=$row ['username'];
        $_SESSION["pass"]=$row['pass'];
        header('location:ho.php');
    }
    
    else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid username or password");';
        echo 'window.location.href="login.php"';
        echo '</script>';



    }
}

if(isset($SESSION["username"])){
    header("Location:login.php");


}



?>
</body>
</html>