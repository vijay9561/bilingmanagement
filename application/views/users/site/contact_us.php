<header  class="intro introhalf"> 
  <!-- Intro Header-->
  <div class="intro-body">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <h1> Contact us</h1>
        <h4>Get In Touch Us</h4>
      </div>
    </div>
  </div>
</header>
<section id="contact " class="bg-dark2">
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-xs-12 ">
        <h3>Office Address</h3>
        <h5><i class="fa fa-map-marker fa-fw fa-lg"></i> EFC BUSINESS CENTER, 4TH FLOOR, MARISOFT 1,<br>
          MARIGOLD, KALYANI NAGAR, <br>
          Pune, Maharashtra 411014, <br>
         </h5>
        <h5 style="text-transform:lowercase"><i class="fa fa-envelope fa-fw fa-lg"></i> <a href="mailto:support@gamomobile.com">support@gamomobile.com</a> </h5>
        <h5 style="text-transform:lowercase"><i class="fa fa-envelope fa-fw fa-lg"></i> <a href="mailto:hr@gamomobile.com">hr@gamomobile.com</a> </h5>
       <!-- <h5><i class="fa fa-phone fa-fw fa-lg"></i> 888 1000 800 </h5>-->
      </div>
      <div class="col-sm-6 col-xs-12 col-sm-offset-1">
           <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('message'); ?></div>
            <?php  $this->session->unset_userdata('message'); } ?>
          <div class="alert alert-danger" id="message_contact_error" style="display:none;"></div>
        <h3>Write To Us:</h3>
        <!-- Contact Form - Enter your email address on line 17 of the mail/contact_me.php file to make this form work. For more information on how to do this please visit the Docs!-->
        <form  action="#" name="submit_enquiry_form" id="submit_enquiry_form" method="POST" novalidate class="dark-form">
                              <input type="hidden" name="csrf" value=ifpUdZjeFsxQhhA4fH806vjbS3cX9vZnhcvUlYzi />
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="name" class="sr-only control-label">Name</label>
              <input id="name" name="name" type="text" placeholder="Name*" required="" data-validation-required-message="Please enter name" class="form-control input-lg">
              <span class="help-block text-danger"></span> </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="email" class="sr-only control-label">Email</label>
              <input id="email" name="email" type="email" placeholder="Email*" required data-validation-required-message="Please enter email" class="form-control input-lg">
              <span class="help-block text-danger"></span> </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="phone_no" class="sr-only control-label">Phone</label>
              <input id="phone_no" name="phone_no" type="tel" placeholder="Phone" class="form-control input-lg">
              <span class="help-block text-danger"></span> </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="message" class="sr-only control-label">Message</label>
              <textarea id="message1" name="message1" rows="3" placeholder="Message" class="form-control input-lg"></textarea>
              <span class="help-block text-danger"></span> </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-lg btn-dark" id="sendmessages">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>