<section id="login" class="intro intro-fullscreen"> 
  <!-- Intro Header-->
  <div class="intro-body"> 
    <!-- Login-->
    
    <div class="container">
      <div class="row wow fadeIn">
        <div class="col-md-5 col-xs-12 col-sm-6 col-md-offset-4 col-sm-offset-3">
             <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } ?>
             <div class="alert alert-success">
                             <?php
				if(isset($_GET['otpid']))
				{
			     echo "An OTP has been sent to ".base64_decode ( $_GET['eid']);
				}
				?>
             </div>
          <div class="login-form">
               <div class="alert alert-danger" id="error_message" style="display:none;"></div>
              <div class="alert alert-success" id="success_message" style="display:none;"></div>
            <h1>Withdraw OTP</h1>
            <form action="#" method="POST" name="totp_withdraw_form" id="totp_withdraw_form" class="form-signin dark-form" method="post">
                        <input type="hidden" name="csrf" value=ifpUdZjeFsxQhhA4fH806vjbS3cX9vZnhcvUlYzi />
              <div class="form-group"> 
                  <input type="text" autofocus  name="otp" id="otp" class="form-control input-lg" placeholder="Please enter otp" required  autocomplete="off">
                  <input  class="form-control" value="<?php echo $_GET['otpid'] ?>" required="" type="hidden" name="otp1" id="otp1">
                  <span id="msgdeposite" class="text-danger"></span>
              </div>
     
                 <div class="submit-button">
                     <button onclick="goBack()" class="btn btn-lg btn-gold">Back</button>
                     <button type="button" class="btn btn-lg btn-gold" id="withdrawalbutton">Submit</button>
                 </div>
            
            </form>
            <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
 
</script>



