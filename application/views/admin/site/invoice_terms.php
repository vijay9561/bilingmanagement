    
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-file-archive-o"></i>                 
              </span>
            Invoice Terms
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['add'])){
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Add  Invoice Terms
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="inovice_terms_forms">
                <div class="form-group">
                <label>Invoice Terms </label>  
                <input type="text" class="form-control" value="" name="details" id="details" placeholder="Invoice Terms & Condition">
                </div>
              
                  <button type="submit" id="inovice__button" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
            <?php }elseif(isset($_GET['update'])){
                $id= base64_decode($_GET['update']);
                $rows=$this->db->query("select *from Product_Master where id='$id'")->row();
                ?> 
               
           <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Update Product Master
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="product_master_upate">
                   <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
                <div class="form-group">
                <label>Product Name </label>  
                <input type="text" class="form-control" value="<?php echo $rows->product_name; ?>" name="product_name" id="product_name" placeholder="Product Name">
                </div>
                 <div class="form-group">
                <label>Product Price (Per Item) </label>  
                <input type="text" class="form-control" value="<?php echo $rows->price; ?>" name="price" id="price" placeholder="Product Price (Per Item)">
                </div>
                  <div class="form-group">
                <label>Select GST Rate </label>  
                <select type="text" class="form-control" value="" name="gst_rate" id="gst_rate" placeholder="Product Price (Per Item)">
                   
                    <option value="0" <?php if($rows->gst_rate=='0'){ echo 'selected'; } ?>>No GST</option>
                   <?php foreach($Rates as $row){ ?>
                  <option <?php if($rows->gst_rate==$row->gst_master){ echo 'selected'; } ?> value="<?php echo $row->gst_master; ?>"><?php echo $row->gst_master; ?> % Percent</option>  
                   <?php } ?> 
                </select>
                </div>   
                  <button type="submit" id="product_update_button" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
               
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Invoice Terms <a href="<?php echo site_url() ?>inovice_terms?add=new" class="btn btn-gradient-info btn-sm"> Add New <i class="fa fa-plus"></i></a>
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="invoice_tables">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Terms Details</th>
                        <th>Created Date</th>
                        <th style="width:22%;">Action</th>
                              </tr>
                          </thead>    
                      </table>   
                  </div>
              </div>
            </div>
            <?php } ?>
           </div>
          </div>   
        </div>
     