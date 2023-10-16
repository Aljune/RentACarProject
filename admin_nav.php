 <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <!-- Nav  Menu -->
  <li class="nav-item">


    <a class="nav-link " href="admin_dashboard.php" >

     <i class="fas fa-tachometer-alt"  style="font-size:30px;color:white;"></i>
     <span style="color:white;font-size:15px;">Dasboard</span>
   </a>
   <a class="nav-link " href="admin_profile.php" >

     <i class="fas fa-user-circle"  style="font-size:30px;color:white;"></i>
     <span style="color:white;font-size:15px;">Profile</span>
   </a>
   
   <a class="nav-link collapsed " href="#"   data-toggle="collapse" data-target="#manageorders" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa fa-car" style="font-size:30px;color:white;"></i>
    <span style="color:white;font-size:15px;" >Customer</span>
  </a>

  <div id="manageorders" class="collapse" style="word-wrap:break-word;word-break:keep-all;" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item "  href="admin_rental_transaction.php">Rental Car Transaction </a>
      <a class="collapse-item "  href="admin_reservation_transaction.php">Reservation Car  Transaction </a>
    </div>
  </div>
  <a class="nav-link " href="admin_ch_support.php" >
   <i class="fas fa-comments" style="font-size:30px;color:white;"></i>
   <span style="color:white;font-size:15px;">Chat support</span>
 </a>

 <a class="nav-link " href="admin_user_account.php" >
  <i class="fas fa-user-cog"  style="font-size:30px;color:white;"></i>
  <span style="color:white;font-size:15px;">User Account</span>
</a>

<!-- Sidebar Toggler (Sidebar) -->
<a class="nav-link " href="logout.php">
  <div style="display:flex;"><i class="fas fa-sign-out-alt" style="font-size:30px;color:white;"></i><p style="font-size:15px;color:white;">Logout</p></div>
</a>
</li>
</ul>
