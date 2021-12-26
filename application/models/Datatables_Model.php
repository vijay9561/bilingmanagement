<?php 
 class Datatables_Model extends CI_Model {
    var $table_customer = 'Users u';
    var $column_order_customer = array(null,'u.id','u.username','u.email_id','s.state','c.city','u.address','u.store_name','u.mobile_no','u.created_date','u.status','u.user_type','u.pincode'); 
    var $column_search_customer = array('u.id','u.username','u.email_id','s.state','c.city','u.address','u.store_name','u.mobile_no','u.created_date','u.status','u.user_type','u.pincode');  
    var $order_customer = array('u.id' => 'desc');
    
    var $table_gst = 'Gst_Master';
    var $column_order_gst = array(null,'gst_master','cust_id','created_date','id'); 
    var $column_search_gst = array('gst_master','cust_id','created_date','id');  
    var $order_gst = array('id' => 'desc');
    
    var $table_product = 'Product_Master';
    var $column_order_product = array(null,'userid','product_name','price','gst_rate','created_date','status','id'); 
    var $column_search_product = array('userid','product_name','price','gst_rate','created_date','status','id');  
    var $order_product = array('id' => 'desc');
    
    var $table_purchase = 'Purchase_Master';
    var $column_order_purchase = array(null,'userid','vendor_name','mobile_no','orderid','created_date','id'); 
    var $column_search_purchase = array('userid','vendor_name','mobile_no','orderid','created_date','id');  
    var $order_purchase = array('id' => 'desc');
    
    var $table_in = 'tbl_terms_condition';
    var $column_order_in = array(null,'userid','details','id','CREATED_DATE'); 
    var $column_search_in = array('userid','details','id','CREATED_DATE');  
    var $order_in = array('id' => 'desc');
    
    var $table_sale = 'Sale_Master';
    var $column_order_sale = array(null,'userid','vendor_name','mobile_no','orderid','created_date','id'); 
    var $column_search_sale = array('userid','vendor_name','mobile_no','orderid','created_date','id');  
    var $order_sale = array('id' => 'desc');
    
   
   	public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }
    // Sale List
         private function geting_datatables_query_sale($id){
        $this->db->select($this->column_order_sale);	
        $this->db->from($this->table_sale);
        $this->db->where('userid',$id);
        $i = 0;
        foreach ($this->column_search_sale as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_sale) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_in[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_sale)){
            $order = $this->order_sale;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_sale($id) {
        $this->geting_datatables_query_sale($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_sale($id){
        $this->geting_datatables_query_sale($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_sale($id){
        $this->db->from($this->table_sale);
        $this->db->where('userid',$id);
        return $this->db->count_all_results();
    }
        // inovice List
           private function geting_datatables_query_in($id){
        $this->db->select($this->column_order_in);	
        $this->db->from($this->table_in);
        $this->db->where('userid',$id);
        $i = 0;
        foreach ($this->column_search_in as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_in) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_in[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_in)){
            $order = $this->order_in;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_in($id) {
        $this->geting_datatables_query_in($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_in($id){
        $this->geting_datatables_query_in($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_in($id){
        $this->db->from($this->table_in);
        $this->db->where('userid',$id);
        return $this->db->count_all_results();
    } 
    // Purchase List
           private function geting_datatables_query_purchase($id){
        $this->db->select($this->column_order_purchase);	
        $this->db->from($this->table_purchase);
        $this->db->where('userid',$id);
        $i = 0;
        foreach ($this->column_search_purchase as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_purchase) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_purchase[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_purchase)){
            $order = $this->order_purchase;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_purchase($id) {
        $this->geting_datatables_query_purchase($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_purchase($id){
        $this->geting_datatables_query_purchase($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_purchase($id){
        $this->db->from($this->table_purchase);
        $this->db->where('userid',$id);
        return $this->db->count_all_results();
    } 
    // Product List
       private function geting_datatables_query_product($id){
        $this->db->select($this->column_order_product);	
        $this->db->from($this->table_product);
        $this->db->where('userid',$id);
        $i = 0;
        foreach ($this->column_search_product as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_product) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_product[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_product)){
            $order = $this->order_product;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_product($id) {
        $this->geting_datatables_query_product($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_product($id){
        $this->geting_datatables_query_product($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_product($id){
        $this->db->from($this->table_product);
        $this->db->where('userid',$id);
        return $this->db->count_all_results();
    }  
   //   Get List details
    
    private function geting_datatables_query_gst($id){
        $this->db->select($this->column_order_gst);	
        $this->db->from($this->table_gst);
        $this->db->where('cust_id',$id);
        $i = 0;
        foreach ($this->column_search_gst as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_gst) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_gst[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_gst)){
            $order = $this->order_gst;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_gst($id) {
        $this->geting_datatables_query_gst($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_gst($id){
        $this->geting_datatables_query_gst($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_gst($id){
        $this->db->from($this->table_gst);
        $this->db->where('cust_id',$id);
        return $this->db->count_all_results();
    } 
    
 // Withdraw  History
private function geting_datatables_query_customer()
         {
        $this->db->select($this->column_order_customer);	
        $this->db->from($this->table_customer);
        $this->db->join('tb_state s','s.state_id=u.state','inner');
        $this->db->join('tb_city c','c.city_id=u.city','inner');
        $this->db->where('u.user_type','Customer');
       
        $i = 0;
        foreach ($this->column_search_customer as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {   
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_customer) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_customer[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_customer)){
            $order = $this->order_customer;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
    function get_datatables_customer() {
        $this->geting_datatables_query_customer();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_customer(){
        $this->geting_datatables_query_customer();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_customer(){
        $this->db->from($this->table_customer);
        $this->db->join('tb_state s','s.state_id=u.state','inner');
        $this->db->join('tb_city c','c.city_id=u.city','inner');
        $this->db->where('u.user_type','Customer');
        return $this->db->count_all_results();
    } 
  }