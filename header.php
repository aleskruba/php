<?php
    session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
 
<header>
   
    <nav >
    <div class="container">
                  
 
                 
    <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About me</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
             <?php
        if (isset($_SESSION['userId'])) {
            echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-warning float-right" name="logout-submit">Logout</button>
            </form>';
        } 
        else {
           echo '<form action="includes/login.inc.php" method="post">
           <li class="nav-item "><input type="text" class="form-control " name="uid" placeholder="username"></li>
           <li class="nav-item"><input type="password" class="form-control " name="pwd" placeholder="password"></li>
            <li class="nav-item"> <div class="col-xs-1"><button type="submit" class="btn btn-info pull-right" name="login-submit">Login</button>
            <a  href="signup.php" class="btn btn-warning float-right">Sign Up</a> </li>   </ul>  
            </form> ';
        }
        ?>
            <br>
            </div> 
      
            <br>
               


        
     
  
    <section>


    </section>
        </div>        
  
           
  
        </nav>

</header>
