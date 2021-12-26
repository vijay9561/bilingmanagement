<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Billing Management</title>
  <!-- plugins:css -->
   <link href="<?php echo base_url(); ?>support_assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>support_assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>support_assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>support_assets/css/style.css">
  <link href="<?php echo base_url(); ?>support_assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>support_assets/css/dataTables.bootstrap.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>support_assets/images/favicon.png" />
</head>
<script>
var BASE_URL='<?php echo site_url(); ?>';
<?php 
if($title!='Purchase Master'){
 if($this->session->userdata('ADMIN_ID')){   
 $userid=$this->session->userdata('ADMIN_ID'); 
 $this->db->query("delete from Purchase_Item_Temp where userid='$userid'");
  $userid=$this->session->userdata('ADMIN_ID'); 
 $this->db->query("delete from sale_Item_Temp where userid='$userid'");
  }
 }
?>
</script>