

   <?php  
       $id=$_COOKIE['logid'];
       if(empty($id)){
 header("Location:index.php");
       }
     include'config.php';
     $id=$_COOKIE['logid'];
     $query ="select  *,concat(first_name,' ',last_name) as name from  tbl_user where id='$id' ";
     $fetch=mysqli_query($conn,$query);   
     $row=mysqli_fetch_array($fetch);

     ?>

     <li class="nav-item active">
     	<div><img  src="./image/logo/loge-rent-a-car.png" alt="" width="100" height="100" style="margin-left:28%;"></div>
     	<p style="font-size:20px;color:black;text-align:center;margin-bottom:0px;color:white; font-family:'Courier New', monospace;text-transform: capitalize;">RENT A  CAR
     </p>
 </li>

