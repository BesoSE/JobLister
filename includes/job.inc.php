<?php 
include 'header.inc.php';
?>


<h2 class="page-header"><?php echo $job->job_title; ?>(<?php echo $job->location ?>) </h2>
    <small>Posted By <?php echo $job->contact_user;   ?>on <?php echo $job->post_date; ?></small>
    <hr>
    <p class="lead"> <?php echo $job->description; ?></p>
    <ul class="list-group">
        <li class="list-group-item"><strong>Company:</strong> <?php echo $job->company; ?></li>
        <li class="list-group-item"><strong>Salary:</strong> <?php echo $job->salary; ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?php echo $job->contact_email; ?></li>
    </ul>

    <br> <br>
    <a href="index.php">Go Back</a>

    <br><br>
    <div class="well">
    <?php if(isset($_SESSION['id'])){
        foreach($jobid as $id){
       
        if($id->id==$job->id){
       echo ' <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-default">Edit</a>

       <form action="job.php" style="display:inline;" method="POST">
       <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
       <input type="submit" class="btn btn-danger" value="Delete">
       </form>';
        }

    }
 } ?>
   
    </div>

<?php 
include 'footer.inc.php';

?>