<?php 
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
error_reporting(0);
class SupportController extends MY_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('Support_Model');
		$this->load->model("GenericModel");
    }
        public function index(){
       $data['template']='index';
       $data['title'] ='Home';
       $data['page']='Home';
       $date=date('Y-m-d');
       $month=date('m');
       $year=date('Y');
       $total_sale_amt='';
       $total_purchase_amt='';
       $userid=$this->session->userdata('ADMIN_ID');
       $daily_sale_count=$this->db->query("select *from sales_Item  where date(dates)='".$date."' and userid='$userid'")->result();
       $daily_purchase_count=$this->db->query("select *from Purchase_Item where date(dates)='".$date."' and userid='$userid'")->result();  
       $monthly_sale_count=$this->db->query("select *from sales_Item  where MONTH(dates)='".$month."' and YEAR(dates)='".$year."' and userid='$userid'")->result();
       $monthly_purchase_count=$this->db->query("select *from Purchase_Item where MONTH(dates)='".$month."' and YEAR(dates)='".$year."' and userid='$userid'")->result(); 
       $total_store_prod=$this->db->query("select *from Product_Master where  userid='$userid'")->result(); 
       $total_sale_amt_monthly='';
       $total_purchase_amt_monthly='';
       
       foreach($daily_sale_count as $row){
            $gst_amount = $row->product_price * ($row->gst_rate / 100); 
                $gst_amount=$gst_amount*$row->qty;
                $subtotal=$row->product_price*$row->qty;
                $total_sale_amt=$total_sale_amt+$subtotal+$gst_amount;    
       }
      foreach($daily_purchase_count as $row){
            $gst_amount = $row->product_price * ($row->gst_rate / 100); 
                $gst_amount=$gst_amount*$row->qty;
                $subtotal=$row->product_price*$row->qty;
                $total_purchase_amt=$total_purchase_amt+$subtotal+$gst_amount;    
       } 
     
          foreach($monthly_sale_count as $row){
            $gst_amount = $row->product_price * ($row->gst_rate / 100); 
                $gst_amount=$gst_amount*$row->qty;
                $subtotal=$row->product_price*$row->qty;
                $total_sale_amt_monthly=$total_sale_amt_monthly+$subtotal+$gst_amount;    
       }
      foreach($monthly_purchase_count as $row){
            $gst_amount = $row->product_price * ($row->gst_rate / 100); 
                $gst_amount=$gst_amount*$row->qty;
                $subtotal=$row->product_price*$row->qty;
                $total_purchase_amt_monthly=$total_purchase_amt_monthly+$subtotal+$gst_amount;    
       }  
       
       $data['total_purchase_amt']=$total_purchase_amt; 
       $data['daily_sale_amt']=$total_sale_amt;
       $data['daily_sale_count']=$daily_sale_count;
       $data['daily_purchase_count']=$daily_purchase_count;
       $data['monthly_sale_count']=$monthly_sale_count;
       $data['monthly_purchase_count']=$monthly_purchase_count;
       $data['monthly_sale_amount']=$total_sale_amt_monthly;
       $data['monthly_purchase_amount']=$total_purchase_amt_monthly;
       $data['total_store_prod']=$total_store_prod;
       $this->layout_admin($data);
         }
   public function login_admin(){
      $this->load->view('admin/site/login');  
    }
public function support_login(){
$username=trim($this->input->post('username'));
$password=trim($this->input->post('password'));
$password=md5($password);
$query=$this->db->query("select *from Users where (username='$username' or mobile_no='$username') and password='$password' and status='Active'")->result();
$array=array();
if(count($query)>=1){
 
 $session_data['ADMIN_ID']=$query[0]->id;
 $session_data['USERNAME']=$query[0]->username;
 $session_data['MOBILE']=$query[0]->mobile_no;
 $session_data['EMAIL']=$query[0]->email_id;
 $session_data['USERTYPE']=$query[0]->user_type;
 $this->session->set_userdata($session_data);
 $array=array('code'=>200,'message'=>'Redirecting Login Successfull...');   
 }else{
 $array=array('code'=>400,'message'=>'Username,Mobile No or Password Incorrect');    
 }
 echo json_encode($array);
 //exit;
}
public function login_support_process(){
  echo $this->Support_Model->login_support_process($_POST);
  }
public function support_user_logout(){
  session_destroy();
  redirect('admin-login');
 }
 public function getcities_address(){
     $state=$this->input->post('state');
   $tb_city=$this->db->query("select *from tb_city where state_id='$state'")->result();
   $data='';
   
   $data=' <div class="form-group">
     <label>Select City </label>
   <select type="text" class="form-control" name="city" id="city" onchange="cityr()">
    <option value=""> Select location</option>';
    if(count($tb_city)>=1){
foreach($tb_city as $row1)
{
 $data.='<option value="'.$row1->city_id.'">'.$row1->city.'</option>';
}  $data.='<option value="other" >Other</option>';
   }else{
    $data.='<option value="" >Not Found City</option>';
   }
   $data.='</select></div>';
   echo $data; 
  } 
 public function customer_registration(){
   		$data['template']='register';
		$data['title'] ='Register';
		$data['page']='Register';
                $date=date('Y-m-d');
	        $this->layout_admin($data);
  }
  public function Customer_List_Details(){
   		$data['template']='customer_list';
		$data['title'] ='Customer List';
		$data['page']='Customer List';
                $date=date('Y-m-d');
	        $this->layout_admin($data);
  }
        public function change_password(){
        $data['template']='change_password';
        $data['title'] ='Change Password';
        $data['page']='Change Password';
        $this->layout_admin($data);
        }
   public function gst_master(){
        $data['template']='gst_master';
        $data['title'] ='GST Master';
        $data['page']='GST Master';
        $this->layout_admin($data);
        }
        
    public function product_master(){
        $data['template']='product';
        $data['title'] ='Product Master';
        $data['Rates']=$this->db->query("select *from Gst_Master")->result();
        $data['page']='Product Master';
        $this->layout_admin($data);
        }       
        
 public function purchase_master(){
        $data['template']='purchase';
        $data['title'] ='Purchase Master';
        $data['Rates']=$this->db->query("select *from Gst_Master")->result();
        $cust_id=$this->session->userdata('ADMIN_ID');  
       $data['datas']=$this->db->query("select *from Purchase_Item_Temp where userid='$cust_id'")->result();
        $data['page']='Purchase Master';
        $this->layout_admin($data);
        } 
  public function inovice_terms(){
        $data['template']='invoice_terms';
        $data['title'] ='Invoice Terms';
        $data['page']='Invoice Terms';
        $this->layout_admin($data);
        }   
  public function sales_master(){
        $data['template']='sales';
        $data['title'] ='Sale Product';
        $data['Rates']=$this->db->query("select *from Gst_Master")->result();
        $data['datas']=$this->db->query("select *from sale_Item_Temp where userid='$cust_id'")->result(); 
        $data['page']='Sale Product';
        $this->layout_admin($data);
        }        
        
}
?>