<?php 
include 'includes/auto-load.inc.php';

?>

<?php

 
 $job=new Job();

if(isset($_POST['submit'])){
    $data=array();
    $data['job_title']=$_POST['job_title'];
    $data['company']=$_POST['company'];
    $data['categoryid']=$_POST['category'];
    $data['description']=$_POST['description'];
    $data['location']=$_POST['location'];
    $data['salary']=$_POST['salary'];
    $data['contact_user']=$_POST['contact_user'];
    $data['email']=$_POST['email'];
    $data['userid']=$_SESSION['id'];

    if($job->create($data)){
        redirect('index.php','Your job has been listed','success');
    }else{
        redirect('index.php','Something went wrong','error');
    }
}


$template=new Template('includes/job-create.inc.php');

  $template->categories=$job->getCategories();
 echo $template;


?>
