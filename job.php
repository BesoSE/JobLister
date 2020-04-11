<?php 
include 'includes/auto-load.inc.php';
?>

<?php

 $template=new Template('includes/job.inc.php');
 $job=new Job();

 if(isset($_POST['del_id'])){
   $del_id=$_POST['del_id'];

   if($job->delete($del_id)){
     redirect('index.php',"Job Deleted", "success");
   }else{
    redirect('index.php',"Job Not Deleted", "error");
   }
 }

$job_id=isset($_GET['id']) ? $_GET['id'] : null;

$template->jobid=$job->getJobid($_SESSION['id']);

  

  $template->job=$job->getJob($job_id);
 echo $template;


?>
