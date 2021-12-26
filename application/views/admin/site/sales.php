
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-shopping-bag"></i>                 
              </span>
            Sale Product
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['add'])){
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> Sale  Product
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="sale_master_forms">
                   <div class="row">  
                <div class="form-group col-md-3">
                <label>Product Name </label>  
                <input type="text" class="form-control" value="" name="product_name" autocomplete="off" id="product_names" placeholder="Product Name">
                </div>
                 <div class="form-group col-md-2">
                <label>Price (Per Item) </label>  
                <input type="text" class="form-control" value="" name="product_price" id="product_price" placeholder="Price (Per Item)">
                </div>
                  <div class="form-group col-md-2">
                <label>Select GST Rate </label>  
                <select type="text" class="form-control" value="" name="gst_rate" id="gst_rate" placeholder="Price (Per Item)">
                    <option value="">Select GST Rate</option>
                    <option value="0">No GST</option>
                   <?php foreach($Rates as $row){ ?>
                  <option value="<?php echo $row->gst_master; ?>"><?php echo $row->gst_master; ?> % Percent</option>  
                   <?php } ?> 
                </select>
                </div>  
                  <div class="form-group col-md-3">
                <label>Quantity</label>  
                <input type="text" class="form-control" value="" name="qty" id="qty" placeholder="Quantity">
                </div>  
                  <div class="form-group col-md-2">    
                      <br>
                  <button type="submit" id="sale__button" class="btn btn-gradient-primary mr-2">Add Item</button>
                  </div>
                  </div>
                  </form>
              
              </div>     
            </div>
               <div id="get_temp_details">
                 <?php if(count($datas)>=1){ ?>  
                    <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> Item Details
            </div>
              <div class="card-body"> 
                    <div class="alert alert-danger" id="error_message_submit" style="display:none;"></div> 
<table class="table table-bordered">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Product Name</th>
                        <th>Rate (per Item)</th>
                        <th>Sub Total</th>
                        <th>Quantity</th>
                        <th>GST Percent</th>  
                        <th>GST Amount</th>
                      
                        <th>Action</th>
                              </tr>
                          </thead> 
                          <tbody>
                          <?php $i=1; foreach($datas as $row){ ?>
                              <tr>
                             <td><?php echo $i++; ?></td>
                             <td><?php echo $row->product_name; ?></td> 
                             <td><?php echo $row->product_price; ?></td> 
                             <td><?php $subtotal=$row->product_price*$row->qty;
                               echo number_format($row->product_price*$row->qty,2,".",",");
                                $gst_amount = $subtotal * ($row->gst_rate / 100); 
                               ?></td> 
                            
                             <td><?php echo $row->qty; ?></td>
                              <td><?php echo $row->gst_rate; ?> %</td> 
                             <td><?php echo $gst_amount; ?></td>
                             <td><a href="#" onclick="return delete_sales_masters(<?php echo $row->id ?>)" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                              </tr>    
                          <?php } ?>    
                          </tbody>   
                      </table> 
                  <br>
                     <form method="post" id="finally_purchase_form">  
                          <div class="row">
                      <div class="col-md-5">
                          <input type="text" id="vendor_name" class="form-control" placeholder="Customer Name" name="vendor_name" />  
                          <span id="vendor_namer" style="color:red"></span>
                      </div>   
                      <div class="col-md-5">
                          <input type="text" id="mobile_no" class="form-control" placeholder="Mobile Number" name="mobile_no" /> 
                          <span id="mobile_nor" style="color:red"></span>
                      </div>
                     <div class="form-group col-md-2">    
                         <button type="button" id="sales_final_button" onclick="sale_product()" class="btn btn-gradient-primary mr-2">Submit</button>
                  </div> 
                            </div>  
                      </form>
              </div>
    </div>   
                 <?php } ?>
               </div>   
            <?php }elseif(isset($_GET['pid'])){
                $id= base64_decode($_GET['pid']);
                $rows=$this->db->query("select *from Sale_Master where id='$id'")->row();
                 $current=$this->db->query("select *from Users where id='".$this->session->userdata('ADMIN_ID')."'")->row();
                   $city=$this->db->query("select *from tb_city where city_id='".$current->city."'")->row();
                    $state=$this->db->query("select *from tb_state where state_id='".$current->state."'")->row();
                  $items=$this->db->query("select *from sales_Item where pid='$id'")->result(); 
                   $terms=$this->db->query("select *from tbl_terms_condition where userid='$current->id'")->result(); 
                ?> 
               

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

  <div class="row"> </div>
  <!--/.row-->
  <div class="row" style="margin-top:10px;">
    <div class="col-lg-12">
      <?php if(isset($_SESSION['SUCESSMSG'])){ ?>
      <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark">
          <use xlink:href="#stroked-checkmark"></use>
        </svg>
        <?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> </div>
      <?php unset($_SESSION['SUCESSMSG']); } ?>
    </div>
  </div>
  <!--/.row-->
  <script type="text/javascript">
    function printpage()
        {
		var report = document.getElementById('myprintings');
		var printWindow = window.open('','','width=400,height=1000');
		printWindow.document.write(report.innerHTML);       
		printWindow.resizeTo(screen.width, screen.height);
                printWindow.document.close();
		printWindow.focus();
		printWindow.print();
                printWindow.close();

      }
	
</script>
<style>
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<div class="col-md-3" style="text-align:center;">
    <input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary btn-sm">
    <a href="<?php echo site_url(); ?>sales_master" class="btn btn-danger btn-sm"> Back</a></div>
  <div class="row">
    
    <div  id="myprintings">
	
		<div class="col-md-2"></div>
      <div class="col-md-9" style="color: #000; padding:20px;">
      <!--<h3 style="text-align:center; color:#000;">TAX INVOICE</h3>-->
        <table border="1" style="background-color:#FFFFFF;border-collapse: collapse; width:800px; padding:10px; color:#000; text-align:left; font-size:11px;">
      <!--  <tr><th colspan="5" align="center"></th></tr>-->
          <tr>
		  <!--<th colspan="" style="width:30%; border-right-style:none;">
		  <img src="<?php echo base_url(); ?>assets/img/imageedit_8_8928632713.png" style="width: 105px;
    height: 100px;
    margin-left: 7px;" />
		  </th>-->
            <th style="font-size:18px;border-left-style: none;    text-align: center;" colspan="6"><p style="    color: #000;text-align: center;background-color: #f2edf3;font-size: 20px;padding-bottom: 6px;padding-top: 4px;"><?php echo $current->store_name; ?></p>
        <p style="margin-left:10px; font-size:14px; color:#000000;font-weight: normal;">
                <?php echo $current->address; ?>,<br />
                <?php echo $city->city; ?> ,  <?php echo $state->state; ?> 
                Mob.No:- +91 <?php echo $current->mobile_no; ?> <br />
                E-mail :- <?php echo $current->email_id; ?>
               </p></th>
          
          </tr>
          <tr>
            <th colspan="2" rowspan="1" style="width:100px;">
            <p style="color: #000;margin-left: 8px;">Customer Name,</p>
			<p style="margin-left:20px; font-size:12px; font-weight:bold; color:#000;">
            Name: <?php  echo $rows->vendor_name; ?><br />
           Mobile: <?php echo $rows->mobile_no; ?><br />
            </p>
            
			<p style="margin-left:20px; font-size:14px; font-weight:bold; color:#000;"></p>
			</th>
                        <th  colspan="2" style="width:60px;padding-left:5px; white-space:nowrap;">INOVICE NO:<br />
              INVOICE DATE:<BR />
            
            <th colspan="2" style="padding-left:5px; padding-right:5px;">
			<?php echo $rows->orderid;?><br />
              <?php echo date('d-m-Y'); ?> <br />
            
              </th>
          </tr>
          <tr>
            <th>Sr.No. </th>
            <th style="width:100px;padding-left:5px;">Product Details</th>
            <th style="text-align:left;padding-left:5px; width:100px;">GST Amount</th>
            <th style="text-align:left;padding-left:5px; width:100px;">Rate</th>
           <th style="text-align:left;padding-left:5px; width:100px;">Qty</th>
           <th style="padding-left:5px; padding-right:5px;width:100px;">Sub Total</th>
          </tr>
          <?php $total_gst=0; $total_amount=0; $i=1; foreach($items as $row){ 
               $gst_amount = $row->product_price * ($row->gst_rate / 100); 
               
                $gst_amount=$gst_amount*$row->qty;
                $total_gst=$total_gst+$gst_amount;
                $subtotal=$row->product_price*$row->qty;
                $total_amount=$total_amount+$subtotal;
              ?>
          <tr style="border-bottom: none;border-bottom-color: white;">
            <td style="padding-left:5px; padding-right:5px;border-bottom: none;border-bottom-color: white;"><?php echo $i++; ?></td>
            <td style="padding-left:5px; padding-right:5px;width:261px;border-bottom: none;border-bottom-color: white;"><?php echo $row->product_name; ?></td>
            <td style="padding-left:5px; padding-right:5px;border-bottom: none;border-bottom-color: white;"> <?php echo number_format($gst_amount,2,".",","); ?> (<?php echo $row->gst_rate.'%' ?>)</td>
             <td style="padding-left:5px; padding-right:5px;border-bottom: none;border-bottom-color: white;"> <?php echo number_format($row->product_price,2,".",","); ?></td>
              <td style="padding-left:5px; padding-right:5px;border-bottom: none;border-bottom-color: white;"><?php echo $row->qty; ?> </td>
               <td style="padding-left:5px; padding-right:5px;border-bottom: none;border-bottom-color: white;"><?php echo number_format($subtotal,2,".",","); ?> </td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="4"  rowspan="3"  style="padding-left:5px; padding-right:5px;"><p style="color:#000; font-size:12px;text-align:justify;"></td>
            <th  style="padding-left:5px; padding-right:5px;">TOTAL Amount</th>
            <th colspan="" style="padding-left:5px; padding-right:5px;"><?php echo number_format($total_amount,2,".",",");?></th>
          </tr>
        <tr>
            <th  style="padding-left:5px;">Total GST</th>
            <th style="padding-left:5px; padding-right:5px;"><?php echo number_format($total_gst,2,".",","); ?></th>
          </tr>
        <tr>
           
            <th  style="padding-left:5px;">GRAND TOTAL</th>
            <th style="padding-left:5px; padding-right:5px;"><?php echo number_format($total_amount+$total_gst,2,".",","); ?></th>
          </tr>
          <tr>
            <?php if(count($terms)>=1){ ?>  
            <td colspan="6" style="padding-left:5px;"><strong style="font-size:15px;">TERM AND CONDITIONS:-</strong>
                <?php $i=1; foreach($terms as $row){ ?>
              <p style="font-weight:bold; font-size:12px;color:#000;margin: 0 0 1px;"> <?php echo $i++; ?>) <?php echo $row->details; ?></p>
                <?php } ?>
              </td>
            <?php } ?>  
          </tr>
         
      
          
		<tr><th style="padding-left:5px; padding-right:5px;text-align:center;"  colspan="6">THIS IS COMPUTER GENERATED INVOICE</th></tr>
        </table>
      </div>
    </div>  
</div>
</div>
<br />
<br />

               
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Sale Product List <a href="<?php echo site_url() ?>sales_master?add=new" class="btn btn-gradient-info btn-sm"> Add New <i class="fa fa-plus"></i></a>
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="sale_master_tables">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                         <th>Mobile No</th>
                        <th>Sale Date</th>
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
         
     