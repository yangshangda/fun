<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Design Login Form</title>
  
  
  
      <link rel="stylesheet" href="/Fun1/Public/lib/css/login_style.css">

  
</head>

<body>

  <hgroup>
  <h1>Fun管理后台</h1>
  <h3></h3>
</hgroup>
<form method="post">
  <div class="group">
    <input type="text" name="admin_name"><span class="highlight"></span><span class="bar"></span>
    <label>Name</label>
  </div>
  <div class="group">
    <input  type="password" name="admin_pwd" ><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <input class="button buttonBlue" type="submit" value="Login">
    <!-- <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div> -->
  </input>
</form>

  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script>

  

    <script  src="/Fun1/Public/lib/jquery/login.js"></script>




</body>

</html>