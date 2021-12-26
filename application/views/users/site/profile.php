<div class="small-header bg-img4" style="background-position: 50% 0px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>My Profile</h3>
      </div>
    </div>
  </div>
</div>
<?PHP
$site=$this->site->get_live_glod_rate();   $buy = $site['gram_rate'];
                       $id=$this->session->userdata('USERID');
                        $id=$this->db->query("select *from USERS_BALANCE where USERID='$id'")->row();
?>
<section id="profile" class="bg-dark2 section-small ng-scope">
  <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
                 <div class="col-md-3">

                 <div class="wallet_desgin">TMNK Wallet<br>
                            <?php echo $id->TMNK_BALANCE; ?> 
                          </div> 
               
          </div>
          <div class="col-md-3">
             
                <div class="wallet_desgin">INR Wallet<br>
                         <?php echo $id->INR_BALANCE; ?>
                          </div>
             
          </div>
      <div class="col-sm-7">
        <div class="profile-info add-box">
          <h4>Personal Info</h4>
          <div class="profile-details form-signin form-horizontal dark-form">
              <div style="display:none" class="alert alert-danger" id="error_profile_message"></div>
              <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } 
          
            ?>
              <form method="post" id="profile_updates_forms">
            <div class="form-group">
              <label for="name" class=" control-label col-sm-4">Name</label>
              <div class="col-sm-8">                 <input type="text" value="<?php echo $USERS->FULLNAME; ?>" disabled="" class="form-control  ">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class=" control-label col-sm-4">Email</label>
              <div class="col-sm-8">                 <input type="text" value="<?php echo $USERS->EMAIL; ?>" disabled="" class="form-control  ">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class=" control-label col-sm-4">Mobile Number</label>
              <div class="col-sm-8"> <input type="text" value="<?php echo $USERS->MOBILE; ?>" disabled="" class="form-control  ">
              </div>
            </div>
               <div class="form-group">
              <label for="name" class=" control-label col-sm-4">Trademonk Client ID</label>
              <div class="col-sm-8"> <input type="text" value="<?php echo $USERS->Cl_ID; ?>" id="Cl_ID" name="Cl_ID" class="form-control">
              </div>
            </div>
                
                  <div class="col-md-4"></div>
                       <div class="col-sm-8" style="text-align: center;"> <input type="submit" id="profile_update_button" style="color: #fff;background-color: #5cb85c;" value="Update Profile" class="btn btn-success btn-block">  
                  </div>
              </form>
          </div>
        </div>
        <hr>
      </div>
      <div class="col-sm-4 col-sm-offset-1">
        <h4>My Account</h4>
        <ul class="list-unstyled">
            <li><a href="<?php echo site_url(); ?>my-profile"> My Profile</a></li>
          <li><a href="<?PHP echo site_url(); ?>transaction-history"> My Trade</a></li>
          <!--<li><a href="<?php echo site_url(); ?>addresses-details"> My Addresses</a></li>
          <li><a href="<?php echo site_url(); ?>kyc-verfication"> My KYC Verification</a></li>-->
          <li><a href="<?php echo site_url(); ?>deposit-and-withdraw"> My Deposit & Withdraw</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>