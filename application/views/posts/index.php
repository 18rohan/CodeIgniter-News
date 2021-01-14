<h2 style="color:blue; "><?php echo "LATEST POSTS"?></h2>
<?php foreach ($Posts as $post): ?>

<div style="max-width:60%;">

	<h3><?php echo $post['title']; ?></h3>
	<small style="color:red;text-align:justify; "><?php echo $post['created_at']; ?></small><br>
	<?php echo $post['text']; ?> 
</div>
	<br>
<a  class="btn btn-secondary" style="background-color:grey; color:white; margin-top:10px; margin-bottom:20px;" href="<?php echo site_url('/posts/'.$post['slug']);?>">Read more</a>


<?php endforeach; ?>
<h3><?php echo $links; ?></h3>


