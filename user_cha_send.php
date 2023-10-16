<?php


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


	$insert="insert  into  chat_box(chat_message,status,chat_date,chat_time,chat_id_user,chat_id_user2,chat_user)values('$msg','1','$Date','$time','$id','$ids','$username')";
	mysqli_query($conn,$insert);

//display  the  data

	$display="select  * from chat_box  where  chat_id_user='$id' and chat_id_user2='$ids' or chat_id_user='$ids' and chat_id_user2='$id' ORDER by chat_id  asc ";
$q =mysqli_query($conn,$display);
while ($row = mysqli_fetch_array($q)) {
$messageUser = ($row['chat_id_user'] == $id) ? 'sent' : 'received';
?>
<?php if($messageUser === 'received'):?>
  <div style="border: 1px solid green">
	<div class="message">
	  <div class="incoming_msg_img">
		  <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
	  </div>
	  <div class="message_content">
		  <p><?php echo $row['chat_message']; ?></p>
		  <span class="time_date">
			  <?php echo $row['chat_time']; ?> | <?php echo $row['chat_date']; ?> | <?php echo $row['chat_user']; ?>
		  </span>
	  </div>
	</div>
  </div>
<?php else :?>
  <div style="border: 1px solid red;" class="w-100 d-flex align-items-end justify-content-end">
	<div class="w-50" style="">
	  <div class="message" style="">
		<div class="incoming_msg_img">
			<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
		</div>
		<div class="message_content">
			<p><?php echo $row['chat_message']; ?></p>
			<span class="time_date">
				<?php echo $row['chat_time']; ?> | <?php echo $row['chat_date']; ?> | <?php echo $row['chat_user']; ?>
			</span>
		</div>
	  </div>
	</div>
  </div>
<?php endif;?>

<?php
}
?>