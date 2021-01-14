
<h1><?php echo "CREATE POST" ?></h1>

<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
<?php echo form_open('posts/create'); ?>
<form>
  <fieldset>
    <legend>Post</legend>
    <div class="form-group row">

    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input  class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title..." required>
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    
    
    <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea class="form-control" id="body" name="body" rows="3" placeholder="Write your post..."></textarea>
    </div>
    
    <button type="submit" class="btn btn-success" style="background-color:green;">SUBMIT</button>
    
</form>

<p><?php echo $links; ?></p>