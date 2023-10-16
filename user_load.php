<?php
include 'config.php';

$id = $_COOKIE['logid'];
$ids = $_COOKIE['chat_id'];

$display = "SELECT * FROM chat_box WHERE (chat_id_user = '$id' AND chat_id_user2 = '$ids') OR (chat_id_user = '$ids' AND chat_id_user2 = '$id') ORDER BY chat_id ASC";
$q = mysqli_query($conn, $display);

while ($row = mysqli_fetch_array($q)) {
    $messageUser = ($row['chat_id_user'] == $id) ? 'sent' : 'received';
    ?>
    <?php if($messageUser === 'received'):?>
      <div>
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
      <div class="w-100 d-flex align-items-end justify-content-end">
        <div class="w-50" style="text-align:right!important">
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
      </div>
    <?php endif;?>
    
    <?php
}
?>
