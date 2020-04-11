<?php 
include 'header.inc.php';
?>
    <h2 class="page-header">Create Job Listening</h2>
    <form action="job-create.php" method="POST">
    <div class="form-group">
    <label for="">Company</label>
    <input type="text" class="form-control" name="company">    
    </div>
    <div class="form-group">
    <label for="">Cotegory</label>
    <select  class="form-control" name="category">    
    <option value="0">Choose Category</option>
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category->id;?>"><?php echo $category->name; ?></option></option>
        <?php endforeach; ?>
</select>
    </div>
    
    <div class="form-group">
    <label for="">Job Title</label>
    <input type="text" class="form-control" name="job_title">    
    </div>
    
    <div class="form-group">
    <label for="">Description</label>
    <textarea type="text" class="form-control" name="description">   </textarea>
    </div>

    <div class="form-group">
    <label for="">Loaction</label>
    <input type="text" class="form-control" name="location">    
    </div>
    <div class="form-group">
    <label for="">Salary</label>
    <input type="text" class="form-control" name="salary">    
    </div>

    <div class="form-group">
    <label for="">Contact user</label>
    <input type="text" class="form-control" name="contact_user">    
    </div>

    <div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email">    
    </div>

    <input type="submit" class="btn btn-default" value="Submit" name="submit">
    
    
    
    
    </form>
<?php 
include 'footer.inc.php';

?>