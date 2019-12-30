<?php
    session_start();
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset = "utf-8">
        <title>City List</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://mbp.yimg.com/sy/os/yaft/yaft-0.3.10.min.js" defer></script>
    </head>
    <body onload="init();">
    <div style ="color:white;">
    <div id=time></div>
<?php   
    $servername = "localhost";
    $username = "colasa2017";
    $password = "XpGEnY92SC";
    $conn = new PDO("mysql:host=$servername;dbname=colasa2017", trim($username),trim($password));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $u = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT * FROM cities");
    $stmt->execute();
    $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt ->fetchAll();
    //var_dump($result);
    echo "Here's a list of the cities!";
    //print values from table  
    echo "<table border = '1'><tr><th>Username</th><th>Password</th><th>City</th><th>State</th><th>Country</th></tr>";
    for($i = 0;$i<count($result);$i++){
         $row = $result[$i];
         echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td><td>";
         echo $row["city"]."</td><td>".$row["state"]."</td><td>".$row["country"]."</td></tr>";
        } echo "</table>";
        
      echo "<p><a href='home.php' class = 'logout'>Click here</a> to add a city</p>";

?>
</div>
</body>
</html>
<script type=text/javascript>

function init()
{
    updateTime();
    window.setInterval(updateTime,5000);
}


function updateTime()
{
    var time = document.getElementById('time');
    time.innerText = new Date().toLocaleString();
}

</script>
