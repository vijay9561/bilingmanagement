
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-percent"></i>                 
              </span>
              GST Master 
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['add'])){
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Add GST Master
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="gst_master_forms">
                <div class="form-group">
                <label>Enter GST Percent </label>  
                <input type="text" class="form-control" value="" name="gst_master" id="gst_master" placeholder="GST Percent">
                </div>
                  <button type="submit" id="gst_button" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
            <?php }elseif(isset($_GET['update'])){
                $id= base64_decode($_GET['update']);
                $g=$this->db->query("select *from Gst_Master where id='$id'")->row();
                ?> 
               
           <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Update GST Master
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="gst_master_forms_update">
                <div class="form-group">
                <label>Enter GST Percent </label>  
                <input type="hidden" value="<?php echo $id; ?>" id="id" name="id" />
                <input type="text" class="form-control" value="<?php echo $g->gst_master; ?>" name="gst_master" id="gst_master" placeholder="GST Percent">
                </div>
                  <button type="submit" id="gst_button_update" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
               
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> GST Master List <a href="<?php echo site_url() ?>GST-Master?add=new" class="btn btn-gradient-info btn-sm"> Add New <i class="fa fa-plus"></i></a>
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="gst_master_list">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>GST Percent</th>
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