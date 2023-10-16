<nav id="sidebarMenu" class="sidebarMainMenu col-md-3 col-lg-2 d-md-block bg-light sidebar collapse p-0">
  <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <!-- Nav  Menu -->
    <li class="nav-item">
      <a class="nav-link " href="home.php" >

       <i class="fas fa-tachometer-alt"  style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Dasboard</span>
     </a>
     <a class="nav-link " href="dashboard.php" >

       <i class="fas fa-user-circle"  style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Profile</span>
     </a>
     <a class="nav-link " href="contract.php" >

       <i class="fas fa-file-signature" style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Rules  and  regulation</span>
     </a>
     <a class="nav-link " href="Payment.php" >
       <i class="fas fa-money-check-alt" style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Payment</span>
     </a>
     <a class="nav-link " href="reservation_payment.php" >
       <i class="fas fa-building" style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Reserved Room</span>
     </a>
     <a class="nav-link " href="tenant_chat.php" >
       <i class="fas fa-comments" style="font-size:30px;color:white;"></i>
       <span style="color:white;font-size:15px;">Chat support</span>
     </a>
     <a class="nav-link collapsed " href="#"   data-toggle="collapse" data-target="#manageorders" aria-expanded="true" aria-controls="collapseTwo">
 <i class="fas fa-money-check-alt"  style="font-size:30px;color:white;"></i>
 <span style="color:white;font-size:15px;" >Payments</span>
</a>

<div id="manageorders" class="collapse" style="word-wrap:break-word;word-break:keep-all;" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
    <a class="collapse-item "  href="admin_payment.php">Bill Payment</a>
        <a class="collapse-item "  href="admin_confirmed.php">APPROVED</a>
    <a class="collapse-item "  href="admin_validating_payment.php">Validating Payment</a>
     <a class="collapse-item "  href="admin_invalid_payment.php">Invalid Payment</a>
  </div>
</div>
     <!-- Sidebar Toggler (Sidebar) -->
     <a class="nav-link " href="logout.php">
      <div style="display:flex;"><i class="fas fa-sign-out-alt" style="font-size:30px;color:white;"></i><p style="font-size:15px;color:white;">Logout</p></div>
    </a>
  </li>
</ul>
</nav>