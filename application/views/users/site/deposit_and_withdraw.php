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
.modal-content {
    position: relative;
    background-color: #1d1d1c;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #ebe5e5;
    background-color: #191818;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #696767;
        color: #afabab;
}
.table-bordered {
    border: 1px solid #554f4f;
}
.modal-title{color:#fff;}
</style>
<div class="small-header bg-img4" style="background-position: 50% -8px;">
  <div class="container">
   <div class="row"><div class="col-xs-12 col-sm-6"><h2>My Deposit & Withdraw</h2></div> <div class="col-xs-12 col-sm-6"><div class="pull-right" style="margin-top:10px; font-weight:700"><a style="color:#ffe448" href="#">Quick Deposit & Withdraw</a></div></div></div>
  </div>
</div>
<section id="shop" class="section-small bg-gray ng-scope" style="background-color: #1f1e1e;" ng-controller="TransactionCtrl">
  <div class="container">
          <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } 
             $site=$this->site->get_live_glod_rate();   
                $buy = $site['gram_rate'];
                       $id=$this->session->userdata('USERID');
                        $get_id=$this->db->query("select *from USERS_BALANCE where USERID='$id'")->row();
                  //      echo $this->db->last_query();
                     //   exit;
            ?>
      <div class="row">
          <div class="col-md-3"></div>  
          <div class="col-md-3">
                 <a href="#" data-toggle="modal" data-target="#Deposit_TMNK_Modals" class="btn btn-success btn-block">Deposit TMNK</a>
                 <div class="wallet_desgin">TMNK Wallet<br>
                    
                            <?php echo $get_id->TMNK_BALANCE; ?> 
                          </div> 

                 <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#Witdraw_TMNK_Modal">Withdraw TMNK</a>
          </div>
          <div class="col-md-3">
               
                <a href="#" data-toggle="modal" data-target="#Deposit_INR_Modal" class="btn btn-success btn-block">Deposit INR</a>
                <div class="wallet_desgin">INR Wallet<br>
                         <?php echo $get_id->INR_BALANCE; ?>
                          </div>
              
               <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#Witdraw_INR_Modal">Withdraw INR</a>
          </div>
      </div>
    <div class="row">
      <div class="tab" role="tabpanel"> 
        <!-- Nav tabs -->
        <ul id="mytrans" class="nav nav-tabs hi-icon-wrap hi-icon-effect-8" role="tablist">
          <li role="presentation" class="active"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><i class="hi-icon fa fa-inr"></i> Deposit  History</a></li>
          <li role="presentation" class=""><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon flaticon-get-money"></i> Withdraw  History</a></li>
         <!-- <li role="presentation" class=""><a href="#Section4" aria-controls="delivery" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon flaticon-coins-1"></i> Delivery</a></li>
         <li role="presentation" class=""><a href="#Section5" aria-controls="jeweller" role="tab" data-toggle="tab" aria-expanded="false"><i class="hi-icon fa fa-inr"></i> INR Deposit</a></li>-->
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
                      <table class="table table-bordered" id="deposit_INR_History">
                         <thead>
                         <th>Sr. No</th>  
                         <th>TXT ID</th>
                         <th>Amount</th>
                         <th>Status</th>
                         <th>Date</th>
                         </thead>   
                      </table>   
                  </div>
              </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="Section3">
            <div class="panel-group acc-transaction" id="sell">
              <!-- ngRepeat: tx in sellTxs | orderBy:'-tx_id' -->
            </div>
            <!-- ngIf: !sellTxs.length --><div class="col-sm-12 ng-scope" ng-if="!sellTxs.length">
              <div class="add-box">
                
                 <div class="table-responsive">
                     <table class="table table-bordered" id="withdraw_INR_History" style="width:100%;">
                         <thead>
                         <th>Sr. No</th>  
                         <th>TXT ID</th>
                         <th>Amount</th>
                         <th>Fees</th>
                         <th>Status</th>
                         <th>Date</th>
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

 <div class="modal fade" id="Deposit_INR_Modal"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deposit Your INR</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table  class="table table-bordered">
                       <!-- <thead>
                            <tr><th colspan="2" align="center">Gamomobile Bank Details</th></tr>
                            <tr><th>Beneficiary:</th><td>gamomobile</td></tr>  
                             <tr><th>Bank:</th><td> ICICI Bank</td></tr> 
                            <tr><th>Account Number:</th><td>326405500087</td></tr>
                             <tr><th>IFSC Code:</th><td>ICIC0003264</td></tr>
                            
                        </thead>  --> 
                        <thead>
                            <tr><th colspan="2" align="center">Gamomobile Bank Details</th></tr>
                            <tr><th>Beneficiary:</th><td>Pushpak co society</td></tr>  
                             <tr><th>Bank:</th><td> The satara d.c.c co-op bank Ltd</td></tr> 
                            <tr><th>Account Number:</th><td>1018029000041</td></tr>
                             <tr><th>IFSC Code:</th><td>IBKLO485SDC</td></tr>
                            
                        </thead> 
                    </table>   
                </div>    
            </div>
            <div class="alert alert-danger" id="error_INR_calculator" style="display:none;"></div>
            <form method="post" id="deposit_inr_forms">
                  <div class="form-group">
                    <input type="text" class="form-control" id="TRANACTION_ID" placeholder="TXN Ref" name="TRANACTION_ID">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="AMOUNT" placeholder="Amount In INR" name="AMOUNT">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="CRATED_DATE" placeholder="Date" name="CRATED_DATE">
                </div>
                <div class="form-group">
                    <input type="submit" id="INR_submit_button" class="btn btn-primary" value="Deposit INR">   
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


 <div class="modal fade" id="Witdraw_INR_Modal"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Withdraw Your INR</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="error_with_calculator" style="display:none;"></div>
            <form method="post" id="withdraw_inr_amount">
                <b>Rs 50 /- Rupees Withdraw Fees</b> 
                  <div class="form-group">
                    <input type="text" class="form-control" id="With_Amount" placeholder="Witdraw INR" name="With_Amount">
                </div>
         
                <div class="form-group">
                    <input type="submit" id="withdraw_submit_button" class="btn btn-primary" value="Withdraw INR">   
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

 <div class="modal fade" id="Witdraw_TMNK_Modal"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Withdraw Your TMNK</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="error_with_tmnk_calculator" style="display:none;"></div>
            <form method="post" id="withdraw_tmnk_amount">
                <b> 1 Percent TMNK Fees</b> <br><br>
                  <div class="form-group">
                    <input type="text" class="form-control" id="With_Amount_TMNK" placeholder="Witdraw TMNK" name="With_Amount_TMNK">
                    <span id="With_Amount_TMNKR" class="text-danger"></span>
                </div>
         
                <div class="form-group">
                    <input type="button" id="withdraw_tmnk_submit_button" onclick="return withdraw_tmnkamount()" class="btn btn-primary" value="Withdraw TMNK">   
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


 <div class="modal fade" id="Deposit_TMNK_Modals"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deposit Your TMNK</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="error_deposit_tmnk_calculator" style="display:none;"></div>
            <form method="post" id="deposit_tmnk_amount_forms">
                  <div class="form-group">
                   <input type="text" class="form-control" id="deposit_Amount_TMNK" placeholder="TMNK AMOUNT" name="deposit_Amount_TMNK">
                </div>
         
                <div class="form-group">
                    <input type="submit" id="deposit_tmnk_buttons"  class="btn btn-primary" value="Deposit TMNK">   
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>