jQuery.extend(jQuery.validator.messages, {
    required: "This field is required.",
    remote: "Email already exist.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL. (eg. http://www.example.com)",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Both password must be same.",
    accept: "Please enter a value with a valid extension.",
    maxlength: "Please do not exceed the limit of {0} character.",
    minlength: "This field must be at least of {0} characters in length.",
    rangelength: "Please enter a value between {0} and {1} characters long.",
    range: "Please enter a value between {0} and {1}.",
    max: "Please do not exceed the limit of {0} character",
    min: "Please enter at least {0} character."
});

$(function(){
	//$.validator.messages.maxlength = 'Please do not exceed the limit of {0} character';
	$.validator.addMethod("alphanum", function(value, element) { 
		return this.optional(element) || /^[a-z0-9/_]+$/i.test(value); 
	}, "Please enter only alphanumeric characters.");
	
	$.validator.addMethod("CharsOnly", function(value, element) { 
		return this.optional(element) || /^[^0-9/_]+$/i.test(value); 
	}, "Please enter only characters.");
	
	$.validator.addMethod("NoSpecialCharacters", function(value, element) { 
       return this.optional(element) || /^[^!@#$%^&*-+|\?<>]+$/i.test(value);
	}, "Special characters are not allowed.");
	
	$.validator.addMethod("OnlyFloat", function(value, element) { 
       return this.optional(element) || /^\d*(\.\d{1})?\d{0,1}$/i.test(value);
	}, "Please enter only numeric/float value.");
	
	
	$.validator.addMethod("NoSpecialCharactersForMailingAddress", function(value, element) { 
       return this.optional(element) || /^[^!@#$%^&*-+|\?<>]+$/i.test(value);
	}, "Special characters are not allowed. (eg. Washington Ave, Memorial Park)");
	
	$.validator.addMethod("NoSpecialCharactersWithoutDollar", function(value, element) { 
       return this.optional(element) || /^[^!@#%^&*-+|\?<>]+$/i.test(value);
	}, "Special characters are not allowed.");
	
	
	$.validator.addMethod("mobileFormat", function(value, element) { 
       var status = phoneFormat2($('#mobile').val());
		   if(status)
		   return true;
		   return false;
	}, "Invalid mobile number.");
	


jQuery.validator.addMethod("noSpace", function(value, element) { 
     return value.indexOf(" ") < 0 && value != ""; 
  }, "Space are not allowed");


$.validator.addMethod("imageValidate", function(value, element) { 
       var status = userImageValidate();
		   if(status)
		   return true;
		   return false;
	}, "Please upload JPG|JPEG|PNG|GIF.");



$.validator.addMethod("imageANDDocValidate", function(value, element) { 
       var status = userImageWithDocXlsValidate();
		   if(status)
		   return true;
		   return false;
	}, "Please upload JPG | JPEG | PNG | GIF | DOCX | XLSX file only.");
	
jQuery.validator.addMethod("keywordValidate", function(value, element) {
	
	
	var searchBy = $('#searchBy').val();
	var keyword = $('#keyword').val();
	
	if(searchBy=='5')
	return true;
	else{
		
			if(keyword!='')
			return true;
			return false;
	}
	 
     return value.indexOf(" ") < 0 && value != ""; 
  }, "Required field.");
	
	
	$.validator.addMethod("DateTo", function(value, element) { 
       var status = DateCheck($('#start_date').val(),$('#end_date').val());
		   if(status)
		   return true;
		   return false;
	}, "End date must be greater than or equal to start date.");

	
	
 });

function requiredOptionSelected() { 
		var optionV = $("input[type='radio'][name='option']:checked").val();
		if(optionV=='1' && $('#emailSelected').val()==''){
			
			return true;
			
		}else{
			
			return false;
		}
		
}
	
	
	$.validator.addMethod("GroupCheckboxOneRequired", function(value, elem, param) {
    if($(".onechkbox:checkbox:checked").length > 0){
       return true;
   }else {
       return false;
   }
},"Please check at least one.");


$.validator.addMethod("InputAginstRequired", function(value, elem, param) {
	var x=0;
   $('.onechkbox').each(function(){
   var $this = $(this);
    if ($this.is(':checked')) {
		
		 var InputVal = $(this).parent().parent().find('input[type=text]').val();
			if(InputVal==''){
				x=1;
			}
    }
    
});

if(x==1) return false;
return true;   
   
},"Please enter float value in all box.");


jQuery.validator.setDefaults({
    errorPlacement: function(error, element){
    if(element.attr("name") == "price[]"){
        error.appendTo($('#errorbox'));
    }
    if(element.attr("name") == "options_values_id[]"){
        error.appendTo($('#errorbox'));
    }
}
});

 function userImageValidate()
 {
		var userImage = $("#upload").val();
		
        var extension = userImage.split('.').pop().toUpperCase();
        
        if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
            return 0;
        }
        else {
            return 1;
        }
 }
 
 
 function phoneFormat2(mobile) { 
    var phoneRegEx =/^\(\d{3}\) \d{3}-\d{4}$/; 
     if(mobile.match(phoneRegEx)) {
         return 1;            
     } else{
          return 0;      
     }
    
}

function DateCheck(start,end){

    var st = start.split('-');
    st = st[1]+'/'+st[0]+'/'+st[2];

    var en = end.split('-');
    en = en[1]+'/'+en[0]+'/'+en[2];

	var s = new Date(st);
    var e = new Date(en);
    console.log(s);
    console.log(e);
   if(end!=''){

	if(s.getTime() > e.getTime()){
			return 0;	
		}else{
			return 1;
		}
	}else{
		return 1;
	}	
}


$(document).ready(function() {
	
	
/*---------------Start Validate pages-----------------*/

/*---------------Start Validation for Add User-----------------*/
$("#add_user").validate({
		
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

				"first_name": {
					required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
					 
			    },
				
				"last_name": {
			        required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
			    },
			    
			    "mobile": {
			        required: true,
					minlength: 10,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "email": {
			        required: true,
					email: true,
					noSpace: true
			    },
			    
			    "password": {
			        required: true,
					minlength: 4,
					maxlength: 30,
					noSpace: true
			    },
			    
			    "cpassword": {
			        required: true,
					noSpace: true,
					equalTo: "#password"
			    }
			    
        }
});
/*---------------End Validation for Add User-----------------*/

/*---------------Start Validation for Edit User-----------------*/
$("#user_register").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
	 	rules: {

				"first_name": {
					required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
					 
			    },
			    "last_name": {
			        required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
			    },
			    
			    "mobile": {
			        required: true,
			        number:true,
					minlength: 10,
					maxlength: 11,
					NoSpecialCharacters: true
			    },
			    
			    "email": {
			        required: true,
					email: true,
					noSpace: true,
					remote:  $('#urlCheckEmail').val()
			    },
			    
			    "password": {
			        required: true,
					minlength: 4,
					maxlength: 30,
					noSpace: true
			    },
			    "password_confirm": {
			        required: true,
					noSpace: true,
					equalTo: "#password"
			    }
			  },
    errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  $("#user_login").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
	 	rules: {	
			    
			    "email": {
			        required: true,
					email: true,
					noSpace: true,					
			    },			    
			    "password": {
			        required: true,
					minlength: 4,
					maxlength: 30,
					noSpace: true
			    }
			  },
    errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  $("#update_member").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
        rules: {

                "customers_firstname": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                     
                },
                "customers_lastnameame": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                },
                
                "customers_telephone": {
                    required: true,
                    number:true,
                    minlength: 10,
                    maxlength: 10,
                    NoSpecialCharacters: true
                },
                
                "customers_address": {
                    required: true,
                },
                
                "customers_country": {
                    required: true,
                    NoSpecialCharacters: true
                },
                "customers_city": {
                    required: true,
                    NoSpecialCharacters: true
                },
                "customers_zip": {
                    required: true,
                    NoSpecialCharacters: true,
                    number: true,
                    maxlength: 5,
                    minlength: 5

                },
              },
     errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  $("#change_password").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
        rules: {

                "customers_oldpassword": {
                    required: true,
                    minlength: 4,
                    maxlength: 10,
                   	noSpace: true,
                    remote: $("#urlCheckPassword").val()
                     
                },
                "customers_newpassword": {
                    required: true,
                    minlength: 4,
                    maxlength: 10,
                    NoSpecialCharacters: true,
                },
                
               
              },
              messages: {
              	"customers_oldpassword": {
              		remote: "Old password does not match."
              	},
              },
     errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  $("#loyalty_program_feedback").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
        rules: {

                "name": {
                    required: true,
                    NoSpecialCharacters: true,
                     
                },
                "email": {
                    required: true,
                    email: true,
                },
                "feedback": {
                	required: true,
                }
               
              },
     errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  $("#user_forget").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
	 	rules: {	
			    
			    "email": {
			        required: true,
					email: true,
					noSpace: true,
					remote: $('#urlCheckForgetEmail').val()					
			    },
			  },
			  messages: {
			  	"email": {
			  		remote: "Email does not exits."
			  	},
			  },
    errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
    $("#forget_password").validate({
    debug: false,
    errorClass: "errorClass",
    errorElement: "div",
	 	rules: {	
			    
			    "customers_newpassword": {
			        required: true,
			        noSpace: true,
			        minlength: 4,
			        maxlength: 10,				
			    },
			    "customers_cpassword": {
			    	required: true,
			    	noSpace: true,
			    	equalTo: "#customers_newpassword",
			    	minlength: 4,
			        maxlength: 10,
			    }
			  },
    errorPlacement: function(error, element) {
        element.parent().append(error);
    }
  });
  /*---------------End Validation for Edit User-----------------*/
/*---------------Start Validation for Add Customer-----------------*/
$("#add_customer").validate({
		
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {
	 			"customers_code": {
	 				required: true,
					minlength: 5,
					maxlength: 5,
					NoSpecialCharacters: true,
					digits: true,
	 			},

				"customers_firstname": {
					required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
					 
			    },
				
				"customers_lastname": {
			        required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
			    },
			    
			    "customers_telephone": {
			        required: true,
					minlength: 10,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_email_address": {
			        required: true,
					email: true,
					noSpace: true
			    },
			    
			    "customers_password": {
			        required: true,
					minlength: 4,
					maxlength: 30,
					noSpace: true
			    },
			    
			    "cpassword": {
			        required: true,
					noSpace: true,
					equalTo: "#customers_password"
			    },
			    
			    "customers_country": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_state": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_city": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_zip": {
			        required: true,
					minlength: 5,
					maxlength: 5,
					NoSpecialCharacters: true
			    },
        }
});
/*---------------End Validation for Add Customer-----------------*/


/*---------------Start Validation for Edit Customer-----------------*/
$("#edit_customer").validate({
		
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {
	 		"customers_code": {
	 				required: true,
					minlength: 5,
					maxlength: 5,
					NoSpecialCharacters: true,
					digits: true,
	 			},

				"customers_firstname": {
					required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
					 
			    },
				
				"customers_lastname": {
			        required: true,
					minlength: 2,
					maxlength: 30,
					NoSpecialCharacters: true,
					CharsOnly: true,
			    },
			    
			    "customers_telephone": {
			        required: true,
					minlength: 10,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_email_address": {
			        required: true,
					email: true,
					noSpace: true
			    },
			    
			    "customers_country": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_state": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_city": {
			        required: true,
					maxlength: 30,
					NoSpecialCharacters: true
			    },
			    
			    "customers_zip": {
			        required: true,
					minlength: 5,
					maxlength: 5,
					NoSpecialCharacters: true
			    },
        }
});
/*---------------End Validation for Edit Customer-----------------*/ 
   
   
/*---------------Start Validate on button click for Save Comment page-----------------*/ 
   $("#add_email_template").validate({
		
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

				"template_type_en": {
					required: true,
					NoSpecialCharacters: true,					
			    },
				"template_subject_en": {
			        required: true,
			        NoSpecialCharacters: true,
					CharsOnly: true	
			    },
			    "template_content_en": {
			        required: true
					
			    },
        }
});
      
      
jQuery("#sendingMail").validate({          
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
         rules: {
 
            "template_id": {
                     required: true,                 
                },
             
            "option": {
                
                        
               },
              
              "emailSelected": {
              	required: requiredOptionSelected,
               },
            "template_subject_en": {
                     required: true,                 
                },
            "template_content_en": {
                     required: true,                 
                }
        }
   }); 
   
   
  
     
/*---------------End Validate on button click for Save Comment page-----------------*/ 


/*---------------Start Validate on button click for Save Brands page-----------------*/ 

      
/*---------------Start Validate on button click for Add, Edit Brands page-----------------*/       
jQuery("#add_brand").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

			"brands_name_ar": {
			         required: true,				
			    },
			
			"brands_name_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			    
			"brands_slug": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			"brands_description_ar": {
			         required: true,				
			    },
			    "brands_description_en": {
			         required: true,	
			          NoSpecialCharacters: true,
			         CharsOnly: true				
			    },
			    "brands_image": {
			         required: true,				
			    },
			    "brands_to_categories[]": {
			         required: true,				
			    }
        }
   });   
   
   jQuery("#edit_brands").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

			"brands_name_ar": {
			         required: true,				
			    },
			
			"brands_name_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			    
			"brands_slug": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			"brands_description_ar": {
			         required: true,				
			    },
			    "brands_description_en": {
			         required: true,
			         CharsOnly: true
			         				
			    },
			     "brands_to_categories[]": {
			         required: true,				
			    }
        }
   });   
/*---------------End Validate on button click for Add, Edit Brands page-----------------*/ 

/*---------------Start Validate on button click for Add, Edit Category page-----------------*/       
jQuery("#add_category").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

			"parent_id": {
			         required: true,				
			    },
			
			"categories_name_ar": {
			         required: true,				
			    },
			    
			"categories_name_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			"brands_description_ar": {
			         required: true,				
			    }
			    
        }
   });   
   
   jQuery("#edit_category").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

			"parent_id": {
			         required: true,				
			    },
			
			"categories_name_ar": {
			         required: true,				
			    },
			    
			"categories_name_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			"brands_description_ar": {
			         required: true,				
			    }
        }
   });   
/*---------------End Validate on button click for Add, Edit Category page-----------------*/ 

/*---------------Start Validate on button click for Add, Edit Page Content page-----------------*/       
jQuery("#add_page_content").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

				
			"page_title_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true			
			    },
			
			  
			   "page_keyword_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			    
			    "page_desc_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true			
			    },
			    
			    "page_content_en": {
			         required: true				
			    }
			    
        }
   });   
   
   jQuery("#edit_page_content").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
	 	rules: {

			"page_title_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			
			  
			   "page_keyword_en": {
			         required: true,
			         CharsOnly: true				
			    },
			    
			    "page_desc_en": {
			         required: true,
			         NoSpecialCharacters: true,
					 CharsOnly: true				
			    },
			    
			    "page_content_en": {
			         required: true
								
			    }
        }
   });   
/*---------------End Validate on button click for Add, Edit Page Content page-----------------*/ 

/*---------------End Validate on button click for Add Attribute options value page-----------------*/ 
jQuery("#add_product_attr").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
		
	 	rules: {

			"options_id": {
			         required: true,				
			    },
			    
			"options_values_id[]": {
					 required: true,
			         GroupCheckboxOneRequired:true			
			    },
			"price[]": {
			         OnlyFloat:true,
			         required: true,
			         InputAginstRequired:true	
			    }
			  
			  
        }
   });   
/*---------------End Validate on button click for Add Attribute options value page-----------------*/ 


/*---------------End Validate on button click for Add Attribute options value page-----------------*/ 
jQuery("#customeruploads").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
		
	 	rules: {

			"userfile": {
			         required: true,				
			    }
		
        }
   });   
/*---------------End Validate on button click for Customer Bulk Upload value page-----------------*/ 
/*---------------End Validate Change Password page-----------------*/ 

jQuery("#changePwd").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
		
	 	rules: {

			"password": {
			        required: true,
					minlength: 4,
					maxlength: 30,
					noSpace: true
			    },
			    
			    "cpassword": {
			        required: true,
					noSpace: true,
					equalTo: "#password"
			    }
		
        }
   });   

   
jQuery("#add_product").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
		
	 	rules: {

			"pro_menu": {
			        required: true,
			    },
            "filter_menu": {
			        required: true,
			    },
            
            "pro_name": {
			        required: true,
			    },
            "product_image_name": {
			        required: true,
			    },
            "pro_dsc": {
			        required: true,
			    },
            
        }
        
   });

   
   
   jQuery("#update_product").validate({	 	
		debug: false,
		errorClass: "errorClass",
		errorElement: "div",
		
	 	rules: {
			"pro_menu": {
			        required: true,
			    },
            "filter_menu": {
			        required: true,
			    },
            
            "pro_name": {
			        required: true,
			    },
            "pro_dsc": {
			        required: true,
			    },
            
        }
        
   });

   $("#add_store").validate({
         
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
         rules: {
 
                "store_name": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                     
                },
                 
                "store_city": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                },
                
                "phone": {
                    required: true,                     
                    number:true,
                    maxlength: 10,
                },                 
                "store_address": {
                    required: true,
                    maxlength: 100,
                    NoSpecialCharacters: true
                },                
                "pin_code": { 
                    maxlength: 10,
                    number:true,
                    NoSpecialCharacters: true
                },
                "store_code": {
                    required: true,
                    minlength: 4,
                    maxlength: 4,  
                    digits: true,
                    NoSpecialCharacters: true,                   
                },
                "store_secret_key": {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    NoSpecialCharacters: true,
                    digits: true       
                }, 
                "upload": {
                    required: true,     
                    imageValidate: true                                 
                },
                 "store_email": {                    
                    email: true,                     
                },
                
        },
        messages: {
        	"store_code": {
        		digits: "Please enter only digits."
        	},
        	"store_secret_key": {
        		digits: "Please enter only digits."
        	},
        },
});
$("#edit_store").validate({
         
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
         rules: {
 
                "store_name": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                     
                },
                 
                "store_city": {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    NoSpecialCharacters: true,
                    CharsOnly: true,
                },
                
                "phone": {
                    required: true,                     
                    number:true,
                    maxlength: 10,
                },                 
                "store_address": {
                    required: true,
                    maxlength: 100,
                    NoSpecialCharacters: true
                },                
                "pin_code": {
                    maxlength: 10,
                    number:true,
                    NoSpecialCharacters: true
                },
                "store_code": {
                    required: true,
                    minlength: 4,
                    maxlength: 4,  
                    digits: true,
                    NoSpecialCharacters: true,                   
                },
                "store_secret_key": {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    NoSpecialCharacters: true,
                    digits: true       
                },
                 "store_email": {                    
                    email: true,                     
                },
                
        },
        messages: {
        	"store_code": {
        		digits: "Please enter only digits."
        	},
        	"store_secret_key": {
        		digits: "Please enter only digits."
        	},
        },
});  



$("#add_offers").validate({
         
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
         rules: {
                "offer_name": {
                    required: true,
                    minlength: 2,
                    

                },
                
            "offer_dsc": {
                        required: true,
                        minlength: 2,
                       
                        
                    },
                    
                    "help1": {
                        required: true,
                        minlength: 2,
                        
                        
                    },
                    "help2": {
                        required: true,
                        minlength: 2,
                       
                       
                    },
            "level_list[]": {
                    required: true,
                },
            "member[]": {
                required: true,
            },
            "start_date": {
                required: true,
            },  
            "end_date": {
                required: true,
                DateTo:true,

            },
    }
});


$("#edit_offers").validate({
         
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
         rules: {
                "offer_name": {
                    required: true,
                    minlength: 2,
                   
                    
                },
                
            "offer_dsc": {
                        required: true,
                        minlength: 2,
                       

                    },
                    
                    "help1": {
                        required: true,
                        minlength: 2,
                        
                        
                    },
                    "help2": {
                        required: true,
                        minlength: 2,
                       
                       
                    },
            "level_list[]": {
                    required: true,
                },
            "member[]": {
                required: true,
            },
            "start_date": {
                required: true,
            },  
            "end_date": {
                required: true,
                DateTo:true,

            },
    }
});



/*---------------End Validate Change Password page-----------------*/ 

/*---------------End Validate pages-----------------*/



});
