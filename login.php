<?php
    session_start();
    $_SESSION['username'] =  $_POST['user'];
    $_SESSION['password'] =  $_POST['passw'];
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset = "utf-8">
        <script src="https://mbp.yimg.com/sy/os/yaft/yaft-0.3.10.min.js" defer></script>
    </head>
    <body>
<?php   
    $servername = "localhost";
    $username = "colasa2017";
    $password = "XpGEnY92SC";
    $conn = new PDO("mysql:host=$servername;dbname=colasa2017", trim($username),trim($password));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $u = $_POST['user'];
    $p = $_POST['passw'];
    if (!$u || !$p ) {
        header('Location:index.php?unfilled');
        exit;}
    $stmt = $conn->prepare("SELECT * FROM users WHERE username ='$u' && password = '$p'");
    $stmt->execute();
    $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt ->fetchAll(); 
    if (count($result)>0){
        header('Location:home.php');
        exit;
    }else{
        header('Location:index.php?msg');
        exit;
    }
  
      
    $conn =null;
?>
</body>
</html>
