<!--<div id="preloader">
  <div id="status"></div>
</div>-->
<div id="loader-wrapper">
    <svg viewBox=" 0 0 512 512" id="loader">
        <linearGradient id="loaderLinearColors" x1="0" y1="0" x2="1" y2="1">
            <stop offset="5%" stop-color="#ff8916"></stop>
            <stop offset="100%" stop-color="#ff7200"></stop>
        </linearGradient>        
        <g>
            <circle cx="256" cy="256" r="150" fill="none" stroke="url(#loaderLinearColors)"></circle>
        </g>
        <g>
            <circle cx="256" cy="256" r="125" fill="none" stroke="url(#loaderLinearColors)"></circle>
        </g>
        <g>
            <circle cx="256" cy="256" r="100" fill="none" stroke="url(#loaderLinearColors)"></circle>
        </g>
        <g>
            <circle cx="256" cy="256" r="75" fill="none" stroke="url(#loaderLinearColors)"></circle>
        </g>
        <circle cx="256" cy="256" r="60" fill="url(#loaderImage)" stroke="none" stroke-width="0"></circle>

        <!-- Change the preloader logo here -->
        <defs>
            <pattern id="loaderImage" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                <image href="<?php echo base_url(); ?>assets/images/loader-logo.png" preserveAspectRatio="none" width="1" height="1"></image>
            </pattern>
        </defs>
    </svg>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<header> 
    <div id="loading1" style="display:none;"> <img id="loading-image1" src="<?php echo base_url();?>assets/images/recharge_loader2.gif" alt="Loading..." /> </div>
  <nav class="navbar navbar-universal navbar-custom navbar-fixed-top"> 
<div class="container">
  <div class="navbar-header">
    <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    
    <a style="font-size:24px;" href="<?php echo site_url(); ?>" class="navbar-brand">
    <img src="<?php echo base_url(); ?>assets/images/sslogo2.png" alt="Gamo Logo" class="logo">
    <img src="<?php echo base_url(); ?>assets/images/sslogo2.png" alt="Gamo Logo" class="logodark">
    </a>
     </div>
  <div class="collapse navbar-collapse navbar-main-collapse">
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden"><a href="<?php echo site_url(); ?>#page-top"></a></li>
         <li><a href="<?php echo site_url(); ?> ">Buy / Sell TMNK </a></li>
         <li><a href="<?php echo site_url(); ?>Product">Our Products</a></li>
        <li><a href="<?php echo site_url(); ?>About_Us">About Us</a></li>
    <!--    <li><a href="#">Join Us</a></li>-->
    <li><a href="<?php echo site_url(); ?>Contact_Us">Contact US</a></li>
        <li class="menu-divider visible-lg">&nbsp;</li>

       <?php if(!$this->session->userdata('USERID')){ ?>   
        <li><a  href="<?php echo site_url(); ?>login">Login</a></li>
        <li><a  href="<?php echo site_url(); ?>register">Register</a></li>
       <?php }else{ ?>
        <li><a  href="<?php echo site_url(); ?>Logout">Logout</a></li>
        <li><a href="#" class="has-submenu" id="sm-1554963799341509-1" aria-haspopup="true" aria-controls="sm-1554963799341509-2" aria-expanded="false"> <i class="fa fa-user"></i> <?php echo substr($this->session->userdata('FULLNAME'),0 ,15); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu sm-nowrap" id="sm-1554963799341509-2" role="group" aria-hidden="true" aria-labelledby="sm-1554963799341509-1" aria-expanded="false" style="width: auto; display: none; top: auto; left: 0px; margin-left: 0px; margin-top: 0px; min-width: 10em; max-width: 20em;">
              <li><a href="<?php echo site_url(); ?>my-profile"> My Profile</a></li>
              <li><a href="<?php echo site_url(); ?>deposit-and-withdraw">Deposit & Withdraw</a></li> 
              <li><a href="<?php echo site_url(); ?>transaction-history"> My Buy Sell TMNK History</a></li>
            <!--  <li><a href="<?php echo site_url(); ?>addresses-details"> My Addresses</a></li>-->
              <li><a href="<?php echo site_url(); ?>kyc-verfication"> KYC Verification</a></li>
              <li><a href="<?php echo site_url(); ?>Logout">Logout</a></li>
            </ul>
        </li>   
       <?php } ?>
        
      </ul>
  </div>
</div>
 </nav>
</header> 
<style>
  #loading1 {

 width: 100%;

 height: 100%;

 top: 0px;

 left: 0px;

 position: fixed;

 display: block;

 opacity: 0.7;

 z-index: 99999999;

 text-align: center;

  }

#loading-image1 {

 position: absolute;

 top: 40%;

 left: 30%;

 z-index:99999999;

}  
    
</style>
   