<?php
error_reporting(0);

include 'config.php';

	$msg=mysqli_real_escape_string($conn,$_GET['msg']);
	    $Date=date('M d ');
	    $time=date('h:i a');  
	    $id=$_COOKIE['logid']; 
	      $ids=$_COOKIE['chat_id']; 

$fetch="select CONCAT(first_name,'  ',last_name) as  name  from  tbl_user where id='$id' ";
$connects=mysqli_query($conn,$fetch);
$get=mysqli_fetch_assoc($connects);
$username=$get['name'];


	$insert="insert  into  chat_box(chat_message,chat_date,chat_time,chat_id_user,chat_id_user2,chat_user)values('$msg','$Date','$time','$id','$ids','$username')";
	mysqli_query($conn,$insert);

//display  the  data

	$display="select  * from chat_box  where  chat_id_user='$id' and chat_id_user2='$ids' or chat_id_user='$ids' and chat_id_user2='$id' ORDER by chat_id  asc ";
$q =mysqli_query($conn,$display);

	while($row=mysqli_fetch_array($q)){

	echo'<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
            <div class="received_withd_msg">
                  <p>'.$row['chat_message'].'</p>
                    <span class="time_date"> '.$row['chat_time'].' |  '.$row['chat_date'].'|  '.$row['chat_user'].'</span></div>
              </div>
            </div>';
        
	
	}





?>