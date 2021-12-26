<?php
class Api_Controller  extends MY_Controller{
    public function __construct() {
    parent::__construct();
   }
public function customer_registration(){
   $username=trim($this->input->post('username'));
   $email=trim($this->input->post('email_id'));
   $password=trim($this->input->post('password'));
   $mobile_no=trim($this->input->post('mobile_no'));
   $store_name=trim($this->input->post('store_name'));
   $city=trim($this->input->post('city'));
   $state=trim($this->input->post('state'));
   $address=trim($this->input->post('address'));
   $pincode=trim($this->input->post('pincode'));
   
   $mobile_duplicate=$this->db->query("select username from Users where username='$username'")->result(); 
   $email_duplicate=$this->db->query("select mobile_no from Users where mobile_no='$mobile_no'")->result();
   $array=array();  
   if(empty($username)){
   $array=array('code'=>400,'message'=>'Please enter your username'); 
   }elseif(empty($email)){
   $array=array('code'=>400,'message'=>'Please enter your email address');     
   }elseif(empty($mobile_no)){
   $array=array('code'=>400,'message'=>'Please enter your mobile number');     
   }elseif(empty($password)){
   $array=array('code'=>400,'message'=>'Please enter your password');     
   }elseif(count($mobile_duplicate)>=1){
   $array=array('code'=>400,'message'=>'Your entered username already exist');   
   }elseif(count($email_duplicate)>=1){
   $array=array('code'=>400,'message'=>'Your entered mobile number already exist');   
   }else{
   $insert_array=array('username'=>$username,'mobile_no'=>$mobile_no,'password'=>md5($password),'store_name'=>$store_name,'status'=>'Active','created_date'=>date('Y-m-d H:i:s'),'state'=>$state,'city'=>$city,'address'=>$address,'email_id'=>$email,'user_type'=>'Customer','pincode'=>$pincode);
   $this->db->insert('Users',$insert_array);
   $ID=$this->db->insert_id();
   $otp = mt_rand(100000, 999999);
   $USERS_BALANCE=array('userid'=>$ID,'amount'=>'10000.00','created_date'=>date('Y-m-d H:i:s'),'status'=>'Paid','payment_id'=>$otp);
   $this->db->insert('Payment_Master',$USERS_BALANCE);
   $array=array('code'=>200,'message'=>'Customer Registration Successfully'); 
   $this->session->set_userdata('success','Customer Registration Successfully');
   }
   echo json_encode($array);
   exit;
  }
  public function Changed_Status_Customer(){
      $id=$this->input->post('id');
      $query=$this->db->query("select id,status from Users where id='$id'")->result();
      $status='';
      $array=array();
     if(count($query)>=1){
     if($query[0]->status=='Active'){
      $status='Inactive';   
      }elseif($query[0]->status=='Inactive') {
       $status='Active';     
      }
     $get=$this->db->query("update Users set status='$status' where id='$id'");
     if($get==true){
     $array=array('code'=>200,'message'=>'Customer Status Changed Successfully');   
     $this->session->set_userdata('success','Customer Status Changed Successfully');
     }else{
      $array=array('code'=>400,'message'=>'Some thing went wrong');       
     }
     }else{
    $array=array('code'=>400,'message'=>'Some thing went wrong');     
     }
   echo json_encode($array);
   exit;
  }
  
  public function customer_update_details(){
   $username=trim($this->input->post('username'));
   $email=trim($this->input->post('email_id'));
   $mobile_no=trim($this->input->post('mobile_no'));
   $store_name=trim($this->input->post('store_name'));
   $city=trim($this->input->post('city'));
   $state=trim($this->input->post('state'));
   $address=trim($this->input->post('address'));
   $id= base64_decode($this->input->post('id'));
   $pincode=trim($this->input->post('pincode'));
   
   $mobile_duplicate=$this->db->query("select username from Users where username='$username' and id<>'$id'")->result(); 
   $email_duplicate=$this->db->query("select mobile_no from Users where mobile_no='$mobile_no' and id<>'$id'")->result();
   $array=array();  
   if(empty($username)){
   $array=array('code'=>400,'message'=>'Please enter your username'); 
   }elseif(empty($email)){
   $array=array('code'=>400,'message'=>'Please enter your email address');     
   }elseif(empty($mobile_no)){
   $array=array('code'=>400,'message'=>'Please enter your mobile number');     
   }elseif(count($mobile_duplicate)>=1){
   $array=array('code'=>400,'message'=>'Your entered username already exist');   
   }elseif(count($email_duplicate)>=1){
   $array=array('code'=>400,'message'=>'Your entered mobile number already exist');   
   }else{
   $insert_array=array('username'=>$username,'mobile_no'=>$mobile_no,'store_name'=>$store_name,'pincode'=>$pincode,'state'=>$state,'city'=>$city,'address'=>$address,'email_id'=>$email,'user_type'=>'Customer');
   $this->db->where('id',$id);
   $this->db->update('Users',$insert_array);
   $ID=$this->db->insert_id();
   $array=array('code'=>200,'message'=>'Customer Information Updated Successfully'); 
   $this->session->set_userdata('success','Customer Information Updated Successfully');
   }
   echo json_encode($array);
   exit;
  }

  
  public function change_password_process(){
   $new_password=trim($this->input->post('new_password'));
   $ADMIN_ID=$this->session->userdata('ADMIN_ID');
   $array=array();  
   if(empty($new_password)){
   $array=array('code'=>400,'message'=>'Please enter new password'); 
   }else{
   $update=array('password'=> md5($new_password));
   $this->db->where('id',$ADMIN_ID);
 $get =$this->db->update('Users',$update);
  if($get==true){
   $array=array('code'=>200,'message'=>'Password Change Successfully'); 
   $this->session->set_userdata('success','Password Change Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
   }
   echo json_encode($array);
   exit;
  }
public function add_new_gst_masters(){
 $gst_master=trim($this->input->post('gst_master')); 
 $cust_id=$this->session->userdata('ADMIN_ID');
 $array=array();  
   if(empty($gst_master)){
   $array=array('code'=>400,'message'=>'Please gst percent'); 
   }else{
   $update=array('gst_master'=>$gst_master,'cust_id'=>$cust_id,'created_date'=>date('Y-m-d H:i:s'));
 $get =$this->db->insert('Gst_Master',$update);
  if($get==true){
   $array=array('code'=>200,'message'=>'GST Percent Added Successfully'); 
   $this->session->set_userdata('success','GST Percent Added Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
   }
   echo json_encode($array);
   exit;
}
public function  update_new_gst_masters(){
 $gst_master=trim($this->input->post('gst_master')); 
 $id=trim($this->input->post('id')); 
 $array=array();  
   if(empty($gst_master)){
   $array=array('code'=>400,'message'=>'Please gst percent'); 
   }else{
   $update=array('gst_master'=>$gst_master);
       $this->db->where('id',$id);
 $get =$this->db->update('Gst_Master',$update);
  if($get==true){
   $array=array('code'=>200,'message'=>'GST Percent Updated Successfully'); 
   $this->session->set_userdata('success','GST Percent Updated Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
   }
   echo json_encode($array);
   exit;
}
public function delete_gst_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from Gst_Master where id='$id' and cust_id='$cust_id'");
  if($get==true){
   $array=array('code'=>200,'message'=>'Record Deleted Successfully'); 
   $this->session->set_userdata('success','Record Deleted Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
public function add_new_product_masters(){
 $product_name=trim($this->input->post('product_name'));
 $price=trim($this->input->post('price'));
 $gst_rate=trim($this->input->post('gst_rate'));
  $cust_id=$this->session->userdata('ADMIN_ID');
   $get=$this->db->query("select *from Product_Master where product_name='$product_name' and userid='$cust_id'")->result();
   if(empty($product_name)){
   $array=array('code'=>400,'message'=>'Please enter the product name'); 
   }elseif(empty($price)){
   $array=array('code'=>400,'message'=>'Please enter product price');      
   }elseif(empty($gst_rate) && $gst_rate!=0){
   $array=array('code'=>400,'message'=>'Please select gst rate');     
   }elseif(count($get)>=1){
   $array=array('code'=>400,'message'=>'This Product already added on your product list');    
   }else{
    $insert_array=array('userid'=>$cust_id,'product_name'=>$product_name,'price'=>$price,'gst_rate'=>$gst_rate,'created_date'=>date('Y-m-d H:i:s'),'status'=>'Active');
   $g=$this->db->insert('Product_Master',$insert_array); 
   if($g==true){
     $array=array('code'=>200,'message'=>'Product added Successfully'); 
    $this->session->set_userdata('success','Product added Successfully');   
    }else{
    $array=array('code'=>400,'message'=>'some thing went wrong');     
    } 
   }
  echo json_encode($array);
  exit;    
 } 
 public function Product_Status_Changed(){
   $id=$this->input->post('id');
      $query=$this->db->query("select id,status from Product_Master where id='$id'")->result();
      $status='';
      $array=array();
     if(count($query)>=1){
     if($query[0]->status=='Active'){
      $status='Deactive';   
      }elseif($query[0]->status=='Deactive') {
       $status='Active';     
      }
     $get=$this->db->query("update Product_Master set status='$status' where id='$id'");
     if($get==true){
     $array=array('code'=>200,'message'=>'Product Status Changed Successfully');   
     $this->session->set_userdata('success','Product Status Changed Successfully');
     }else{
      $array=array('code'=>400,'message'=>'Some thing went wrong');       
     }
     }else{
    $array=array('code'=>400,'message'=>'Some thing went wrong');     
     }
   echo json_encode($array);
   exit;   
 }
 public function update_new_product_masters(){
 $product_name=trim($this->input->post('product_name'));
 $price=trim($this->input->post('price'));
 $gst_rate=trim($this->input->post('gst_rate'));
 $id=$this->input->post('id');
  $cust_id=$this->session->userdata('ADMIN_ID');
   $get=$this->db->query("select *from Product_Master where product_name='$product_name' and userid='$cust_id' and id<>'$id'")->result();
   if(empty($product_name)){
   $array=array('code'=>400,'message'=>'Please enter the product name'); 
   }elseif(empty($price)){
   $array=array('code'=>400,'message'=>'Please enter product price');      
   }elseif(empty($gst_rate) && $gst_rate!=0){
   $array=array('code'=>400,'message'=>'Please select gst rate');     
   }elseif(count($get)>=1){
   $array=array('code'=>400,'message'=>'This Product already added on your product list');    
   }else{
    $insert_array=array('userid'=>$cust_id,'product_name'=>$product_name,'price'=>$price,'gst_rate'=>$gst_rate);
      $where="id='".$id."' and userid='".$cust_id."'";
      $this->db->where($where);   
   $g=$this->db->update('Product_Master',$insert_array); 
   if($g==true){
     $array=array('code'=>200,'message'=>'Product Updated Successfully'); 
    $this->session->set_userdata('success','Product Updated Successfully');   
    }else{
    $array=array('code'=>400,'message'=>'some thing went wrong');     
    } 
   }
  echo json_encode($array);
  exit;    
 }
 public function add_new_purchase_prod_items(){
  $product_name=trim($this->input->post('product_name'));
  $product_price=trim($this->input->post('product_price')); 
  $gst_rate=trim($this->input->post('gst_rate')); 
  $qty=trim($this->input->post('qty')); 
   $cust_id=$this->session->userdata('ADMIN_ID'); 
  $dupl_prod=$this->db->query("select *from Product_Master where product_name='$product_name' and userid='$cust_id'")->result();
   $dupl_temp=$this->db->query("select *from Purchase_Item_Temp where product_name='$product_name' and userid='$cust_id'")->result();
   if(empty($product_name)){
   $array=array('code'=>400,'message'=>'Please enter the product name'); 
   }elseif(empty($product_price)){
   $array=array('code'=>400,'message'=>'Please enter product price');  
   }elseif(empty($gst_rate) && $gst_rate!=0){
   $array=array('code'=>400,'message'=>'Please select gst rate');  
   }elseif(count($dupl_temp)>=1){
   $array=array('code'=>400,'message'=>'This item already added on your list');
   }else{
     if($gst_rate!=0){  
     $gst_amount = $product_price * ($gst_rate / 100); 
     }else{
     $gst_rate=0;
     }
     $insert_array=array('userid'=>$cust_id,'product_name'=>$product_name,'product_price'=>$product_price,'gst_rate'=>$gst_rate,'userid'=>$cust_id,'qty'=>$qty);
    $g=$this->db->insert('Purchase_Item_Temp',$insert_array);
   if($g==true){ 
    $data['data']=$this->db->query("select *from Purchase_Item_Temp where userid='$cust_id'")->result();
    $data=$this->load->view('admin/site/get_ajax_purchase', $data, TRUE);
    $array=array('code'=>200,'message'=>'msg','datas'=>$data);
    }else{
    $array=array('code'=>400,'message'=>'some thing went wrong');   
    
    }
   }
   echo json_encode($array);
 }
public function delete_purchase_temp_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from Purchase_Item_Temp where id='$id' and userid='$cust_id'");
  if($get==true){
    $data['data']=$this->db->query("select *from Purchase_Item_Temp where userid='$cust_id'")->result();
    $data=$this->load->view('admin/site/get_ajax_purchase', $data, TRUE);
    $array=array('code'=>200,'message'=>'msg','datas'=>$data);
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
public function Puchase_product_vendors(){
    $vendor_name=trim($this->input->post('vendor_name'));
    $mobile_no=trim($this->input->post('mobile_no'));
    $cust_id=$this->session->userdata('ADMIN_ID');
    $orderid= $cust_id.time();
    if(empty($vendor_name)){
   $array=array('code'=>400,'message'=>'Please enter the vendor name'); 
   }elseif(empty($mobile_no)){
     $array=array('code'=>400,'message'=>'Please enter the mobile name');     
   }else{ 
    $data=$this->db->query("select *from Purchase_Item_Temp where userid='$cust_id'")->result();
    $insert_array=array('userid'=>$cust_id,'orderid'=>$orderid,'vendor_name'=>$vendor_name,'mobile_no'=>$mobile_no,'created_date'=>date('Y-m-d H:i:s'));
    $g=$this->db->insert('Purchase_Master',$insert_array);
    $pid=$this->db->insert_id();
    foreach($data as $row){
    $insert_array=array('userid'=>$cust_id,'dates'=>date('Y-m-d'),'qty'=>$row->qty,'product_name'=>$row->product_name,'product_price'=>$row->product_price,'gst_rate'=>$row->gst_rate,'pid'=>$pid);
    $g=$this->db->insert('Purchase_Item',$insert_array);
    $added_store=$this->db->query("select *from Product_Master where product_name='".$row->product_name."' and userid='$cust_id'")->result();
    if(count($added_store)==0){
     $insert_array=array('userid'=>$cust_id,'product_name'=>$row->product_name,'price'=>$row->product_price,'gst_rate'=>$row->gst_rate,'created_date'=>date('Y-m-d'),'status'=>'Active');
     $g=$this->db->insert('Product_Master',$insert_array);    
     }
    }
    $qu=$this->db->query("delete from Purchase_Item_Temp where userid='$cust_id'");
   if($qu==true){
      $array=array('code'=>200,'message'=>'Product purchase successfully','pid'=>base64_encode($pid)); 
    //  $this->session->set_userdata('success','Product purchase successfully');     
    }else{
     $array=array('code'=>400,'message'=>'some thing went wrong');   
    } 
   }
   echo json_encode($array);
   exit;   
 }
public function inert_new_terms_condition(){
  $details=$this->input->post('details');  
   $cust_id=$this->session->userdata('ADMIN_ID');
  if(empty($details)){
   $array=array('code'=>400,'message'=>'Please enter invoice terms'); 
   }else{
      $insert_array=array('userid'=>$cust_id,'details'=>$details,'CREATED_DATE'=>date('Y-m-d'));
     $g=$this->db->insert('tbl_terms_condition',$insert_array);  
     if($g==true){
      $array=array('code'=>200,'message'=>'Terms Condtion added success'); 
      $this->session->set_userdata('success','Terms and condition added successfully');     
    }else{
     $array=array('code'=>400,'message'=>'some thing went wrong');   
    } 
   }
   echo json_encode($array);
   exit;   
 }
public function delete_invoice_tables(){
     $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from tbl_terms_condition where id='$id' and userid='$cust_id'");
  if($get==true){
    $array=array('code'=>200,'message'=>'msg');
      $this->session->set_userdata('success','Terms and condition deleted successfully');  
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
 echo json_encode($array);
   exit;    
 } 
public function autosearch_product(){
 $searchTerm = $_GET['term'];
    $query = $this->db->query("SELECT * FROM Product_Master WHERE product_name LIKE '%".$searchTerm."%' GROUP BY product_name ORDER BY product_name ASC")->result();
    $array = array();
    foreach ($query as $row) {
        $array[] = array (
            'id' => $row->id,
            'value' => $row->product_name,
           'price' => $row->price, 
        );
    }
    echo json_encode($array);   
 }


// Sales Product Action

 public function add_new_sale_prod_items(){
  $product_name=trim($this->input->post('product_name'));
  $product_price=trim($this->input->post('product_price')); 
  $gst_rate=trim($this->input->post('gst_rate')); 
  $qty=trim($this->input->post('qty')); 
   $cust_id=$this->session->userdata('ADMIN_ID'); 
 // $dupl_prod=$this->db->query("select *from Sale_Master where product_name='$product_name' and userid='$cust_id'")->result();
   $dupl_temp=$this->db->query("select *from sale_Item_Temp where product_name='$product_name' and userid='$cust_id'")->result();
   if(empty($product_name)){
   $array=array('code'=>400,'message'=>'Please enter the product name'); 
   }elseif(empty($product_price)){
   $array=array('code'=>400,'message'=>'Please enter product price');  
   }elseif(empty($gst_rate) && $gst_rate!=0){
   $array=array('code'=>400,'message'=>'Please select gst rate');  
   }elseif(count($dupl_temp)>=1){
   $array=array('code'=>400,'message'=>'This item already added on your list');
   }else{
     if($gst_rate!=0){  
     $gst_amount = $product_price * ($gst_rate / 100); 
     }else{
     $gst_rate=0;
     }
     $insert_array=array('userid'=>$cust_id,'product_name'=>$product_name,'product_price'=>$product_price,'gst_rate'=>$gst_rate,'userid'=>$cust_id,'qty'=>$qty);
    $g=$this->db->insert('sale_Item_Temp',$insert_array);
   if($g==true){ 
    $data['data']=$this->db->query("select *from sale_Item_Temp where userid='$cust_id'")->result();
    $data=$this->load->view('admin/site/get_ajax_sale', $data, TRUE);
    $array=array('code'=>200,'message'=>'msg','datas'=>$data);
    }else{
    $array=array('code'=>400,'message'=>'some thing went wrong');   
    
    }
   }
   echo json_encode($array);
 }
public function delete_sale_temp_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from sale_Item_Temp where id='$id' and userid='$cust_id'");
  if($get==true){
    $data['data']=$this->db->query("select *from sale_Item_Temp where userid='$cust_id'")->result();
    $data=$this->load->view('admin/site/get_ajax_purchase', $data, TRUE);
    $array=array('code'=>200,'message'=>'msg','datas'=>$data);
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
public function sale_product_vendors(){
    $vendor_name=trim($this->input->post('vendor_name'));
    $mobile_no=trim($this->input->post('mobile_no'));
    $cust_id=$this->session->userdata('ADMIN_ID');
    $orderid= $cust_id.time();
    if(empty($vendor_name)){
   $array=array('code'=>400,'message'=>'Please enter the vendor name'); 
   }elseif(empty($mobile_no)){
     $array=array('code'=>400,'message'=>'Please enter the mobile name');     
   }else{ 
    $data=$this->db->query("select *from sale_Item_Temp where userid='$cust_id'")->result();
    $insert_array=array('userid'=>$cust_id,'orderid'=>$orderid,'vendor_name'=>$vendor_name,'mobile_no'=>$mobile_no,'created_date'=>date('Y-m-d H:i:s'));
    $g=$this->db->insert('Sale_Master',$insert_array);
    $pid=$this->db->insert_id();
    foreach($data as $row){
    $insert_array=array('userid'=>$cust_id,'dates'=>date('Y-m-d'),'qty'=>$row->qty,'product_name'=>$row->product_name,'product_price'=>$row->product_price,'gst_rate'=>$row->gst_rate,'pid'=>$pid);
    $g=$this->db->insert('sales_Item',$insert_array);
    }
    $qu=$this->db->query("delete from sale_Item_Temp where userid='$cust_id'");
   if($qu==true){
      $array=array('code'=>200,'message'=>'Product Sales successfully','pid'=>base64_encode($pid)); 
    //  $this->session->set_userdata('success','Product purchase successfully');     
    }else{
     $array=array('code'=>400,'message'=>'some thing went wrong');   
    } 
   }
   echo json_encode($array);
   exit;   
 }
 public function delete_sales_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from Sale_Master where id='$id' and userid='$cust_id'");
  $this->db->query("delete from sales_Item where pid='$id' and userid='$cust_id'");
  if($get==true){
   $array=array('code'=>200,'message'=>'Record Deleted Successfully'); 
   $this->session->set_userdata('success','Record Deleted Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
 public function delete_purchases_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from Purchase_Master where id='$id' and userid='$cust_id'");
  $this->db->query("delete from Purchase_Item where pid='$id' and userid='$cust_id'");
  if($get==true){
   $array=array('code'=>200,'message'=>'Record Deleted Successfully'); 
   $this->session->set_userdata('success','Record Deleted Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
 
  public function delete_productss_master(){
 $id=trim($this->input->post('id'));    
  $cust_id=$this->session->userdata('ADMIN_ID');
  $get=$this->db->query("delete from Product_Master where id='$id' and userid='$cust_id'");
  if($get==true){
   $array=array('code'=>200,'message'=>'Record Deleted Successfully'); 
   $this->session->set_userdata('success','Record Deleted Successfully');
  }else{
   $array=array('code'=>400,'message'=>'some thing went wrong');     
    }
  echo json_encode($array);
   exit;  
 }
 }
?>