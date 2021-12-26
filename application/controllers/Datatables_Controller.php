<?php
class Datatables_Controller  extends MY_Controller{
    public function __construct() {
    parent::__construct();
   }
   public function customer_list_data_get(){   
        $list = $this->Datatables_Model->get_datatables_customer();
        $data = array();
        $no = $_POST['start'];
		$status='';
		
        foreach ($list as $rows) {
            $status='';
            if($rows->status=='Active'){
            $status='<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" onclick="update_status_customer('.$rows->id.')"><i class="mdi mdi-check-circle"></i> Active</a>';
            }else{
            $status='<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="update_status_customer('.$rows->id.')"><i class="mdi mdi-window-close"></i> Inactive</a>';    
            }
            $edit='<a class="btn btn-gradient-primary btn-rounded btn-fw btn-sm" href="'. site_url().'Customer-List?update='.base64_encode($rows->id).'"><i class="mdi mdi-grease-pencil"></i> Edit</a>';  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->username;
            $row[] = $rows->mobile_no;
            $row[] = $rows->store_name;
            $row[] = $rows->address.', '.$rows->city.', '.$rows->state. ' -'.$rows->pincode;;
            $row[] = date('d-m-Y',strtotime($rows->created_date));
            $row[] = $status.'&nbsp;'.$edit;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_customer(),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_customer(),"data" => $data,);
        //output to json format
        echo json_encode($output);
    } 
    
    public function gst_master_get_list(){   
        $cust_id=$this->session->userdata('ADMIN_ID');
        $list = $this->Datatables_Model->get_datatables_gst($cust_id);
        $data = array();
        $no = $_POST['start'];
		$status='';
		
        foreach ($list as $rows) {
            $del='<a  class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="delete_gst_master_tables('.$rows->id.')"><i class="fa fa-trash"></i> Delete</a>';
            $edit='<a class="btn btn-gradient-primary btn-rounded btn-fw btn-sm" href="'. site_url().'GST-Master?update='.base64_encode($rows->id).'"><i class="mdi mdi-grease-pencil"></i> Edit</a>';  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->gst_master.'%';
            $row[] = date('d-m-Y',strtotime($rows->created_date));
            $row[] = $del.'&nbsp;'.$edit;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_gst($cust_id),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_gst($cust_id),"data" => $data,);
        //output to json format
        echo json_encode($output);
    } 
    
    
    public function product_master_list(){   
        $cust_id=$this->session->userdata('ADMIN_ID');
        $list = $this->Datatables_Model->get_datatables_product($cust_id);
        $data = array();
        $no = $_POST['start'];
		$status='';
		
        foreach ($list as $rows) {
            if($rows->status=='Active'){
            $status='<a  class="btn btn-gradient-success btn-rounded btn-fw btn-sm" href="#" onclick="update_status_product('.$rows->id.')"><i class="mdi mdi-check-circle"></i> Active</a>';
            }else{
            $status='<a class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="update_status_product('.$rows->id.')"><i class="mdi mdi-window-close"></i> Deactive</a>';    
            } 
            $del='<a  class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="delete_productss_master('.$rows->id.')"><i class="fa fa-trash"></i> Delete</a>';
            $edit='<a class="btn btn-gradient-primary btn-rounded btn-fw btn-sm" href="'. site_url().'product_master?update='.base64_encode($rows->id).'"><i class="mdi mdi-grease-pencil"></i> Edit</a>';  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->product_name;
            $row[] = '<i class="fa fa-inr"></i> '.$rows->price;
            $row[] = $rows->gst_rate.'%';
            $row[] = date('d-m-Y',strtotime($rows->created_date));
            $row[]=$status;
            $row[] = $del.'&nbsp;'.$edit;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_product($cust_id),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_product($cust_id),"data" => $data,);
        //output to json format
        echo json_encode($output);
    } 
    
    
    public function purchase_master_list(){   
        $cust_id=$this->session->userdata('ADMIN_ID');
        $list = $this->Datatables_Model->get_datatables_purchase($cust_id);
        $data = array();
        $no = $_POST['start'];
		$status='';
		
        foreach ($list as $rows) {
            $del='<a  class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="delete_purchases_masters('.$rows->id.')"><i class="fa fa-trash"></i> Delete</a>';
            $edit='<a class="btn btn-gradient-primary btn-rounded btn-fw btn-sm" href="'. site_url().'purchase_master?pid='.base64_encode($rows->id).'"><i class="fa fa-eye"></i> View</a>';  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->orderid;
            $row[] = $rows->vendor_name;
            $row[] = $rows->mobile_no;
            $row[] = date('d-m-Y',strtotime($rows->created_date));
            $row[] = $del.'&nbsp;'.$edit;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_purchase($cust_id),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_purchase($cust_id),"data" => $data,);
        //output to json format
        echo json_encode($output);
    } 
 public function inovice_terms_list(){
   $cust_id=$this->session->userdata('ADMIN_ID');
        $list = $this->Datatables_Model->get_datatables_in($cust_id);
        $data = array(); $no = $_POST['start'];
	foreach ($list as $rows) {
            $del='<a  class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="delete_invoice_tables('.$rows->id.')"><i class="fa fa-trash"></i> Delete</a>'; 
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->details;
            $row[] = date('d-m-Y',strtotime($rows->CREATED_DATE));
            $row[] = $del;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_in($cust_id),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_in($cust_id),"data" => $data,);
        //output to json format
        echo json_encode($output);   
 }
  public function sale_master_list(){   
        $cust_id=$this->session->userdata('ADMIN_ID');
        $list = $this->Datatables_Model->get_datatables_sale($cust_id);
        $data = array();
        $no = $_POST['start'];
		$status='';
		
        foreach ($list as $rows) {
            $del='<a  class="btn btn-gradient-danger btn-rounded btn-fw btn-sm" href="#" onclick="delete_sale_product('.$rows->id.')"><i class="fa fa-trash"></i> Delete</a>';
            $edit='<a class="btn btn-gradient-primary btn-rounded btn-fw btn-sm" href="'. site_url().'purchase_master?pid='.base64_encode($rows->id).'"><i class="fa fa-eye"></i> View</a>';  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->orderid;
            $row[] = $rows->vendor_name;
            $row[] = $rows->mobile_no;
            $row[] = date('d-m-Y',strtotime($rows->created_date));
            $row[] = $del.'&nbsp;'.$edit;
            $data[] = $row;
        }
  $output = array("draw" => $_POST['draw'],"recordsTotal" => $this->Datatables_Model->count_all_sale($cust_id),
  "recordsFiltered" => $this->Datatables_Model->count_filtered_sale($cust_id),"data" => $data,);
        //output to json format
        echo json_encode($output);
    }  
}
?>