<?php
session_start();
if(isset($_POST['login'])){
  $u = trim($_POST['user']); // space hata dega
  $p = trim($_POST['pass']);

  if($u=="admin" && $p=="admin123"){
    $_SESSION['admin']=1;
    header("Location: dashboard.php");
    exit(); // ye lagana zaroori hai
  } else { 
    echo "Wrong ID/password - Tumne likha: " . $u . " / " . $p; 
  }
}
?>
<form method="POST">
Username: <input type="text" name="user"><br><br>
Password: <input type="password" name="pass"><br><br>
<button name="login">Login</button>
</form>