<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Joblister</title>
</head>
<body>

<div class="container">
      <div class="header clearfix">
        <nav class="navC">
          <ul class="nav  nav-pills">
            <li role="presentation" ><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['id'])){
           echo   '<form action="includes/logout.inc.php" method="POST">

           <input type="submit" name="logout" class="btn btn-dark " value="LogOut">
      
           </form>
           <li role="presentation"><a href="job-create.php">Create Listening</a></li>';
         }else{
          echo  '<form action="includes/login.inc.php" method="POST">
          <input type="text" name="emailname" placeholder="email/username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="submit" name="login" class="btn btn-dark " value="LogIn">
     
          </form>
          <a href="signup.php"><button class="btn btn-danger">SignUp</button></a>';
         
        } ?>
        
            
   
         
          </ul>
        </nav>
        <h3 class="text-muted">JobLister</h3>
      </div>
      <?php echo displayMessage(); ?>