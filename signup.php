<?php
    require "header.php";
?>
<section>
<main>
<div class="container">
<h1>Signup</h1>
<?php

if (isset($_GET['error']) ) {

    if ($_GET['error'] == "emptyfields") {
        echo '<p class="signuperror"> Fill in all fields </p>';    
    }
    else if ($_GET['error'] == "invalidmail") {
        echo '<p class="signuperror"> Invalid email </p>';    
    }
    else if ($_GET['error'] == "passwordcheck") {
        echo '<p class="signuperror">Paswords do not match</p>';    
    }
    else if ($_GET['error'] == "usertaken") {
        echo '<p class="signuperror">Username or email already taken</p>';    
    }
}
elseif (isset($_GET['signup']) ) {
        if ($_GET['signup'] == "success") {
        echo '<p class="signuperror">Succesfully logged</p>';    
}
}
  
?>

<form action="includes/signup.inc.php" method="POST">
<div class="form-group row">    
<div class="col-xs-3">  
    <input class="form-control" type="text" name="uid" placeholder="Username">
    <input class="form-control" type="text" name="mail" placeholder="E-mail">
    <input class="form-control" type="password" name="pwd" placeholder="Password">
    <input class="form-control" type="password" name="pwdrepeat" placeholder="Repeat Password">
    <button type="submit" name="signup-submit">SignUp</button>
</div>
</div>
</form>

</main>
</div>
</section>
<?php
    require "footer.php";
?>
