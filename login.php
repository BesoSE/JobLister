<?php 
include 'includes/auto-load.inc.php';
?>

<?php

 $template=new Template('includes/frontpage.inc.php');
 $job=new Job();

$category=isset($_GET['category']) ? $_GET['category'] : null;

if($category){

$template->jobs=$job->getByCategories($category);
$template->title="Jobs In ".$job->getCategory($category)->name;
}else{

    
    $template->title="Jobs Latest";
    $template->jobs=$job->getAllJobs();
}

  $template->categories=$job->getCategories();
 echo $template;


?>
