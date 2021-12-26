
        <div class="content-wrapper">
       <?php if($this->session->userdata('USERTYPE')=='Customer'){ ?> 
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Total Daily Sales Item
                    <i class="fa fa-2x fa-shopping-cart mdi-24px float-right"></i>
                  </h4>
                    <h2 class="mb-5"><?php if(!empty($daily_sale_count)){  echo number_format(count($daily_sale_count), 2, '.', ''); }else{ echo '0.00'; }?></h2>
                
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">Total Daily Purchase Item
                    <i class="fa fa-2x fa-shopping-bag mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($daily_purchase_count)){ echo number_format(count($daily_purchase_count), 2, '.', ''); }else{ echo '0.00'; }?></h2>
                
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Daily Purchase Amount
                    <i class="fa fa-2x fa-inr mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($total_purchase_amt)){  echo number_format($total_purchase_amt, 2, '.', ''); }else{ echo '0.00'; }?></h2>
               
                </div>
              </div>
            </div>
              <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Daily Sale Amount
                    <i class="fa fa-2x fa-inr mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($daily_sale_amt)){  echo number_format($daily_sale_amt, 2, '.', ''); }else{ echo '0.00'; } ?></h2>
               
                </div>
              </div>
            </div>
               <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Monthly Sale Item
                    <i class="fa fa-2x fa-shopping-cart mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($monthly_sale_count)){  echo number_format(count($monthly_sale_count), 2, '.', '');  }else{ echo '0.00'; }?></h2>
               
                </div>
              </div>
            </div>
               <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Monthly Purchase Item
                    <i class="fa fa-2x fa-shopping-bag mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($monthly_purchase_count)){  echo number_format(count($monthly_purchase_count), 2, '.', ''); }else{ echo '0.00'; } ?></h2>
               
                </div>
              </div>
            </div>
               <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Monthly Sale Amount
                    <i class="fa fa-2x fa-inr mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($monthly_sale_amount)){ echo number_format($monthly_sale_amount, 2, '.', '');   }else{ echo '0.00'; }?></h2>
               
                </div>
              </div>
            </div>
               <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Monthly Purchase Amount
                    <i class="fa fa-2x fa-inr mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($monthly_purchase_amount)){ echo number_format($monthly_purchase_amount, 2, '.', ''); }else{ echo '0.00'; } ?></h2>
               
                </div>
              </div>
            </div>
               <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Store Product
                    <i class="fa fa-2x fa-shopping-cart mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($total_store_prod)){ echo number_format(count($total_store_prod), 2, '.', ''); }else{ echo '0.00';} ?></h2>
               
                </div>
              </div>
            </div>
          </div>
       <?php } ?>    
            
         
          <!--<div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>                                     
                  </div>
                  <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Traffic Sources</h4>
                  <canvas id="traffic-chart"></canvas>
                  <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>                                                      
                </div>
              </div>
            </div>
          </div>-->
        
        
        </div>
       