$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();
//    alert("chandan");
       var firstname =  $('.firstname').val();
       var lastname  =  $('.lastname').val();
       var email     =  $('.email').val();
       var phone     =  $('.phone').val();
       var address1  =  $('.address1').val();
       var address2  =  $('.address2').val();
       var city      =  $('.city').val();
       var state     =  $('.state').val();
       var country   =  $('.country').val();
       var pincode   =  $('.pincode').val();
//    alert(country);
       if(!firstname)
       {
        fname_error = "First Name is reuired";
        $('#fname_error').html('');
        $('#fname_error').html(fname_error);
       }
       else
       {
        fname_error = "";
        $('#fname_error').html('');
       }
       if(!lastname)
       {
        lname_error = "Last Name is reuired";
        $('#lname_error').html('');
        $('#lname_error').html(lname_error);
       }
       else
       {
        lname_error = "";
        $('#lname_error').html('');
       }
       if(!email)
       {
        email_error = "Email Name is reuired";
        $('#email_error').html('');
        $('#email_error').html(email_error);
       }
       else
       {
        email_error = "";
        $('#email_error').html('');
       }
       if(!phone)
       {
        phone_error = "Phone Name is reuired";
        $('#phone_error').html('');
        $('#phone_error').html(phone_error);
       }
       else
       {
        phone_error = "";
        $('#phone_error').html('');
       }

       if(!address1)
       {
        address1_error = "address1 Name is reuired";
        $('#address1_error').html('');
        $('#address1_error').html(address1_error);
       }
       else
       {
        address1_error = "";
        $('#address1_error').html('');
       }

       if(!address2)
       {
        address2_error = "address2 Name is reuired";
        $('#address2_error').html('');
        $('#address2_error').html(address2_error);
       }
       else
       {
        address2_error = "";
        $('#address2_error').html('');
       }
       if(!city)
       {
        city_error = "city Name is reuired";
        $('#city_error').html('');
        $('#city_error').html(city_error);
       }
       else
       {
        city_error = "";
        $('#city_error').html('');
       }
       if(!state)
       {
        state_error = "state Name is reuired";
        $('#state_error').html('');
        $('#state_error').html(state_error);
       }
       else
       {
        state_error = "";
        $('#state_error').html('');
       }
       if(!country)
       {
        country_error = "country Name is reuired";
        $('#country_error').html('');
        $('#country_error').html(country_error);
       }
       else
       {
        country_error = "";
        $('#country_error').html('');
       }
       if(!pincode)
       {
        pincode_error = "pincode Name is reuired";
        $('#pincode_error').html('');
        $('#pincode_error').html(pincode_error);
       }
       else
       {
        pincode_error = "";
        $('#pincode_error').html('');
       }

       if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '' )
       {
             return false;
       }
       else
       {

        var data={
            'firstname':firstname,
            'lastname':lastname,
            'email':email,
            'phone':phone,
            'address1':address1,
            'address2':address2,
            'city':city,
            'state':state,
            'country':country,
            'pincode':pincode
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            

        $.ajax({
            url: '/proceed-to-pay',
            method:'POST',
            data:{
                'firstname':firstname,
                'lastname':lastname,
                'email':email,
                'phone':phone,
                'address1':address1,
                'address2':address2,
                'city':city,
                'state':state,
                'country':country,
                'pincode':pincode    
       },
        success: function(response){
            // alert(response.total_price);
            var options = {
                "key": "rzp_test_AEcLE1xlXUI02m", // Enter the Key ID generated from the Dashboard
                "amount": 1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": response.firstname+' '+response.lastname,
                "description": "Thanku To choosing us",
                // "image": "https://example.com/your_logo",
                // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                "handler":function (response1)
                {
                    // alert(response1.razorpay_payment_id);

                    $.ajax({
                        type: "POST",
                        url: "/place-order",
                        data: {
                            'fname':response.firstname,
                            'lname':response.lastname,
                            'email':response.email,
                            'phone':response.phone,
                            'address1':response.address1,
                            'address2':response.address2,
                            'city':response.city,
                            'state':response.state,
                            'country':response.country,
                            'pincode':response.pincode,
                            'payment_mode':"Paid By Razorpay",
                            'payment_id':response1.razorpay_payment_id,
                        },
                        success: function(response2){
                        //   alert(response2.status);
                        swal(response2.status);
                        window.location.href="/my-orders";
                        }
                   });


                },
                "prefill": {
                    "name": response.firstname+' '+response.lastname,
                    "email": response.email,
                    "contact": response.phone
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
                rzp1.open();
           }
        });
    }
    });
});



//     $(document).ready(function(){
//     $('.delete-cart-item').click(function(e){
//         e.preventDefault();
//         alert("chandan");
//         var prod_id = $(this).closest('.product_data').find('.prod_id').val();
//         alert(prod_id);
      
//     });
//     $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// $.ajax({
//        type: "POST",
//        url: "delete-cart-item",
//        data: {
//         'prod_id':prod_id,
//        },
//        success: function(response){
//          console.log(response.status);
//        }
//   });
    
// });

    







    $(document).ready(function(){
    $('.increment-btn').click(function(e){
        e.preventDefault();
        var inc_value = $('.qty-input').val();
        var value=parseInt(inc_value,10);
        var value=isNaN(value) ? 0: value;
        if(value<10)
        {
            value++;
            $('.qty-input').val(value);
        }

    });
    $('.decrement-btn').click(function(e){
        e.preventDefault();
        var dec_value = $('.qty-input').val();
        var value=parseInt(dec_value,10);
        var value=isNaN(value) ? 0: value;
        if(value >1)
        {
            value--;
            $('.qty-input').val(value);
        }
    });
});

    

    $(document).ready(function(){
    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
       type: "POST",
       url: "/addToCart",
       data: {
        'product_id' : product_id,
        'product_qty' : product_qty,
       },
       success: function(response){
         console.log(response.status);
       }
  });
    });
    });





// if(session('status'))
// {
//   swal({
//   title: "Good job!",
//   text: "{{session('status')}}",
//   icon: "success",
//   button: "Aww yiss!",
// });
// }



$(document).ready(function(){
    $('#press').click(function(e){
        e.preventDefault();
        swal({
              title: "Good job!",
              text: "Product Added to cart !",
              icon: "success",
              button: "Aww yiss!",
            });
    });
});

$(document).ready(function(){
    $('.whishlist').click(function(e){
        e.preventDefault();
        swal({
              title: "Good job!",
              text: "Product Added to whishlist !",
              icon: "success",
              button: "Aww yiss!",
            });
    });
});

$(document).ready(function(){
    $('#cod').click(function(e){
        e.preventDefault();
        swal({
            title: "Thank You To Order ! Have a Good Day!",
            text: "Your Order has been placed Successfully !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Your Order has been placed Successfully !", {
                icon: "success",
              });
            } else {
              swal("Your Order not Placed!");
            }
          });
          
    });
});
$(document).ready(function(){
    $('.whishlist').click(function(e){
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        // alert(prod_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        $.ajax({
               type: "POST",
               url: "/addwhishlist",
               data: {
                'prod_id' : prod_id,
               },
               success: function(response){
                console.log("response.success");
               }
               
          });
    });
});



  

$('.delete-cart-item').click(function(e){
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
   type: "POST",
   url: "/delete-cart-item",
   data: {
    'prod_id' :prod_id,
   },
   success: function(response){
    window.location.reload();
     swal(response.status);
   }
});

});


$('.delete-whistlist-item').click(function(e){
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
   type: "POST",
   url: "/delete-whistlist-item",
   data: {
    'prod_id' :prod_id,
   },
   success: function(response){
    window.location.reload();
     swal(response.status);
   }
});

});

    
$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#search_product" ).autocomplete({
      source: availableTags
    });
  } );