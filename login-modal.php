
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:99999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please sign in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php if(isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
      <form method="post" action="">
        <div class="modal-body">
            
                <div class="text-center">
                    <img class="mb-4" src="./image/logo/loge-rent-a-car.png" alt="" width="125" height="125">
                </div>
                <div class="row">
                    <div class="form-floating mb-3 ">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" class="mx-2">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword" class="mx-2">Password</label>
                    </div>
                </div>
                
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn  btn-primary" name="submit"  type="submit">Sign in</button>
            <a href="registration.php">
                <button class="btn  btn-pitch-pink text-white" type="button">Create An Account</button>
            </a>
        </div>
      </form>
    </div>
  </div>
</div>