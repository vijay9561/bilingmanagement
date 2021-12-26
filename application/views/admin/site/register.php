
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              Customer Registration
            </h3>
          </div>
          <div class="row">
             <?php $tb_state=$this->db->query("select *from tb_state order by state asc")->result(); ?>
   <?php $tb_city=$this->db->query("select *from tb_city order by city asc")->result(); ?>
              <div class="col-md-2"></div>
              <div class="col-md-8">
            <div class="card">
            <div class="card-header">
            Customer Registration
            </div>
              <div class="card-body">
                   <div class="alert alert-danger" id="error_message_register" style="display:none;"></div>
                  <div class="alert alert-success" id="success_message_register" style="display:none;"></div>
                  <form method="post" id="registration_users">
                <div class="form-group">
                <label>Username </label>  
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                <label>Email ID </label>  
                <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Password">
                </div>
                  <div class="form-group">
                <label>Password </label>  
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                  <div class="form-group">
                <label>Mobile No </label>  
                <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile No">
                </div>
                <div class="form-group">
                <label>Store Name </label>  
                <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Store Name">
                </div>
                  
                  <div class="form-group">
                       <label>Select State </label> 
                        <select type="text" class="form-control" name="state" id="state" onchange="stater()">
                           <option value="">Select State *</option>  
                            <?php foreach($tb_state as $st){ ?>
                            <option value="<?php echo $st->state_id; ?>"><?php echo $st->state; ?></option> 
                           <?php } ?>
                        </select>
                    </div>
                  
                    <div id="getstate">
                    <div class="form-group"> 
                          <label>Select City </label> 
                        <select type="text" class="form-control" name="city" id="city">
                            <option value="">Select City *</option>
                             <?php foreach($tb_city as $city){ ?>
                            <option value="<?php echo $city->city_id; ?>"><?php echo $city->city; ?></option> 
                           <?php } ?>
                        </select>
                    </div>  
                    </div>
                      <div class="form-group">
                <label>Pincode </label>  
                <input type="text" class="form-control" name="pincode" id="store_name" placeholder="Pincode">
                </div>
                      <div class="form-group">
                <label>Address Details </label>  
                <textarea type="text" class="form-control" name="address" id="address" placeholder="Address Details"></textarea>
                </div>
                  <button type="submit" id="Register_customers" class="btn btn-gradient-primary mr-2">Register Customer</button>
                  </form>
              </div>
            </div>
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