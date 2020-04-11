<?php 
include '../includes/header.inc.php';

?>


<link rel="stylesheet" href="css/styles.css">


<section class="section-defaul">
<h1>SignUp</h1>
<?php 
    if(isset($_GET['error'])){
        if($_GET['error']=="emptyfields"){
            echo '<p>  Fill in all fields </p>';
        }
    }

?>

<form class="F" action="includes/signup.inc.php" method="POST">
<input type="text" name="username" placeholder="Username">
<input type="email" name="email" placeholder="email">
         <input type="password" name="pwd" placeholder="Password">
         <input type="password" name="pwd-repeat" placeholder="Repeat password">
         <button type="submit" name="signup-submit">SignUp</button>
</form>

</section>




<?php 
include '../includes/footer.inc.php';

?>