

<?php

  error_reporting(0);
$currentPage = "dashboard";
$currentTitle = "DASHBOARD";
ini_set('session.use_trans_sid', false);
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
$https = false;
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
session_name('some_name');
session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);


session_start();

 //$userID = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rental Car</title>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <script src="plugins/fullcalendar/main.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  


</head>

<style type="text/css">



  .fc-event-time{
    display:none;

  }

  p{
    color:black;
  }

  .tr {
    color:black;
  }

  .fc-event-title{
    text-align:center;
    background-color:blue;
    text-transform:uppercase;
color:white;
font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  }
  .fc-daygrid-event-dot{
    display:none;

  }


</style>

<body id="page-top" style="overflow-x:visible;background-color:whitesmoke;">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

      <!-- Divider -->

      <hr class="sidebar-divider my-0">
      <li class="nav-item active" >
        <div><img  src="./image/logo/loge-rent-a-car.png" alt="" width="100" height="100" style="margin-left:28%;"></div> 
            <p style="font-size:20px;color:black;text-align:center;margin-bottom:0px;color:white; font-family:'Courier New', monospace;text-transform: capitalize;">RENT A CAR
        </p>
        <p style="font-size:20px;color:black;text-align:center;margin-bottom:0px;color:white; font-family:'Courier New', monospace;text-transform: capitalize;">ADMIN
        </p>
      </li>

      <!-- Nav  Menu -->
      <li class="nav-item">
        <?php include'admin_nav.php';?>
      </li>
    </ul>
    <!-- End of Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"style="overflow-x:visible;">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->


        <div class="container-fluid" >
          <div class="card text-white  mb-3" style="width:100%;">
            <div class="card-header bg-primary">
              <div style="text-align:center;font-size:30px;">
               DASHBOARD
             </div>
           </div>
           <div class="form-group" style="
           margin-bottom: 0px;
           margin-top: 20px;
           margin-left: 20px;
           ">

         </div>


         <?php 
          error_reporting(0);
         include 'config.php';

         $selecruser = mysqli_query($conn, "SELECT count('first_name') FROM tbl_user");
         $totaluser = mysqli_fetch_array($selecruser);

         $selectpost = mysqli_query($conn, "SELECT count('title') FROM tbl_post WHERE status = 1");
         $totalpost = mysqli_fetch_array($selectpost);

         $selectcar = mysqli_query($conn, "SELECT count('name') FROM cars WHERE status = 1");
         $totalcar = mysqli_fetch_array($selectcar);

         $selectreservation = mysqli_query($conn, "SELECT count('first_name') FROM tbl_reservation");
         $totalreservation = mysqli_fetch_array($selectreservation);

         ?>

         <div class="card-body">
          <div class="row">

            <div class="col-md-3">
              <div class="card bg-primary">
                <div class="card-body text-center text-white">
                  Total Reservation <br/>
                  <?php echo $totalreservation[0]?>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-danger">
                <div class="card-body text-center text-white">
                  Total Cars Availability <br/>
                  <?php echo $totalcar[0]?>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-warning">
                <div class="card-body text-center text-white">
                  Total Posts <br/>
                  <?php echo $totalpost[0]?>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-success">
                <div class="card-body text-center text-white">
                  Total Users <br/>
                  <?php echo $totaluser[0]?>
                </div>
              </div>
            </div>
  <div class="col-md-12">
<canvas id="myChart" style="width:90%;max-width:700px;margin-left:10%;"></canvas>

<script>
var xValues = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY"];
var yValues = [70000, 2000,1000, 500, 0];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: ""
    }
  }
});
</script>

  </div>

            <div class="col-md-12">

              <div class="card-body">
                <div class="container-fluid">
                  <?php 
                  include 'config.php';
                  $schedule_arr = [];
                  $where = "";

                  $schedule_qry = "SELECT * from `tbl_rental_car`";
                  $query=mysqli_query($conn,$schedule_qry);
                  while($row =mysqli_fetch_assoc($query)){
                    $schedule_arr[] = $row;
                  }
                  ?>

                  <p style="color:black;text-align:center;font-size:20px;margin-top:4%;margin-bottom:5%;">CALENDAR RENTAL CAR RETURN</p>
                  <div id="calendar" style="color:black;">



                  </div>
                </div>
              </div>

            </div>


          </div>

        </div>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-lg " role="document" style="width:1000px;">
      <div class="modal-content rounded-0">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->



</body>
</html>


<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy","policy.php","mid-large")
    })

    window.uni_modal = function($title = '' , $url='',$size=""){
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog modal-lg').removeAttr("class").addClass("modal-dialog modal-lg modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                 
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>

<script>
  var scheds = $.parseJSON('<?= isset($schedule_arr) ? json_encode($schedule_arr) : '{}' ?>')
  var events = []
  $(document).ready(function(){
    $('#create_new').click(function(){
      uni_modal("<i class='fa fa-plus'></i> Add New Task Schedule", "view_schedule.php")
    })
    if(Object.keys(scheds).length > 0){
      Object.keys(scheds).map(k=>{
        var data = scheds[k]
        var event_item = {
          id   : data.id,
          title : data.first_name,
          start : data.drop_date,
          end   : data.drop_date,
          backgroundColor: 'black',
          borderColor    : 'black',
          allDay         : data.is_whole == 1,
          className      :'cursor-pointer'
        }
        events.push(event_item)
      })
    }
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    var Calendar = FullCalendar.Calendar;
    var calendar = new Calendar(document.querySelector('#calendar'), {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
    //Random default events
    events: events,
    editable  : false,
    droppable : false, // this allows things to be dropped onto the calendar !!!
    drop      : false,
    eventClick:function(info){
      var id= info.event.id
      uni_modal("<i class='fa fa-calendar-day'></i> Schedule Details","view_schedule.php?id="+id)
   
    }
  });

    calendar.render();
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){



    $("body").on("click",'#btnchange',function(){
      $('#viewprofile').show();
    });



  });

</script>