<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://mbp.yimg.com/sy/os/yaft/yaft-0.3.10.min.js" defer></script>
</head>
<body onload="init();">
  <div style="color:white">
  <h1> Welcome <?php echo $_SESSION['username']; ?></h1>
  </div>
    <div class = "output">
    <?php 
    if(isset($_GET['unfilled'])){
        echo "One or more of the required fields have not been entered. Please try again!";
    }else if(isset($_GET['filled'])){
        echo"City successfully added to list";
    }
    ?>
    </div>
   <div id="time" style="color:white;" float="left"></div>
   <div class="login-page">
   <div class="form">
       <form action="table.php" method="post">
       <p class="message">What's your favorite city? Tell us below</p>
       <input type="text" name="City" placeholder="City">
       <input type="text" name="State" placeholder="State">
       <input type="text" name="Country" placeholder="Country">
       <button>Submit</button>
       </form>
       <form action="print.php">
       <input type="submit" value="print" class = "adjust">
       <a href="logout.php" class = "logout">Logout</a>
       </form>
    </div>
    </div>


<script type="text/javascript">

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
</body>
</html>