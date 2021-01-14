
<h1><?php echo $post['title'] ?></h1>

<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
<?php echo form_open('posts/create'); ?>
<form>
  <fieldset>
    <legend>Post</legend>
    <div class="form-group row">

    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input  class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title..." required value="<?php echo $post['title']?>">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    
    
    <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea 
          class="form-control" 
          id="body" 
          name="body" 
          rows="3" 
          placeholder="Write your post..." 
          required 
          >
            <?php echo $post['text']?>
          </textarea>
    </div>
    
    <button type="submit" class="btn btn-success" style="background-color:green;">SUBMIT</button>
    
</form>