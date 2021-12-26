<section id="login" class="intro intro-fullscreen"> 
  <!-- Intro Header-->
  <div class="intro-body"> 
    <!-- Login-->
    <style>
     .btn-gold {
    border: 2px solid #18191b !important;
    background-color: #ffe448 !important;
    color: #18191b  !important;
} 
        
    </style>
    <div class="container">
      <div class="row wow fadeIn">
        <div class="col-md-5 col-xs-12 col-sm-6 col-md-offset-4 col-sm-offset-3">
             <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } ?>
          <div class="login-form">
             
            <h1>Deposit TMNK</h1>
            <div class="text-danger" id="msgdeposite_dep"></div>
                        <div>
                            <form id="pay" class="form-signin dark-form">
                            <br><br>
                           
                            <div class="form-group">
                                <label> Enter Your BTCMonk Client ID</label>
                                <input required="" class="form-control input-lg digitaccesptedd" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" step="" name="uid1" id="uid1">
                                <span id="uid1r" style="color:red"></span>
                            </div>
                             <div id="otpdiv" style="display:none;">
                              <div class="form-group"> 
                                  <label>Enter Your OTP</label>
                               <input  class="form-control input-lg digitaccesptedd" required="" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="otp" id="otp">
                               <span id="otpr" style="color:red"></span>
                             </div>
                             </div>
                            <input required="" type="hidden" name="fee" value="0.00" id="fee">
                            <input required="" type="hidden" name="amount" value="<?php echo $this->session->userdata('TMNKAMOUNT'); ?>" id="amount">
                           <!-- <input required="" type="hidden" name="tmnkamount" value="<?php print_r($tmnkamount); ?>" id="tmnkamount">-->
                            <input required="" type="hidden" name="phone" value="" id="phone">
                             <input required="" type="hidden" name="currency" value="tmnk" id="currency">
                            <div class="form-group">
                                <input id="depositbutton" type="button" class="btn btn-lg btn-gold" name="Submit" value="Send OTP" >
                                <input id="depositbutton1" type="button" style="display:none;" class="btn btn-lg btn-gold" name="Submit" value="Deposit" >
                            </div>
                            </form>
                       </div>
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
