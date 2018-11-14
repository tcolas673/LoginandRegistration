<?php
    session_start();
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
    $password = "T+HqsamGrX";
    $conn = new PDO("mysql:host=$servername;dbname=colasa2017", trim($username),trim($password));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //variables
    $u = $_SESSION['username'];
    $p = $_SESSION['password'];
    $city = $_POST['City'];
    $s = $_POST['State'];
    $c = $_POST['Country'];
    //check if their empty
    if (!$u || !$p || !$c || !$s || !$city) {
        header('Location:home.php?unfilled');
        exit;
    }
    //add values to the table    
    $reg = $conn->prepare("insert into cities(username, password, city, state, country) values('$u', '$p', '$city', '$s', '$c')");
    $reg->execute();
    header('Location:home.php?filled');
?>
</body>
</html>
