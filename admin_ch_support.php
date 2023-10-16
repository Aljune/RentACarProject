

<?php  error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Car Rental System</title>
  <!-- Custom fonts for this template-->
   <script src=
"https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
         crossorigin= "anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
</head>


<style type="text/css">
  .container{max-width:1170px; margin:auto;}
  img{ max-width:100%;}
  .inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%; border-right:1px solid #c4c4c4;
  }
  .inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
  }
  .top_spac{ margin: 20px 0 0;}


  .recent_heading {float: left; width:40%;}
  .srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
  }
  .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

  .recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
  }
  .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
  .srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
  }
  .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

  .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
  .chat_ib h5 span{ font-size:13px; float:right;}
  .chat_ib p{ font-size:14px; color:#989898; margin:auto}
  .chat_img {
    float: left;
    width: 11%;
  }
  .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
  }

  .chat_people{ overflow:hidden; clear:both;}
  .chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
  }
  .inbox_chat { height: 550px; overflow-y: scroll;}

  .active_chat{ background:#ebebeb;}

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }
  .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
  }
  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }
  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }
  .received_withd_msg { width: 57%;}
  .mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
  }

  .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
  }
  .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
  .sent_msg {
    float: right;
    width: 46%;
  }
  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }

  .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
  .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
  }
  .messaging { padding: 0 0 50px 0;}
  .msg_history {
    height: 516px;
    overflow-y: auto;
  }



</style>
<script>
  function submitChat() {
    if(forms.msg.value == '' ) {
      alert("ALL FIELDS ARE MANDATORY!!!");
      return;
    }
    
    var msg = forms.msg.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('incoming_msg').innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open('GET','admin_send_load.php?msg='+msg,true);
    xmlhttp.send();
    forms.msg.value = '';
  }

  $(document).ready(function(e){
    $.ajaxSetup({
      cache: false
    });
    $( "#msg_area").keyup(function(e) {
      var code = e.keyCode || e.which;
     if(code == 13) { //Enter keycode
       submitChat();
     }
   });


    setInterval( function(){$('#incoming_msg').load('admin_load_cha.php'); },1000 );
  });
</script>


<body id="page-top" style="overflow-x:visible;background-color:whitesmoke;">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <?php include'admin_link.php';?>

      <!-- Divider -->
  
      <!-- Heading -->


      <!-- Nav  Menu -->
      <li class="nav-item">
        <?php include'admin_nav.php';?>
      </li>
    </ul>
    <!-- End of Sidebar -->

<?php include'admin_script.php';?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"style="overflow-x:visible;">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->

        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" align="center">Chat Support</h1>
          <div class="card shadow mb-4">
            <div class="card-body">


              <div class="messaging">
                <div class="inbox_msg">
                  <div class="inbox_people">
                    <div class="headind_srch">
                      <div class="recent_heading">
                        <h4>FRIENDS</h4>
                      </div>
                      <div class="srch_bar">
                        <div class="stylish-input-group">
                          <input type="text" class="search-bar"  placeholder="Search" id="mysearch" onkeyup="myFunction()">
                          <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                          </span> </div>
                        </div>
                      </div>
                      <div class="inbox_chat">
                       
                        <?php 
                        include 'config.php';
                        
                        $sqla="select  *,concat(first_name,' ',last_name) as  name from tbl_user ";
                        $querya=mysqli_query($conn,$sqla);
                        
                        

                        while($rowa=mysqli_fetch_assoc($querya)){
                          $userId = $rowa['id'];
    
        // Get the last message with status 1 for the current user
        $sqlLastMessage = "SELECT * FROM chat_box WHERE chat_id_user = $userId LIMIT 1";
        $queryLastMessage = mysqli_query($conn, $sqlLastMessage);
        $rowLastMessage = mysqli_fetch_assoc($queryLastMessage)
                          ?>
                          <div class="chat_list active_chat"  id="clickko"  value="<?php echo $rowa['id']?>" >
                            <div class="chat_people">
                              <div class="chat_img"><img src="img/<?php echo $rowa['profile_image']; ?>" style="border-radius: 50%;width:200px;height:50px;" ></div>
                              <div class="chat_ib">
                               <?php      
                                 // $ids=$rowa['tenant_id'];
                                  // $sqlsa="select  * from rental_chat where rent_tenant_id='$ids' ";
                                   //$querysa=mysqli_query($con,$sqlsa);
                                  // $rowsa=mysqli_fetch_assoc($querysa);?>
                                  <h5 class="mytitle"><?php echo  $rowa['name']?><span class="rent_chat_date">  </span></h5>
                                  <?php echo $rowLastMessage['chat_message']; ?>
                                </div>
                              </div>
                            </div>
                          <?php }?>
                          
                        </div>
                      </div>


                      <div class="mesgs " style="display:none;">
                        <div class="msg_history" > 
                          <div class="incoming_msg" id="incoming_msg">
                          </div>
                        </div>
                        <div class="type_msg" style="position: sticky;">
                          <div class="input_msg_write">
                            <form name="forms" autocomplete="off">
                              <input type="text"  id="msg_area" name="msg" placeholder="Type a message" />
                              <button class="msg_send_btn" type="button" id="submit" name="submit"  onclick="submitChat()"><i class="fas fa-paper-plane"></i></button>
                            </form>
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
            </div>
          </div>
        </div>







<div class="modal show " id="viewproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
      </div>
      <div class="modal-body" style="height:500px;overflow:auto;">

   <input type="text" name="search"  placeholder="search"   id="mysearch"  class="form-control mb-3 " style="width:22%;margin-left:30px;">
    <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col" style="font-size:12px;">Firstname</th>
              <th scope="col" style="font-size:12px;">Last Name</th>

     
     
             <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $selectreservaion = mysqli_query($conn, "select *  from tbl_user");
            while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
             <tr class="mycontent">

               <td class="mytitle"><?php echo $reservationtItem['first_name'] ?></td>
               <td class="mytitle"><?php echo $reservationtItem['last_name'] ?></td>
               <td>
                  <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate"><a href="user_add.php?id=<?php echo $reservationtItem['id'] ?>" style="color:white;">Add</a></button>
               </td>
             </tr>
             <?php
           }
           ?>

         </tbody>

     </table>
<div class="modal-footer">
 <button class="btn btn-sm btn-flat btn-danger" id="closerent">Close</button>
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
</div>





<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
 <script src=
"https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
         crossorigin= "anonymous"></script><script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

</body>
</html>




<script type="text/javascript">
  
$(document).ready(function(){
$('body').on("click",'#add',function(){
$('#viewproject').show();


});

    $("body").on("click",'.active_chat',function(){
     $('form')[0].reset();
     var get =$(this).attr('value');
       $.cookie("chat_id",get);
     
     $('.mesgs').show();


   });




    $('#mysearch').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.active_chat').hide();

  // Search 
  $('.active_chat .mytitle:contains("'+text+'")').closest('.active_chat').show();


});

});


</script>