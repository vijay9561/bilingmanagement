
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account"></i>                 
              </span>
              Customer 
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['update'])){
                $id= base64_decode($_GET['update']);
                $update=$this->db->query("select *from Users where id='$id'")->row();
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Update Customer Details
            </div>
              <div class="card-body">
                  <?php $tb_state=$this->db->query("select *from tb_state order by state asc")->result(); ?>
                  <?php $tb_city=$this->db->query("select *from tb_city order by city asc")->result(); ?>
                   <form method="post" id="update_customer">
                <div class="form-group">
                <label>Username </label>  
                <input type="text" class="form-control" value="<?php echo $update->username; ?>" name="username" id="username" placeholder="Username">
                <input type="hidden" value="<?php echo $_GET['update']; ?>" id="id" name="id">
                </div>
                <div class="form-group">
                <label>Email ID </label>  
                <input type="text" class="form-control" name="email_id" value="<?php echo $update->email_id; ?>" id="email_id" placeholder="Password">
                </div>
     
                  <div class="form-group">
                <label>Mobile No </label>  
                <input type="text" class="form-control" name="mobile_no" value="<?php echo $update->mobile_no; ?>" id="mobile_no" placeholder="Mobile No">
                </div>
                <div class="form-group">
                <label>Store Name </label>  
                <input type="text" class="form-control" name="store_name" value="<?php echo $update->store_name; ?>" id="store_name" placeholder="Store Name">
                </div>
                  
                  <div class="form-group">
                       <label>Select State </label> 
                        <select type="text" class="form-control" name="state" id="state" onchange="stater()">
                  
                            <?php foreach($tb_state as $st){ 
                                if($update->state==$st->state_id){
                                ?>
                            <option value="<?php echo $st->state_id; ?>" selected="selected"><?php echo $st->state; ?></option> 
                                <?php }else{ ?>
                            <option value="<?php echo $st->state_id; ?>"><?php echo $st->state; ?></option> 
                            <?php } } ?>
                        </select>
                    </div>
                  
                    <div id="getstate">
                    <div class="form-group"> 
                          <label>Select City </label> 
                        <select type="text" class="form-control" name="city" id="city">
                            <option value="">Select City *</option>
                             <?php foreach($tb_city as $city){ ?>
                           <?php  if($update->city==$city->city_id){ ?>
                            <option value="<?php echo $city->city_id; ?>" selected="selected"><?php echo $city->city; ?></option> 
                           <?php }else{ ?>
                            <option value="<?php echo $city->city_id; ?>"><?php echo $city->city; ?></option> 
                             <?php } } ?>
                        </select>
                    </div>  
                    </div>
                <div class="form-group">
                <label>Pincode </label>  
                <input type="text" class="form-control" name="pincode" value="<?php echo trim($update->pincode); ?>" id="store_name" placeholder="Pincode">
                </div>
                 <div class="form-group">
                <label>Address Details </label>  
                <textarea type="text" class="form-control" name="address" id="address" placeholder="Address Details"><?php echo trim($update->address); ?></textarea>
                </div>
                       
                  <button type="submit" id="Register_customers" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
              <i class="mdi mdi-table-large"></i> Customer List
            </div>
              <div class="card-body">
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="customer_list_data">
                          <thead>
                              <tr>
                          <th>Sr.No</th>
                          <th>Username</th>
                          <th>Mobile No</th>
                          <th>Store Name</th>
                          <th>Store Address</th>
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
        <script>
     function stater() { if($("#state").val()=="") { }else{                  
   var state=$("#state").val();
//$("#loading").show();
if(state!=''){
    $.ajax({  
url:"<?php echo site_url(); ?>SupportController/getcities_address",  
method:"POST",  
data:{state:state},  
success:function(resp){  
   $('#getstate').hide().html(resp).fadeIn('slow');
   //$("#loading").hide();
   } 
  })
  }
  } 
 }  
    </script>