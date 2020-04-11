<?php 
include '../classes/job.class.php';
include '../classes/Dbh.class.php';

?>
<?php 

    $job=new Job();
if(isset($_POST['signup-submit'])){
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $pwdRepeat=$_POST['pwd-repeat'];
    
    if(empty($username) || empty($email) ||empty($password) ||empty($pwdRepeat) ){
        header('Location: ../signup.php?error=emptyfields&username='.$username.'$email='.$email);
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){

        header('Location: ../signup.php?error=invalidusernamemail');
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header('Location: ../signup.php?error=invalidmail&username='.$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header('Location: ../signup.php?error=invalidmail&email='.$email);
        exit();
    }
    else if($password !== $pwdRepeat){
        header('Location: ../signup.php?error=passwordcheck&username='.$username.'$email='.$email);
        exit();

  }
  else{
      
    $result=$job->checkUsername($username);

    if(strlen($result)===0){
        $job->insertUsers($username,$email,$password);
        header('Location: ../signup.php?signup=success');
        exit();


    }else{
        
        header('Location: ../signup.php?error=userTaken&$email='.$email);
        exit();
    }


  }
}else{
    
    header('Loaction: ../signup.php ');
    exit();
}



?>