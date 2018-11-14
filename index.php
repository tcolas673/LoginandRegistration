<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration</title>
    <link rel="stylesheet" href = "style.css">
    <script src="https://mbp.yimg.com/sy/os/yaft/yaft-0.3.10.min.js" defer></script>
</head>
<body onload="init();">
   <div id=time style ="color:white;" ></div>
   <div class = "output">
    <?php
    if(isset($_GET['msg'])){  
        
        echo "Username or Password is incorrect! Please try again.";
          
    }else if(isset($_GET['errorCode']) ){
        
        echo "Username exits already! Try again!";
        
    } else if(isset($_GET['success'])){
        
        $Message = '<b>Registration successful! Please login.</b>';
        echo $Message;
        
    } else if(isset($_GET['unfilled'])){
        echo "One or more of the required fields have not been entered. Please try again!";
    }
    ?>
    </div>
   <div class = "login-page">
   <div class = "form">
       <form action = "registration.php" class="register-form" method = "post">
       <input type="text" name="user" placeholder="Enter username"/>
       <input type="password" name="passw" placeholder="Enter password"/>
       <input type="text" name="email" placeholder="email address"/>
       <button>Create</button>
       <p class = "message">Already Registered?<a href="#">Login</a></p>
       </form>
       
       <form action = "login.php" class="login-form" method = "post">
       <input type ="text" name="user" placeholder = "Enter username">
       <input type ="password" name="passw" placeholder = "Enter password">
       <button>login</button>
       <p class = "message">Not Registered?<a href="#">Register</a></p>
       </form>
    </div>
    </div>
    <script src = 'https://code.jquery.com/jquery-3.2.1.min.js'></script>
    <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow")
        });
    </script>
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
