<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Food order website</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <section class="navbar">
  <div class="container">
   <div class="logo">
    <img src="logo1-img.png" alt="logo" class="img-responsive">
   </div>
   <div class="menu text-right">
    <ul>
     <li>
      <a href="<?php echo SITEURL; ?>">Home</a>
     </li>
     <li>
      <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
     </li>
     <li>
      <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
     </li>
     <li>
      <a href="#">Contact</a>
     </li>
    </ul>
   </div>
   <div class="clearfix"></div>
  </div>
 </section>