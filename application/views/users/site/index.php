<!--<div class="web-banner">
<div data-background="assets/images/caratlane/white-bg2.jpg" class="sections intro banner">
<div class="container text-center">
<a href="caratlane.html"> <img src="assets/images/caratlane/safegold-caratlane-banner.png" class="hidden-xs"> <img src="assets/images/caratlane/safegold-caratlane-banner-mobile.png" class="img-responsive visible-xs"></a><br>
</div> </div>
</div>-->
<header  id="banner" class="intro bg-dark">
  <!-- Intro Header-->
  <div class="container">
    <!-- Intro Header-->

    <div class="banner-content">
      <div class="row">
        <div class="banner-title text-center">
          <h1 data-wow-delay=".4s" class="wow fadeInDown" style="margin-bottom:5px;">GamoMobile Buy Sell TMNK Coins  </h1>
          <h3 class="wow fadeInUp">Simplest way to accumulate TMNK. GamoMobile Coins</h3>
        </div>
          <div class="col-md-3"></div>
        <div class="col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-0">
              <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } ?>
          <div class="buy-sell-box text-center"> 
            <!-- Nav tabs-->
            <div>
            <ul role="tablist" id="mytrans" class=" side-box nav nav-tabs hi-icon-wrap hi-icon-effect-8">
                <div class="col-md-6 col-sm-6 col-xs-6">
                <li role="presentation" class="active"><a href="#"  id="buy_anchor" aria-controls="buy" role="tab" data-toggle="tab"> <span class="hi-icon flaticon-cart-6"></span> <br>
                        Buy</a></li></div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                <li role="presentation"><a aria-controls="sell" role="tab" id="sell_anchor" data-toggle="tab" href="#"><span class="hi-icon flaticon-get-money"></span><br>
                        Sell</a></li></div>
               <!-- <li role="presentation"><a aria-controls="delivery" role="tab"  id="delivery_anchor" data-toggle="tab" href="#"><span class="hi-icon flaticon-coins-1"></span><br>
                Delivery</a></li>-->
            </ul>
            </div>
            <!-- Tab panes-->
            <div class="tab-content">
                  <?php  ?>
              <div id="buy" role="tabpanel" class="tab-pane fade in active">
                   <?php if($this->session->userdata('USERID')){ 
                       $site=$this->site->get_live_glod_rate();   $buy = $site['buy'];
                       
                        $sell = $site['sell'];
                        
                       $id=$this->session->userdata('USERID');
                        $id=$this->db->query("select *from USERS_BALANCE where USERID='$id'")->row();
                       ?> 
                  <div class="row">
                      <div class="col-md-4">
                          <div class="wallet_desgin">Buy TMNK Rate<br>
                        <?php echo $buy; ?>
                          </div>   
                      </div>  
                      <div class="col-md-4">
                          <div class="wallet_desgin">TMNK Wallet<br>
                            <?php echo $id->TMNK_BALANCE; ?> 
                          </div>   
                      </div>  
                      <div class="col-md-4">
                          <div class="wallet_desgin">INR Wallet<br>
                         <?php echo $id->INR_BALANCE; ?>
                          </div>   
                      </div>  
                  </div>
                 
                   <?php } ?>
                  <form class="dark-form" id="buy_glod_trade" method="post">
                <div class="row">
                  
                 <div class="col-sm-6"> 
                    <div class="form-group floating-label-form-group controls">
                      <label>Buy TMNK</label>
                      <input type="text" name="Buy_weight_Gold" autocomplete="off" id="Buy_weight_Gold" onkeyup="getequivalentto_Buy('GOLD')" onmouseup="getequivalentto_Buy('GOLD')" class="form-control input-lg number" placeholder="Enter TMNK Amount" numbers-only required id="buy_amount_in_rs">
                      </span> </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls">
                        <label>Total INR</label>
                        <input type="text" name="Buy_Total_INR" autocomplete="off" id="Buy_Total_INR" onkeyup="getequivalentto_Buy('INR')" onmouseup="getequivalentto_Buy('INR')" class="form-control input-lg number" placeholder="Enter INR Amount" float-only-for-gm required id="buy_amount_in_gm">
                      </div>
                    </div>
                  </div>
                    <span class="text-danger" id="error_INR_calculator_buy"></span>
                </div>
                <div class="control-group"> </div>
               <?php if($this->session->userdata('USERID')){ ?>
                <button type="submit"   class="btn btn-lg btn-gold"  id="buy_submit_form_gold">Buy Now</button>
               <?php }else{ ?>
                <a href="<?php echo site_url(); ?>login"   class="btn btn-lg btn-gold">Buy Now</a>
               <?php } ?>
              </form>
              </div>
              <div id="sell" role="tabpanel" class="tab-pane fade in">
                        <?php if($this->session->userdata('USERID')){  $id=$this->session->userdata('USERID');
                        $id=$this->db->query("select *from USERS_BALANCE where USERID='$id'")->row();
                       ?> 
                   <div class="row">
                      <div class="col-md-4">
                          <div class="wallet_desgin">Buy TMNK Rate<br>
                        <?php echo $sell; ?>
                          </div>   
                      </div>  
                      <div class="col-md-4">
                          <div class="wallet_desgin">TMNK Wallet<br>
                            <?php echo $id->TMNK_BALANCE; ?> 
                          </div>   
                      </div>  
                      <div class="col-md-4">
                          <div class="wallet_desgin">INR Wallet<br>
                         <?php echo $id->INR_BALANCE; ?>
                          </div>   
                      </div>  
                  </div>
                   <?php } ?>
                <form class="dark-form" id="sell_glod_trade" method="post">
                <div class="row">
                  
                 <div class="col-sm-6"> 
                    <div class="form-group floating-label-form-group controls">
                      <label>Sell TMNK </label>
                      <input type="text" name="Sell_weight_Gold" autocomplete="off" id="Sell_weight_Gold" onkeyup="getequivalentto_Sell('GOLD')" onmouseup="getequivalentto_Sell('GOLD')" class="form-control input-lg number" placeholder="Enter Amount In TMNK" numbers-only required id="buy_amount_in_rs">
                      </span> </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="control-group">
                      <div class="form-group floating-label-form-group controls">
                        <label>Total INR</label>
                        <input type="text" name="Sell_Total_INR" autocomplete="off" id="Sell_Total_INR" onkeyup="getequivalentto_Sell('INR')" onmouseup="getequivalentto_Sell('INR')" class="form-control input-lg number" placeholder="Enter Amount In INR" float-only-for-gm required id="buy_amount_in_gm">
                       
                      </div>
                    </div>
                  </div>
                    <span class="text-danger" id="error_INR_calculator_sell"></span>
                </div>
                <div class="control-group"> </div>
               <?php if($this->session->userdata('USERID')){ ?>
                <button type="submit"   class="btn btn-lg btn-gold"  id="sell_submit_form_gold">Sell Now</button>
               <?php }else{ ?>
                <a href="<?php echo site_url(); ?>login"   class="btn btn-lg btn-gold">Sell Now</a>
               <?php } ?>
              </form>
              </div>
            
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</header>
<div class="clearfix"></div>

<section id="who-we-are" class="section bg-dark2">
  <div class="container">
    <div class="row">
      <div  data-wow-delay=".2s"  class="col-md-12 text-center wow fadeInUp">
        <h2 class="no-pad">You Can Buy Sell TMNK</h2>
        <h4>It’s simple. We want to help you get the most out of TMNK.</h4>
        <br>
      <!--  <a href="#" class="btn btn-gold">Read More</a></div>-->
      <div data-wow-duration="2s" data-wow-delay=".2s" class="col-lg-5 col-lg-offset-1 wow zoomIn"> </div>
    </div>
  </div>
</section>

<!-- Slider-->
<section class="bg-img2" id="how-to-works">
  <div class="overlay"></div>
  <div class="container">
    <h3 class="no-pad">How It Works</h3>
    <div class="row">
      <div class="col-sm-5">
        <div class="work-banner hidden-xs">
          <h2 class="no-pad wow fadeInLeft"  data-wow-delay=".4s" >Buy TMNK.</h2>
        </div>
      </div>
      <div class="col-sm-6 col-sm-offset-1">
        <div class="hi-icon-wrap hi-icon-effect-8 how-it-works-icon"  style="padding-top:0px">
          <div class="how-it-works">
            <div class="col-xs-12  col-sm-2 col-md-1"> <span data-wow-delay=".4s"  class=" wow fadeInLeft hi-icon big-icon flaticon-rich"></span></div>
            <div class="col-xs-12  col-sm-10 col-md-11">
              <div  data-wow-delay=".4s" class="wow feature-text fadeInLeft feature-icon-box">
                <h5 style="color:white">BUY</h5>
                <p>Buy tmnk starting from ₹200. </p>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="work-banner hidden-xs">
          <h2 class="no-pad wow fadeInLeft"  data-wow-delay=".6s" style="color: #a2a2a2;">Sell TMNK.</h2>
        </div>
      </div>
      <div class="col-sm-6 col-sm-offset-1">
        <div class="hi-icon-wrap hi-icon-effect-8 how-it-works-icon"  style="padding-top:0px">
          <div class="how-it-works">
            <div class="col-xs-12  col-sm-2 col-md-1"><span  data-wow-delay=".6s"  class=" wow fadeInLeft  hi-icon   big-icon flaticon-safebox-3"></span></div>
            <div class="col-xs-12  col-sm-10 col-md-11">
              <div  data-wow-delay=".6s" class="wow fadeInLeft feature-text feature-icon-box">
                <h5 style="color: #a2a2a2;">SELL </h5>
                <p>Sell as much or as little of your TMNK at anytime.</p>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>

<!-- faq-->


<!-- Contact Section-->
<!--<section id="contact" class="bg-img5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h3>Contact Us</h3>
        <h4 style="margin-bottom:0px">Retail Outlet Address</h4>
        <h5><i class="fa fa-map-marker fa-fw fa-lg"></i>Shop No 3 Vora Ashish Building, 
          Pandit Solicitor Road, Malad East, 
          Opp Anandpara Hospital, 
          Mumbai-400097<br>
          <a class="btn btn-gold-border" href="https://goo.gl/maps/DcvijCPKz8z" target="_blank" >View on map</a> </h5>
        <h5 style="text-transform:lowercase"><i class="fa fa-envelope fa-fw fa-lg"></i> <a href="mailto:care@safegold.in">care@safegold.in</a> </h5>
        <h5><i class="fa fa-phone fa-fw fa-lg"></i> 888 1000 800 </h5>
      </div>
      <div class="col-md-5 col-md-offset-2">
        <h3>Write To Us</h3>
        
      
        <form  action="/contact-us" name="sentMessage" method="POST" novalidate class="dark-form">
                              <input type="hidden" name="csrf" value= />
          <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-12">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="name" class="sr-only control-label">Name</label>
                  <input id="name" name="name" type="text" placeholder="Name*" required="" data-validation-required-message="Please enter name" class="form-control input-lg">
                  <span class="help-block text-danger"></span> </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="email" class="sr-only control-label">Email</label>
                  <input id="email" name="email" type="email" placeholder="Email*" required data-validation-required-message="Please enter email" class="form-control input-lg">
                  <span class="help-block text-danger"></span> </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="phone_no" class="sr-only control-label">Phone</label>
                  <input id="phone_no" name="phone_no" type="number" placeholder="Phone" class="form-control input-lg">
                  <span class="help-block text-danger"></span> </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-12">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="message" class="sr-only control-label">Message</label>
                  <textarea id="message" name="message" rows="3" placeholder="Message" aria-invalid="false" class="form-control input-lg"></textarea>
                  <span class="help-block text-danger"></span> </div>
              </div>
            </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-lg btn-gold">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>-->