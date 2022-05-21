<?php include('partials-front/menu.php'); ?>
<?php
if(isset($_GET['food_id']))
{
$food_id=$_GET['food_id'];
$sql="SELECT * FROM tbl_food WHERE id=$food_id";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count==1)
{
$row=mysqli_fetch_assoc($res);
$title=$row['title'];
$price=$row['price'];
$image_name=$row['image_name'];
}
else
{
header('location:'.SITEURL);
}
}
else
{
header('loaction:'.SITEURL);
}
?>
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend><h3 class="text-white">Selected Food</h3></legend>

                    <div class="food-menu-img">
<?php
if($image_name=="")
{
echo "<div class='error'>Image Not Available.</div>";
}
else
{
?>
<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Image" class="img-responsive img-curve">
<?php
}
?>
                        
                    </div>
    
                    <div class="food-menu-desc text-white">
                        <h3><?php echo $title; ?></h3>
<input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price">Rs.<?php echo $price; ?></p>
<input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend><h3 class="text-white">Delivery Details</h3></legend>
                    <div class="order-label text-white">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. xyz" class="input-responsive" required>

                    <div class="order-label text-white">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9876xxxxxx" class="input-responsive" required>

                    <div class="order-label text-white">Email</div>
                    <input type="email" name="email" placeholder="E.g. xyz@gmail.com" class="input-responsive" required>

                    <div class="order-label text-white">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Flat-no., Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
<?php
if(isset($_POST['submit']))
{
$food=$_POST['food'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$total=$price*$quantity;
$order_date=date("Y-m-d h:i:sa");
$status="Ordered";
$customer_name=$_POST['full-name'];
$customer_contact=$_POST['contact'];
$customer_email=$_POST['email'];
$customer_address=$_POST['address'];
$sql2="INSERT INTO tbl_order SET food='$food',price=$price,quantity=$quantity,total=$total,order_date='$order_date',status='$status',customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address' ";
$res2=mysqli_query($conn,$sql2);
if($res2==true)
{
$_SESSION['order']="<div class='success text-center'>Order Placed Successfully.</div>";
header('location:'.SITEURL);
}
else
{
$_SESSION['order']="<div class='error text-center'>Failed to Order Food.</div>";
header('location:'.SITEURL);
}
}
?>
        </div>
    </section>
    
<?php include('partials-front/footer.php'); ?>