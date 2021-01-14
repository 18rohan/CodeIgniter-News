

<h1 style="margin-top:1em;"><?php echo $post['title'] ?></h1>

<div class="post-body">
	<small style="color:red;text-align:justify; "><?php echo $post['created_at']; ?></small><br>
	<?php echo $post['text']; ?> 
	</div>
	<a 
	  name="delete"
	  class="btn btn-warning" 
	  style=" margin-top:1em; background-color:orange; color:white;" 
	  href="edit/<?php echo $post['slug'] ?>">
	  Edit
	  </a>
	<?php echo form_open('/posts/delete/'.$post['id']);?>

	<button type="submit" name="delete"class="btn btn-danger" style=" margin-top:1em; ">Delete</button>

</form>

