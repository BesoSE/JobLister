<?php 
include '../classes/job.class.php';
include '../classes/Dbh.class.php';

?>

<?php 
$job=new Job();


if(isset($_POST['login'])){
    $emailname=$_POST['emailname'];//email or username
    $password=$_POST['pwd'];
    $user=$job->getUserNameEmail($emailname);
    if( empty($emailname) ||empty($password)  ){
        header('Location: ../index.php?error=emptyfields&usernameoremail='.$emailname);
        exit();
    }else{
        if(strlen($user->id)!==0){
           
            $pwdCheck=password_verify($password,$user->pwdUser);

            if($pwdCheck== false){
                header('Location: ../index.php?error=wrongpassword');
                exit();
            }else if($pwdCheck==true){
                session_start();
                $_SESSION['id']=$user->id;
                $_SESSION['username']=$user->username;

              
                header('Location: ../index.php?login=success');
                exit();
            }else{
                header('Location: ../index.php?error=wrongpassword');
                exit();
            }


        }else{
            header('Location: ../index.php?error=nouser');
        exit();
        }

    }





}else{
    header('Loaction: ../index.php');
    exit();

}




?>