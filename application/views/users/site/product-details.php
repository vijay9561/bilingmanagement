<style>
    .tab .nav-tabs li a {
    display: block;
    padding: 20px;
    border: none;
    border-radius: 0;
    font-size: 17px;
    font-weight: 700;
    color: #f3f1f1!important;
    margin-right: 0;
    text-align: center;
    z-index: 1;
    transition: all .3s ease 0s;
}
.tab .tab-content {
    padding: 20px;
    margin-top: -5px;
    border-radius: 0 0 5px 5px;
    border-top: 1px solid #d7d6d6;
    font-size: 15px;
    color: #e6e6e6;
    line-height: 30px;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #17171d;
    border-color: #17171d;
}
.panel-primary {
    border-color: #121313;
}
.panel {
    margin-bottom: 20px;
    background-color: #030303;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.portfolio_images{width:100%;height:300px;}
.container_images {
  position: relative;
}
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #161515;
  z-index: 99999;
}

.container_images:hover .overlay {
  opacity:1;
}

.text {
    color: white;
    font-size: 16px;
    position: absolute;
    top: 40%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    text-align: justify;
    padding-left: 13px;
    padding-right: 20px;
    line-height: 24px;
}
.btn-success {
    color: #fff;
    background-color: #eb5e3b;
    border-color: #af5225;
        border-radius: 34px !important;
    font-size: 15px !important;
}
.btn-success:hover {
    color: #fff;
    background-color: #f9c733;
    border-color: #f9c733;
}
.panel:hover {
    margin-bottom: 20px;
    background-color: #030303;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    text-shadow: 2px 2px 3px 3px red !important;
    box-shadow: 0px 0px 3px 3px #464545;
}
</style>
<div class="small-header bg-img4" style="background-position: 50% -8px;">
  <div class="container">
   <div class="row"><div class="col-xs-12 col-sm-6"><h2>Product</h2></div> <div class="col-xs-12 col-sm-6"><div class="pull-right" style="margin-top:10px; font-weight:700"><a style="color:#ffe448" href="#">Product</a></div></div></div>
  </div>
</div>
<section id="shop" class="section-small bg-gray ng-scope" style="background-color: #1f1e1e;" ng-controller="TransactionCtrl">
  <div class="container">
    <div class="row">
  <div class="col-md-6">
   <div class="panel panel-primary">
    <div class="panel-heading">Trademonk</div>
    <div class="panel-body container_images">
         
     <img src="<?php echo base_url(); ?>assets/images/trademonk.png"  class="portfolio_images" alt=""/>
     <div class="overlay">
    <div class="text">Trademonk is India's first Cryptocurrency exchange and top Bitcoin exchange that allows you to trade with other users at a very low little cost. Buying and selling happens in real time, 24/7! We constantly improve usability and develop new features based on our customer's feedback. Join now for a seamless trading experience!
        <br>
        <div style="text-align: center;"><br>
            <a  href="https://www.trademonk.com/" target="_blank" class="btn btn-success"> Visit Site</a>
        </div>
    </div>
  </div>
  </div>
 </div>
</div>
 <div class="col-md-6">
   <div class="panel panel-primary">
   <div class="panel-heading">Suvarna Siddhi</div>
     <div class="panel-body container_images">
     <img src="<?php echo base_url(); ?>assets/images/suransandhi.png"  class="portfolio_images" alt=""/>   
     <div class="overlay">
         <div class="text">Suvarna Siddhi is an organised and transparent method of buying 24 carat gold in compliance with all applicable laws and regulations. Suvarna Siddhi is neither a financial product nor a deposit but a method of purchasing gold for the personal needs of the customer.<br>
             <div style="text-align: center;"><br>
        <a  href="http://www.suvarnasiddhi.com/" class="btn btn-success" target="_blank"> Visit Site</a>
        </div>
         </div>
  </div>
  </div>
  </div>
 </div>             
          <div class="col-md-6">
            <div class="panel panel-primary">
  <div class="panel-heading">Stakeplayer</div>
  <div class="panel-body container_images">
      <img src="<?php echo base_url(); ?>assets/images/stackplayer.png"  class="portfolio_images" alt=""/>
      <div class="overlay">
         <div class="text">Stakeplayer is the world’s favourite online sports betting company. Founded in 2018, the group employees over 300 people and has over 35 million customers worldwide.<br>
             <div style="text-align: center;"><br>
        <a  href="https://stakeplayer.com/" class="btn btn-success" target="_blank"> Visit Site</a>
        </div>
       </div>
      </div>
  </div>
</div>
        </div>
           <div class="col-md-6">
            <div class="panel panel-primary">
  <div class="panel-heading">Bitteenpatti</div>
  <div class="panel-body container_images">
     <img src="<?php echo base_url(); ?>assets/images/bitteenpati.png"  class="portfolio_images" alt=""/>   
     <div class="overlay">
         <div class="text">Enthusiastically redefine vertical users vis-a-vis highly efficient mindshare. Efficiently e-enable enabled e-commerce and market positioning potentialities. Seamlessly mesh empowered bandwidth whereas extensive relationships. Dynamically synergize wireless methodologies via worldwide resources. Progressively enhance visionary total linkage via end-to-end e-services.<br>
             <div style="text-align: center;"><br>
        <a  href="https://bitteenpatti.com/" class="btn btn-success" target="_blank"> Visit Site</a>
        </div>
         </div>
  </div>
  </div>

</div>
        </div>
    </div>
  </div>
</section>