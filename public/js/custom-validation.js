$(function(){
    $.validator.addMethod("imageValidatePng", function(value, element) { 
       var status = userImageValidatePng();
           if(status)
           return true;
           return false;
    }, "Please upload only PNG File.");

    $.validator.addMethod("imageValidateMp4", function(value, element) { 
       var status = userImageValidateMp4();
           if(status)
           return true;
           return false;
    }, "Please upload only MP4 File.");

    $.validator.addMethod("imageValidateMp4Size", function(value, element) { 
       var status = userImageValidateMp4Size();
           if(status)
           return true;
           return false;
    }, "Video Size should not be more than 2 MB.");

});

function userImageValidatePng()
 {
        var userImage = $("#upload").val();
        
        var extension = userImage.split('.').pop().toUpperCase();
        
        if (extension!="PNG"){
            return 0;
        }
        else {
            return 1;
        }
 }

function userImageValidateMp4()
 {
        var userImage = $("#video").val();
        
        var extension = userImage.split('.').pop().toUpperCase();
        
        if (extension!="MP4"){
            return 0;
        }
        else {
            return 1;
        }
 }

 function userImageValidateMp4Size()
 {
        var userImage = $("#video")[0].files[0].size;
        
        if (userImage > "2097152"){
            return 0;
        }
        else {
            return 1;
        }
 }

$("#update_brand_image").validate({

    rules: {
        image: {
            required: true,
            imageValidate: true,
        },
        image_url: {
            required: true
        },
      },
    //For custom messages
    messages: {
        image:{
            required: "Please Select Image"
        },
        image_url: {
            required: "Enter Image Url"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});


$("#edit_best_offer_images").validate({

    rules: {
        best_offer_caption_ar: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        best_offer_caption_en: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        best_offer_url :{
          required: true  
      },     
        image: {
            required: true,
            imageValidate: true,
        },
      },
    //For custom messages
    messages: {
        best_offer_caption_ar:{
            required: "Please Enter Caption!"
        },
        best_offer_caption_en:{
            required: "Please Enter Caption!"
        },
        best_offer_url: {
            required: "Please Enter Url!"
        },
      
        image: {
            required: "Please Upload Image!"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#edit_banner_videos").validate({

    rules: {
        video_path: {
            required: true,
        },
      },
    //For custom messages
    messages: {
        video_path: {
            required: "Please Enter Video Embeded Code",
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#update_filtermenu").validate({

    rules: {
        filter_menu: {
            required: true,
            NoSpecialCharacters: true,
        },
      },
    //For custom messages
    messages: {
        filter_menu: {
            required: "Please Enter Filter Menu Name",
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});




$("#edit_new_arrivals_images").validate({

    rules: {
        new_arrivals_caption_ar: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        new_arrivals_caption_en: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        new_arrivals_url :{
          required: true  
      },     
        image: {
            required: true,
            imageValidate: true,
        },
      },
    //For custom messages
    messages: {
        new_arrivals_caption_ar:{
            required: "Please Enter Caption!"
        },
        new_arrivals_caption_en:{
            required: "Please Enter Caption!"
        },
        new_arrivals_url: {
            required: "Please Enter Best Offer Url!"
        },
      
        image: {
            required: "Please Upload Image!"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});


$("#edit_banner_images").validate({

    rules: {
        image: {
            required: true,
            imageValidatePng: true,
        },
        video: {
            required: true,
            imageValidateMp4: true,
            imageValidateMp4Size: true,
        },
        
    },
    
    messages: {
        image:{
            required: "Please Select Image"
        },
        video:{
            required: "Please Select Video"
        },
        
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#color_form").validate({

    rules: {
        "pro_name_en[]": {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        "pro_name_ar[]": {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        "pro_image[]": {
            required: true,
            imageValidate: true,
        },
      },
    //For custom messages
    messages: {
        "pro_name_en[]":{
            required: "Please Enter Product Name in English"
        },
        "pro_name_ar[]": {
            required: "Please Enter Product Name in Arabic"
        },
        "pro_image[]": {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#vol_form").validate({

    rules: {
        "pro_att_vol[]": {
            required: true,
            NoSpecialCharacters: true,
            number: true,
        },
        "pro_measure_vol[]": {
            required: true
        },
      },
    //For custom messages
    messages: {
        "pro_att_vol[]":{
            required: "Please Enter Product Volume"
        },
        "pro_measure_vol[]": {
            required: "Please Select Measurement"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#update_attri_color").validate({

    rules: {
        pro_name_en: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },

        pro_name_ar: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        
    },
    
    messages: {
        pro_name_en: {
            required: "Please Enter Color Code Name in English"
        },
        pro_name_ar: {
            required: "Please Enter Color Code Name in Arabic"
        },
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#update_attri_vol").validate({

    rules: {
        product_vol: {
            required: true,
            number: true,
            NoSpecialCharacters: true,
        },

        product_measure: {
            required: true,
            NoSpecialCharacters: true,
        },
    },
    
    messages: {
        product_vol: {
            required: "Please Enter Product Volume"
        },
        product_measure: {
            required: "Please Select Product Measuring Unit"
        }
        
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#character_form").validate({

    rules: {
        pro_cha_en: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },

        pro_cha_ar: {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
    },
    
    messages: {
        pro_cha_en: {
            required: "Please Enter Product Character Name in English"
        },
        pro_cha_ar: {
            required: "Please Enter Product Character Name in Arabic"
        }
        
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#pro_nature").validate({

    rules: {
        "nature_name_en[]": {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        "nature_name_ar[]": {
            required: true,
            NoSpecialCharacters: true,
            CharsOnly: true,
        },
        "nature_desc[]": {
            required: true
        },
        "nature_image[]": {
            required: true,
            imageValidate: true,
        },
      },
    //For custom messages
    messages: {
        "nature_name_en[]":{
            required: "Please Enter Nature Name in English"
        },
        "nature_name_ar[]": {
            required: "Please Enter Nature Name in Arabic"
        },
        "nature_image[]": {
            required: "Please Select Image"
        },
        "nature_desc[]": {
            required: "Please Enter Nature Description"
        },

      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#add_news").validate({

    rules: {
        news_title: {
            required: true,
        },
        news_desc: {
            required: true,
        },
        image: {
            required: true,
            imageValidate: true,
        }
      },
    //For custom messages
    messages: {
        news_title: {
            required: "Please Enter News Title",
        },
        news_desc: {
            required: "Please Enter News Description",
        },
        image: {
            required: "Please Select Image",
        }
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#edit_brand_news").validate({

    rules: {
        news_title: {
            required: true,
        },
        news_desc: {
            required: true,
        },
        image: {
            required: true,
            imageValidate: true,
        }
      },
    //For custom messages
    messages: {
        news_title: {
            required: "Please Enter News Title",
        },
        news_desc: {
            required: "Please Enter News Description",
        },
        image: {
            required: "Please Select Image",
        }
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#flag_form").validate({

    rules: {
        'flag_seq[]': {
            required: true,
            NoSpecialCharacters: true,
            number: true,
        },
        'flag_url[]': {
            required: true,
            NoSpecialCharacters: true,
        },
        'flag_image[]': {
            required: true,
            imageValidate: true,

        },
      },
    //For custom messages
    messages: {
        'flag_seq[]': {
            required: "Please Enter Sequence"
        },
        'flag_url[]':{
            required: "Enter Flag Url"
        },
        'flag_image[]': {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#update_flag").validate({

    rules: {
        'flag_url': {
            required: true,
            NoSpecialCharacters: true,
        },
      },
    //For custom messages
    messages: {
        'flag_url':{
            required: "Enter Flag Url"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#add_menu").validate({

    rules: {
        'menu_name': {
            required: true,
            NoSpecialCharacters: true,
        },
        'menu_desc': {
              NoSpecialCharacters: true,
        },
        'menu_image': {
            required: true,
            imageValidate: true,

        },
      },
    //For custom messages
    messages: {
        'menu_name':{
            required: "Enter Menu Name"
        },
        'menu_image': {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#update_menu").validate({

    rules: {
        'menu_name': {
            required: true,
            NoSpecialCharacters: true,
        },
        'menu_desc': {
            NoSpecialCharacters: true,
        },
      },
    //For custom messages
    messages: {
        'menu_name':{
            required: "Enter Menu Name"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#add_know").validate({

    rules: {
        'know_head': {
            required: true,
        },
        'know_text': {
            required: true,
        },
        'image': {
            required: true,
            imageValidate: true,

        },
      },
    //For custom messages
    messages: {
        'know_head':{
            required: "Please Enter Heading"
        },
        'know_text':{
            required: "Please Enter Short Text"
        },
        'image': {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#update_know").validate({

    rules: {
        'image': {
            required: true,
            imageValidate: true,

        },
      },
    //For custom messages
    messages: {
        'image': {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#add_group").validate({

    rules: {
        'group_name': {
            required: true,
            NoSpecialCharacters: true,
        },
        'group_desc': {
            NoSpecialCharacters: true,
        },

      },
    //For custom messages
    messages: {
        'group_name': {
            required: "Please Enter Group Name"
        },

      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#edit_group").validate({

    rules: {
        'group_name': {
            required: true,
            NoSpecialCharacters: true,
        },
        'group_desc': {
            NoSpecialCharacters: true,
        },

      },
    //For custom messages
    messages: {
        'group_name': {
            required: "Please Enter Group Name"
        },

      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#update_menu_banner").validate({

    rules: {
        'image': {
            required: true,
            imageValidate: true,

        },
      },
    //For custom messages
    messages: {
        'image': {
            required: "Please Select Image"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#search_product").validate({

    rules: {
        'keyword': {
            required: true,

        },
      },
    //For custom messages
    messages: {
        'keyword': {
            required: "Please Enter Search Keyword"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});
$("#searchuser").validate({

    rules: {
        'keyword': {
            required: true,

        },
      },
    //For custom messages
    messages: {
        'keyword': {
            required: "Please Enter Search Keyword"
        },
      },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

