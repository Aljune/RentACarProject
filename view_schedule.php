
<?php
 error_reporting(0);
include 'config.php';

$id=$_GET['id'];

$qry = "SELECT *,CONCAT(tbl_rental_car.first_name,' ',tbl_rental_car.last_name) as  name,CONCAT(tbl_user.first_name,' ',tbl_user.last_name) as  owner  FROM `tbl_rental_car`  INNER JOIn  cars on  cars.id= tbl_rental_car.car_id  inner join  tbl_user on  tbl_user.id=cars.client_id where tbl_rental_car.id = '$id' ";
$query=mysqli_query($conn,$qry);
$gg=mysqli_fetch_assoc($query);

?>


<div class="container">
	
    <dl>
        <div class="row">

          <div class="col-md-4">
           <div class="form-group">
              <p style="text-align:center;">Owner</p>
              <input type=""  value="<?php echo $gg['owner']?>"  id="brand"class="form-control">
          </div>
      </div>

      <div class="col-md-4">
       <div class="form-group">
          <p style="text-align:center;">Brand</p>
          <input type="" name="" value="<?php echo $gg['branch']?>"   id="brand"class="form-control">
      </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <p style="text-align:center;">Brand</p>
      <input type="" name="" value="<?php echo $gg['model']?>"   id="brand"class="form-control">
  </div>
</div>

<div class="col-md-4">
 <div class="form-group">
    <p style="text-align:center;">Pick Location</p>
    <input type="" value="<?php echo $gg['pickup_location']?>" id="pickuplocation" class="form-control">
</div>
</div>


<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Pick-up Date</p>
      <input type=""  value="<?php echo $gg['pickup_date']?>" class="form-control">
  </div>
</div>


<div class="col-md-4">
 <div class="form-group">
    <p style="text-align:center;">Pick-up Time</p>
    <input type="" name="" value="<?php echo $gg['pickup_time']?>" class="form-control">
</div>
</div>

<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Drop Location</p>
      <input type="" value="<?php echo $gg['drop_location']?>" class="form-control">
  </div>
</div>

<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Drop Date</p>
      <input type="" name=""  value="<?php echo $gg['drop_date']?>" class="form-control">
  </div>
</div>


<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Drop Time</p>
      <input type="" name=""  value="<?php echo $gg['drop_time']?>" class="form-control">
  </div>
</div>

<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Price</p>
      <input type="" name="" value="<?php echo $gg['price']?>" class="form-control">
  </div>
</div>

</div>



<p style="text-align:center;margin-top:1%;font-family:bold;font-size:17px;">PAYMENT INFORMATION</p>
<div class="col-md-12">
  <div class="row">
 


      <div class="col-md-4">

       <div class="form-group">
          <p style="text-align:center;">Customer Name</p>
          <input type="" value="<?php echo $gg['name']?>" class="form-control">
      </div>
  </div>

      <div class="col-md-4">

       <div class="form-group">
          <p style="text-align:center;">Sender Name</p>
          <input type="" value="<?php echo $gg['rent_sender']?>" class="form-control">
      </div>
  </div>

     <div class="col-md-4">

       <div class="form-group">
          <p style="text-align:center;">Sender Name</p>
          <input type="" value="<?php echo $gg['rent_sender']?>" class="form-control">
      </div>
  </div>

  <div class="col-md-4">
     <div class="form-group">
        <p style="text-align:center;">Refrence</p>
        <input type=""   value="<?php echo $gg['rent_ref']?>"  class="form-control">
    </div>
</div>

<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Date send</p>
      <input type=""  value="<?php echo $gg['rent_send_date']?>" class="form-control">
  </div>
</div>


<div class="col-md-4">
   <div class="form-group">
      <p style="text-align:center;">Payment</p>
      <input type="" name=""  value="<?php echo $gg['total_rate']?>" class="form-control">
  </div>
</div>
</div>
</div>
</div>

</dl>

<div class="clear-fix my-3"></div>
<div class="text-right">
    <div class="clear-fix my-3"></div>
</div> 
</div>
</form>

<script>    
    $(function(){
        $('#uni_modal').on('shown.bs.modal', function(){
            $('.edit-schedule').click(function(){
                uni_modal("<i class='fa fa-edit'></i> Edit Schedule Details", "manage_schedule.php?id=<?= isset($id) ? $id : '' ?>");
            })
            $('.delete-schedule').click(function(){
                _conf("Are you sure to delete this Scheduled Task?", 'delete_schedule', ['<?= isset($id) ? $id : '' ?>'])
            })
        })
        $('#uni_modal').on('hidden.bs.modal', function(){
            if($('form#schedule-form').length > 0 && $('#schedule-form [name="id"]').val() != ''){
             uni_modal("<i class='fa fa-calendar-day'></i> Scheduled Task Details", "view_schedule.php?id=<?= isset($id) ? $id : '' ?>")
         }
     })
        
    })
    function delete_schedule($id){
      start_loader();
      $.ajax({
         url:_base_url_+"classes/Master.php?f=delete_schedule",
         method:"POST",
         data:{id: $id},
         dataType:"json",
         error:err=>{
            console.log(err)
            alert_toast("An error occured.",'error');
            end_loader();
        },
        success:function(resp){
            if(typeof resp== 'object' && resp.status == 'success'){
               location.reload();
           }else{
               alert_toast("An error occured.",'error');
               end_loader();
           }
       }
   })
  }

  
  


</script>