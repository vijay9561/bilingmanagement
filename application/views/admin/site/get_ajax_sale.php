<?php if(count($data)>=1){ ?>  
<div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> Product Details
            </div>
              <div class="card-body"> 
<table class="table table-bordered" id="product_tables">
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
                          <?php $i=1; foreach($data as $row){ ?>
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