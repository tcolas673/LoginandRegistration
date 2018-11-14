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



try {
    $username = "colasa2017";
    $password = "T+HqsamGrX";
    $conn = new PDO("mysql:host=$servername;dbname=colasa2017", trim($username),trim($password));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "drop table if exists patientrecords3"
    //if($sql)$conn->exec($sql)
    //be careful will destroy data if you drop the table
    //$sql = "create table users(username varchar(9),";
    //$sql .="password varchar(25), email varchar(25));";
    //$conn->exec($sql);
    //echo "New table created successfully<br>";
    //now insert data
    $u = $_POST['user'];
    $passw = $_POST['passw'];
    $e = $_POST['email'];
    if (!$u || !$passw || !$e) {
        header('Location:index.php?unfilled');
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE username ='$u'");
    $stmt->execute();
    $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt ->fetchAll();
    if (count($result)>0){
        header("Location:index.php?errorCode=wrongUsername");
        exit;
    }else{
        $reg = $conn->prepare("insert into users(username, password, email) values('$u', '$passw', '$e')");
        $reg->execute();
        header("Location:index.php?success=correctusername");
        exit;
        }
    //$sql = "insert into users values ('999999999',";
    //$sql .="'Pan', 'Peter', NULL);";
    //$conn->exec($sql)
    //echo "New record created successfully in table patientrecords3";
    //try{
    //$sql ="select * from patientrecords3 where lname = 'Pan';";
    //$stmt = $conn->prepare("SELECT * FROM patientrecords3 WHERE lname ='Pan'");
    //$stmt->execute();
    //$flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt ->fetchAll();
    //var_dump($result);
    //if (count($result)>0){
      //  echo "<table><tr><th>First Name</th><th>Last Name</th><th>SSN</th><th>Zip Code</th></tr>";
       // for($i = 0, i<count($result);$i++){
         //   $row = $result[$i];
           // echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>";
            //echo .$row["socialsecuritynumber"]."</td><td>".$row["zipcode"]."</td></tr>";
        //} echo "</table>";
    //}else{echo "0 results";}
    //}catch (PDOException $e){
      //  echo $sql . "<br>" . $e->getMessage();
//    }
    $conn =null;
   }catch(PDOException $e){
   echo "Connection failed: " . $e->getMessage();}
?>
</body>
</html>