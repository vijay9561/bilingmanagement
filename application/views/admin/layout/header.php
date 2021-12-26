 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <?php
           $current=$this->db->query("select *from Users where id='".$this->session->userdata('ADMIN_ID')."'")->row();
          ?>
         <?php if($this->session->userdata('USERTYPE')=='Admin'){ ?> 
          <a class="navbar-brand brand-logo" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>support_assets/images/vjm_logos.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>support_assets/images/vjm_logos.png" alt="logo"/></a>
         <?php }else{ ?>
         
         <?php } ?>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
                <h3 style="color:#fff;font-weight:bold;"><?php echo strtoupper($current->store_name); ?></h3>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?php echo base_url(); ?>support_assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $this->session->userdata('USERNAME'); ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url(); ?>Logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
          <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url(); ?>change_password">
                <i class="fa fa-pencil mr-2 text-primary"></i>
                Change Password
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="<?php echo site_url(); ?>Logout">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

 <div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo base_url(); ?>support_assets/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('USERNAME'); ?></span>
               <!-- <span class="text-secondary text-small">Project Manager</span>-->
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Home'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <?php if($this->session->userdata('USERTYPE')=='Admin'){ ?>
          <li class="nav-item <?php if($title=='Register' || $title=='Customer List'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="ui-users">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>Registration">Create Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>Customer-List">Customer List</a></li>
              </ul>
            </div>
          </li>
          <?php }else{ ?>
          
           <li class="nav-item <?php if($title=='GST Master'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-master" aria-expanded="false" aria-controls="ui-master">
              <span class="menu-title">GST Master</span>
              <i class="menu-arrow"></i>
              <i class="fa fa-percent menu-icon"></i>
            </a>
            <div class="collapse" id="ui-master">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>GST-Master?add=new">Add GST Percent</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>GST-Master">GST List</a></li>
              </ul>
            </div>
          </li>
          
           <li class="nav-item <?php if($title=='Product Master'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-master">
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
              <i class="fa fa-product-hunt menu-icon"></i>
            </a>
            <div class="collapse" id="ui-product">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>product_master?add=new">Add Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>product_master">Product List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?php if($title=='Purchase Master'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-purchase" aria-expanded="false" aria-controls="ui-purchase">
              <span class="menu-title">Purchase</span>
              <i class="menu-arrow"></i>
              <i class="fa fa-shopping-bag menu-icon"></i>
            </a>
            <div class="collapse" id="ui-purchase">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>purchase_master?add=new">New Purchase</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>purchase_master">Purchase List</a></li>
              </ul>
            </div>
          </li>
          
         
          
           <li class="nav-item <?php if($title=='Sale Product'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false" aria-controls="ui-sales">
              <span class="menu-title">Sale Product</span>
              <i class="menu-arrow"></i>
              <i class="fa fa-th-list menu-icon"></i>
            </a>
            <div class="collapse" id="ui-sales">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>sales_master?add=new">Sale Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>sales_master">Sale List</a></li>
              </ul>
            </div>
          </li>
            <li class="nav-item <?php if($title=='Invoice Terms'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-terms" aria-expanded="false" aria-controls="ui-terms">
              <span class="menu-title">Invoice Terms</span>
              <i class="menu-arrow"></i>
              <i class="fa fa-lock menu-icon"></i>
            </a>
            <div class="collapse" id="ui-terms">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>inovice_terms?add=new">New Invoice Terms</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>inovice_terms">Invoice Terms List</a></li>
              </ul>
            </div>
          </li>
          <?php } ?>
        
        </ul>
      </nav>
     
     
     
     