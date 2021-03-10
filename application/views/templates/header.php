<html>
<head>
	<title>News</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/assets/css/style.css" > -->
</head>
<body>
	

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
      <a style="background-color:blue;color:white;padding:0.5em;border-radius:5px;margin-right:2em;" href="<?php echo base_url();?>users/google_login">Google Login</a>
      <a style="background-color:green;color:white;padding:0.5em;border-radius:5px;margin-right:0.5em;" href="<?php echo base_url();?>users/login">LOGIN</a>
      
      <a  style="background-color:orange;color:white;padding:0.5em;border-radius:5px;" href="<?php echo base_url();?>users/signin">
      SIGN IN </a>
      <a  style="background-color:red;color:white;padding:0.5em;border-radius:5px;margin-left:0.5rem;border-width:0px;" href="<?php echo base_url();?>users/logout">
      LOGOUT </a>
    </form>
  </div>
</nav>


<div class="container" style="padding:0%;">