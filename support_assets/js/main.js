// Register Users Code

$("#loging_submit").validate({
    ignore: ":hidden",
    rules: {
        username: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        password: {
            required: true,
           
        },
      
    },
    messages: {
        username: {
            required: "<span>Please enter your username or mobile no</span>",
            maxlength: "<span>Please enter username or mobile no min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        password: {
            required: "<span>Please enter enter your password</span>",
          
        },
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'SupportController/support_login',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#Login_customers').addClass('sanding').attr("disabled", true);
                $('#Login_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_login').show();
                   $('#error_message_login').html(obj.message);
                   
                     $('#Login_customers').prop('disabled', false);
                     $('#Login_customers').html('SIGN IN');
                     $('#Login_customers').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_login').show();
                    $('#success_message_login').html(obj.message);
                    window.location=BASE_URL;
                    return false;

                }
            }
        });
        
        
        
    }
});




$("#registration_users").validate({
    ignore: ":hidden",
    rules: {
        username: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        email_id: {
            required: true,
            email:true,
        
        },
       password: {
            required: true,
            minlength: 6,
            maxlength: 30,
        },
        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
        },
      store_name:{
         required: true,
         minlength: 5,
        maxlength: 50,  
      },
      state: {
       required: true,   
      },
      city: {
       required: true,   
      },
      address:{
        required: true,
        minlength: 5,
        maxlength: 100,   
      },
      pincode: {
        required: true,
        number: true,
        minlength: 6,
        maxlength: 6,    
        },  
      
    },
    messages: {
        username: {
            required: "<span>Please enter your username </span>",
            maxlength: "<span>Please enter mobile no min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
         password: {
            required: "<span>Please enter your password </span>",
            maxlength: "<span>Please enter password max 30 character </span>",
            minlength: "<span>please enter min 6 character password</span>",
        },
          email_id: {
            required: "<span>Please enter your username </span>",
            email: "<span>please valid email address</span>",
        },
        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
        },
          store_name: {
            required: "<span>Please enter your store name </span>",
            maxlength: "<span>Please enter store name max 50 character </span>",
            minlength: "<span>please enter min 5 character of store name</span>",
        },
         pincode: {
            required: "<span>Please enter your pincode number </span>",
            maxlength: "<span>Please enter pincode  6 digit </span>",
            minlength: "<span>Please enter pincode  6 digit </span>",
           number:"<span>Please enter only numeric pincode </span>",
        },
        state: {
            required: "<span>Please select state </span>",
         },
          city: {
            required: "<span>Please select city </span>",
         },
          address: {
            required: "<span>Please enter your address details </span>",
            maxlength: "<span>Please enter address min 5 or 100 character </span>",
            minlength: "<span>please enter min 6 digit character</span>",
         },
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'Customer-Registration',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#Register_customers').addClass('sanding').attr("disabled", true);
                $('#Register_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_register').show();
                   $('#error_message_register').html(obj.message);
                   
                     $('#Register_customers').prop('disabled', false);
                     $('#Register_customers').html('Register Customer');
                     $('#Register_customers').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_register').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_register').show();
                    $('#success_message_register').html(obj.message);
                    window.location='Customer-List';
                    return false;

                }
            }
        });
        
        
        
    }
});

$("#update_customer").validate({
    ignore: ":hidden",
    rules: {
        username: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        email_id: {
            required: true,
            email:true,
        
        },
       
        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
        },
      store_name:{
         required: true,
         minlength: 5,
        maxlength: 50,  
      },
      state: {
       required: true,   
      },
      city: {
       required: true,   
      },
      address:{
        required: true,
        minlength: 5,
        maxlength: 100,   
      },
     pincode: {
        required: true,
        number: true,
        minlength: 6,
        maxlength: 6,    
        },  
      
      
    },
    messages: {
        username: {
            required: "<span>Please enter your username </span>",
            maxlength: "<span>Please enter mobile no min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
          email_id: {
            required: "<span>Please enter your username </span>",
            email: "<span>please valid email address</span>",
        },
        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
        },
        pincode: {
            required: "<span>Please enter your pincode number </span>",
            maxlength: "<span>Please enter pincode  6 digit </span>",
            minlength: "<span>Please enter pincode  6 digit </span>",
           number:"<span>Please enter only numeric pincode </span>",
        },
          store_name: {
            required: "<span>Please enter your store name </span>",
            maxlength: "<span>Please enter store name max 50 character </span>",
            minlength: "<span>please enter min 5 character of store name</span>",
        },
        state: {
            required: "<span>Please select state </span>",
         },
          city: {
            required: "<span>Please select city </span>",
         },
          address: {
            required: "<span>Please enter your address details </span>",
            maxlength: "<span>Please enter address min 5 or 100 character </span>",
            minlength: "<span>please enter min 6 digit character</span>",
         },
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'customer_update_details',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#Register_customers').addClass('sanding').attr("disabled", true);
                $('#Register_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_register').show();
                   $('#error_message_register').html(obj.message);
                   
                     $('#Register_customers').prop('disabled', false);
                     $('#Register_customers').html('Change Save');
                     $('#Register_customers').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_register').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_register').show();
                    $('#success_message_register').html(obj.message);
                    window.location='Customer-List';
                    return false;

                }
            }
        });
        
        
        
    }
});

// Staus changed ajax
function update_status_customer(id){
  con=confirm('Are you sure the changed status');
  if(con==true){
    $.ajax({
     url:BASE_URL+"Changed_Status_Customer",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='Customer-List';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}

// Changed Password


$("#changed_password").validate({
    ignore: ":hidden",
    rules: {
        new_password: {
            required: true,
            minlength: 6,
            maxlength: 30,
        },
        con_password:{
        equalTo : "#new_password",
        minlength: 6,
        maxlength: 30,
        }
      
    },
    messages: {
        new_password: {
            required: "<span>Please enter new password</span>",
            maxlength: "<span>your entered password min 6 or 30 character </span>",
            minlength: "<span>please enter min 6 character</span>",
        },
       con_password: {
            minlength: "<span>Your password must consist of at least 6 characters</span>",
            maxlength: "<span>your entered password min 6 or 30 character </span>",
            equalTo: "Enter Confirm Password Same as Password",
        }
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'change_password_process',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#change_Password').addClass('sanding').attr("disabled", true);
                $('#change_Password').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_change').show();
                   $('#error_message_change').html(obj.message);
                   
                     $('#change_Password').prop('disabled', false);
                     $('#change_Password').html('Change Password');
                     $('#change_Password').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    window.location='change_password';
                    return false;

                }
            }
        });  
    }
});

// GST Master

$("#gst_master_forms").validate({
    ignore: ":hidden",
    rules: {
        gst_master: {
            required: true,
            minlength: 1,
            number: true,
            maxlength:6,
        },
      
      
    },
    messages: {
        gst_master: {
            required: "<span>Please enter percent</span>",
            maxlength: "<span>your entered percent min 1 or 6 digit </span>",
            minlength: "<span>please enter min 1 digit</span>",
           number: "<span>Please enter digit only</span>", 
        },
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'add_new_gst_masters',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#gst_button').addClass('sanding').attr("disabled", true);
                $('#gst_button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_change').show();
                   $('#error_message_change').html(obj.message);
                   
                     $('#gst_button').prop('disabled', false);
                     $('#gst_button').html('Save Changes');
                     $('#gst_button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    window.location='GST-Master';
                    return false;

                }
            }
        });  
    }
});


// Update GST Master

$("#gst_master_forms_update").validate({
    ignore: ":hidden",
    rules: {
        gst_master: {
            required: true,
            minlength: 1,
            number: true,
            maxlength:6,
        },
      
      
    },
    messages: {
        gst_master: {
            required: "<span>Please enter percent</span>",
            maxlength: "<span>your entered percent min 1 or 6 digit </span>",
            minlength: "<span>please enter min 1 digit</span>",
           number: "<span>Please enter digit only</span>", 
        },
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'update_new_gst_masters',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#gst_button_update').addClass('sanding').attr("disabled", true);
                $('#gst_button_update').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_change').show();
                   $('#error_message_change').html(obj.message);
                   
                     $('#gst_button_update').prop('disabled', false);
                     $('#gst_button_update').html('Save Changes');
                     $('#gst_button_update').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    window.location='GST-Master';
                    return false;

                }
            }
        });  
    }
});



// Data Tables Fetching
table = $('#customer_list_data').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"customer_list_data_get",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
   /// 
    // GST Master
    
    table = $('#gst_master_list').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"gst_master_get_list",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    
    table = $('#product_tables').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"product_master_list",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    table = $('#purchase_all_list').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"purchase_master_list",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
     table = $('#invoice_tables').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"inovice_terms_list",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    
    table = $('#sale_master_tables').DataTable({ 
	"pageLength": 50,
	"bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"sale_master_list",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    
    
    function delete_gst_master_tables(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_gst_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='GST-Master';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}


function delete_sale_product(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_sales_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='sales_master';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}


function delete_purchases_masters(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_purchases_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='purchase_master';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}
function delete_productss_master(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_productss_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='product_master';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}

$("#product_master_forms").validate({
    ignore: ":hidden",
    rules: {
        
        product_name: {
            required: true,
        },
       gst_rate: {
            required: true,
        },  
      price: {
            required: true,
            number: true,
        
        }, 
      
    },
    messages: {
        product_name: {
            required: "<span>Please enter product name</span>",
        },
        gst_rate: {
            required: "<span>Please select gst rate</span>",
        },
       price: {
            required: "<span>Please enter product price</span>",
            number: "<span>Please enter digit only</span>", 
        },  
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'add_new_product_masters',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#product__button').addClass('sanding').attr("disabled", true);
                $('#product__button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_change').show();
                   $('#error_message_change').html(obj.message);
                   
                     $('#product__button').prop('disabled', false);
                     $('#product__button').html('Save Changes');
                     $('#product__button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_change').hide(); }, 10000);
                    return false;
                } else {
                    window.location='product_master';
                    return false;

                }
            }
        });  
    }
});

// Product status

function update_status_product(id){
  con=confirm('Are you sure the changed status');
  if(con==true){
    $.ajax({
     url:BASE_URL+"Product_Status_Changed",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='product_master';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}

$("#product_master_upate").validate({
    ignore: ":hidden",
    rules: {
        
        product_name: {
            required: true,
        },
       gst_rate: {
            required: true,
        },  
      price: {
            required: true,
            number: true,
        
        }, 
      
    },
    messages: {
        product_name: {
            required: "<span>Please enter product name</span>",
        },
        gst_rate: {
            required: "<span>Please select gst rate</span>",
        },
       price: {
            required: "<span>Please enter product price</span>",
            number: "<span>Please enter digit only</span>", 
        },  
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'update_new_product_masters',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#product_update_button').addClass('sanding').attr("disabled", true);
                $('#product_update_button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                   $('#error_message_change').show();
                   $('#error_message_change').html(obj.message);
                   
                     $('#product_update_button').prop('disabled', false);
                     $('#product_update_button').html('Save Changes');
                     $('#product_update_button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_change').hide(); }, 10000);
                    return false;
                } else {
                    window.location='product_master';
                    return false;

                }
            }
        });  
    }
});


$("#purchase_master_forms").validate({
    ignore: ":hidden",
    rules: {
        
        product_name: {
            required: true,
        },
       gst_rate: {
            required: true,
        },  
      product_price: {
            required: true,
            number: true,
        
        }, 
        
      qty: {
            required: true,
            number: true,
        
        },   
      
    },
    messages: {
        product_name: {
            required: "<span>Please enter product name</span>",
        },
        gst_rate: {
            required: "<span>Please select gst rate</span>",
        },
       product_price: {
            required: "<span>Please enter product price</span>",
            number: "<span>Please enter digit only</span>", 
        },  
        
        qty: {
            required: "<span>Please enter quantity</span>",
            number: "<span>Please enter digit only</span>", 
        },  
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'add_new_purchase_prod_items',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#purchase__button').addClass('sanding').attr("disabled", true);
                $('#purchase__button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                     $('#error_message_change').show();
                     $('#error_message_change').html(obj.message);
                     $('#purchase__button').prop('disabled', false);
                     $('#purchase__button').html('Add Item');
                     $('#purchase__button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_change').hide(); }, 10000);
                    return false;
                } else {
                  // alert(data); 
                    $('#purchase__button').prop('disabled', false);
                     $('#purchase__button').html('Add Item');
                     $('#purchase__button').addClass('sanding').attr("disabled", false);
                     $("#product_name").val('');
                     $("#product_price").val('');
                     $("#qty").val('');
                     $('#get_temp_details').hide().html(obj.datas).fadeIn('slow');
                }
            }
        });  
    }
});


    function delete_purchase_masters(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_purchase_temp_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          $('#get_temp_details').hide().html(obj.datas).fadeIn('slow');
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}

  function purchase_product(){
      var vendor_name=$("#vendor_name").val();
      var mobile_no=$("#mobile_no").val();
      var mobilenovalidation=/^\d{10}$/;
      if(vendor_name==""){
       $("#vendor_namer").html('Please enter vendor name');
       $("#vendor_name").focus();  
       return false;
      }
      if(mobile_no==""){
       $("#mobile_nor").html('Please enter mobile number');
       $("#mobile_no").focus(); 
       return false;
      }
        if (!(mobile_no.match(mobilenovalidation))) {
        $("#mobile_nor").html("Please enter 10 digit contact number");	
        $("#mobile_no").focus();
        return false;
        }
      
        $.ajax({
            type: "POST",
            url: BASE_URL + 'Puchase_product_vendors',
            data:{vendor_name:vendor_name,mobile_no:mobile_no},
            beforeSend: function () {
                $('#purchase__button').addClass('sanding').attr("disabled", true);
                $('#purchase__button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                     $('#error_message_submit').show();
                     $('#error_message_submit').html(obj.message);
                     $('#purchase__button').prop('disabled', false);
                     $('#purchase__button').html('Submit');
                     $('#purchase__button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_submit').hide(); }, 10000);
                    return false;
                } else {
             
                    window.location='purchase_master?pid='+obj.pid;
                    return false;

                }
            }
        });      
    }



$("#inovice_terms_forms").validate({
    ignore: ":hidden",
    rules: {
        details: {
            required: true,
            minlength: 3,
            maxlength: 200,
        },
       
     
      
    },
    messages: {
        details: {
            required: "<span>Please enter invoice terms </span>",
            maxlength: "<span>Please enter invoice terms min 3 or 200 character </span>",
            minlength: "<span>please enter min 3  character</span>",
        },
         
      
      },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'inert_new_terms_condition',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#inovice__button').addClass('sanding').attr("disabled", true);
                $('#inovice__button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                     $('#error_message_submit').show();
                     $('#error_message_submit').html(obj.message);
                     $('#inovice__button').prop('disabled', false);
                     $('#inovice__button').html('Submit');
                     $('#inovice__button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_submit').hide(); }, 10000);
                    return false;
                } else {
                    window.location='inovice_terms';
                    return false;

                }
            }
        });
        
        
        
    }
});

  
    function delete_invoice_tables(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_invoice_tables",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          window.location='inovice_terms';
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}


  
  // Sales Product Action
  
  
  $("#sale_master_forms").validate({
    ignore: ":hidden",
    rules: {
        
        product_name: {
            required: true,
        },
       gst_rate: {
            required: true,
        },  
      product_price: {
            required: true,
            number: true,
        
        }, 
        
      qty: {
            required: true,
            number: true,
        
        },   
      
    },
    messages: {
        product_name: {
            required: "<span>Please enter product name</span>",
        },
        gst_rate: {
            required: "<span>Please select gst rate</span>",
        },
       product_price: {
            required: "<span>Please enter product price</span>",
            number: "<span>Please enter digit only</span>", 
        },  
        
        qty: {
            required: "<span>Please enter quantity</span>",
            number: "<span>Please enter digit only</span>", 
        },  
      
       

    },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'add_new_sale_prod_items',
            data: $(form).serialize(),
            beforeSend: function () {
                $('#sale__button').addClass('sanding').attr("disabled", true);
                $('#sale__button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                     $('#error_message_change').show();
                     $('#error_message_change').html(obj.message);
                     $('#sale__button').prop('disabled', false);
                     $('#sale__button').html('Add Item');
                     $('#sale__button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_change').hide(); }, 10000);
                    return false;
                } else {
                  // alert(data); 
                    $('#sale__button').prop('disabled', false);
                     $('#sale__button').html('Add Item');
                     $('#sale__button').addClass('sanding').attr("disabled", false);
                     $("#product_name").val('');
                     $("#product_price").val('');
                     $("#qty").val('');
                     $('#get_temp_details').hide().html(obj.datas).fadeIn('slow');
                }
            }
        });  
    }
});


    function delete_sales_masters(id){
  con=confirm('Are you sure the delete record');
  if(con==true){
    $.ajax({
     url:BASE_URL+"delete_sale_temp_master",
     type: "POST",
     data:{id:id},
     success: function (data) {
         obj = JSON.parse(data);
        if (obj.code == 200) {
          $('#get_temp_details').hide().html(obj.datas).fadeIn('slow');
          return false;
          }else{
           alert('Not Updated');
           return false;
           }
         }
    });  
  }
}

  function sale_product(){
      var vendor_name=$("#vendor_name").val();
      var mobile_no=$("#mobile_no").val();
      var mobilenovalidation=/^\d{10}$/;
      if(vendor_name==""){
       $("#vendor_namer").html('Please enter customer name');
       $("#vendor_name").focus();  
       return false;
      }
      if(mobile_no==""){
       $("#mobile_nor").html('Please enter mobile number');
       $("#mobile_no").focus(); 
       return false;
      }
        if (!(mobile_no.match(mobilenovalidation))) {
        $("#mobile_nor").html("Please enter 10 digit contact number");	
        $("#mobile_no").focus();
        return false;
        }
      
        $.ajax({
            type: "POST",
            url: BASE_URL + 'sale_product_vendors',
            data:{vendor_name:vendor_name,mobile_no:mobile_no},
            beforeSend: function () {
                $('#sales_final_button').addClass('sanding').attr("disabled", true);
                $('#sales_final_button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
          
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                     $('#error_message_submit').show();
                     $('#error_message_submit').html(obj.message);
                     $('#sales_final_button').prop('disabled', false);
                     $('#sales_final_button').html('Submit');
                     $('#sales_final_button').addClass('sanding').attr("disabled", false);
                     setTimeout(function(){ $('#error_message_submit').hide(); }, 10000);
                    return false;
                } else {
                    window.location='sales_master?pid='+obj.pid;
                    return false;

                }
            }
        });      
    }
    
    
    var jq=$.noConflict();
jq(document).ready(function(){
jq("#product_names").autocomplete({
        source: BASE_URL+"autosearch_product",
        minLength: 1,
       select: function(event, data) {
       jq("#product_names").val(data.item.value);
       jq("#product_price").val(data.item.price);
       },
   });
  });
  


