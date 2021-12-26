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
</style>
<div class="small-header bg-img4" style="background-position: 50% -8px;">
  <div class="container">
   <div class="row"><div class="col-xs-12 col-sm-6"><h2>My Transactions</h2></div> <div class="col-xs-12 col-sm-6"><div class="pull-right" style="margin-top:10px; font-weight:700"><a style="color:#ffe448" href="#">Buy or Sell TMNK</a> / <a style="color:#ffe448" href="#">Get Delivery</a></div></div></div>
  </div>
</div>
<section id="shop" class="section-small bg-gray ng-scope" style="background-color: #1f1e1e;" ng-controller="TransactionCtrl">
  <div class="container">
     
    <div class="row">
        
              <?php
                $site=$this->site->get_live_glod_rate();   $buy = $site['gram_rate'];
                       $id=$this->session->userdata('USERID');
                        $id=$this->db->query("select *from USERS_BALANCE where USERID='$id'")->row();
                        
              if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } ?>
      <div class="tab" role="tabpanel"> 
        <!-- Nav tabs -->
        <ul id="mytrans" class="nav nav-tabs hi-icon-wrap hi-icon-effect-8" role="tablist">
          <li role="presentation" class="active"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><i class="hi-icon flaticon-cart-6"></i> Buy TMNK</a></li>
          <li role="presentation" class=""><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon flaticon-get-money"></i> Sell TMNK</a></li>
         <!-- <li role="presentation" class=""><a href="#Section4" aria-controls="delivery" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon flaticon-coins-1"></i> Delivery</a></li>
         <!--<li role="presentation" class=""><a href="#Section5" aria-controls="jeweller" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon fa fa-inr"></i> INR Deposit</a></li>-->
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabs">
          <div class="tranc-loader" data-loading="" style="display: none;"><div id="loader"></div></div>
         
          <div role="tabpanel" class="tab-pane fade active in" id="Section2">
            <div class="panel-group acc-transaction" id="buy-trac">
              <!-- ngRepeat: tx in buyTxs | orderBy:'-tx_id' -->
            </div>
            <!-- ngIf: !buyTxs.length -->
              <div class="add-box">
                <div class="table-responsive">
                      <table class="table table-bordered" id="trade_buy_history">
                          <thead>
                          <th>Sr. No</th>  
                          <th>TXT ID</th>
                          <th>Market Rate</th>
                         <th>TMNK Amount</th>
                         <th>INR Amount</th>
                         <th>Buy Date</th>
                        <!-- <th>Action</th>-->
                          </thead>   
                      </table>   
                  </div>
              </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="Section3">
            <div class="panel-group acc-transaction" id="sell">
              <!-- ngRepeat: tx in sellTxs | orderBy:'-tx_id' -->
            </div>
           <div class="col-sm-12">
              <div class="add-box">
               <div class="table-responsive">
                   <table class="table table-bordered" style="width:100%;" id="trade_sell_history">
                          <thead>
                          <th>Sr. No</th>  
                          <th>TXT ID</th>
                          <th>Market Rate</th>
                         <th>TMNK Amount</th>
                         <th>INR Amount</th>
                         <th>Sell Date</th>
                          </thead>   
                      </table>   
                  </div>
              </div>
            </div><!-- end ngIf: !sellTxs.length -->
          </div>
          <div role="tabpanel" class="tab-pane fade" id="Section4">
            <div class="panel-group acc-transaction" id="del">
              <!-- ngRepeat: tx in redeemTxs | orderBy:'-tx_id' -->
            </div>
            <!-- ngIf: !redeemTxs.length --><div class="col-sm-6 col-sm-offset-3 ng-scope" ng-if="!redeemTxs.length">
              <div class="add-box">
                <h4 style="margin-top:100px;text-align:center">No Delivery Transactions 3</h4>
              </div>
            </div><!-- end ngIf: !redeemTxs.length -->
          </div>
<div role="tabpanel" class="tab-pane fade" id="Section5">
            <div class="panel-group acc-transaction" id="sell">
              <!-- ngRepeat: tx in sellTxs | orderBy:'-tx_id' -->
            </div>
            <!-- ngIf: !sellTxs.length --><div class="col-sm-6 col-sm-offset-3 ng-scope" ng-if="!sellTxs.length">
              <div class="add-box">
                <h4 style="margin-top:100px;text-align:center">No Sell Transactions 5</h4>
              </div>
            </div><!-- end ngIf: !sellTxs.length -->
          </div>
                 
          

        </div>
      </div>
    </div>
  </div>
</section>