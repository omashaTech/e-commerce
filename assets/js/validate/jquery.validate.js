$(document).ready(function(){
    jQuery("#validateForm").validationEngine();
    $("#validateForm").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
});	

    function getCatMap(catId){
        $("#category").hide();
        $.ajax({ type:"POST", url:"../others/category.php", data:{reqType:"catMap", catId:catId }	})
        .done(function(data){$("#category").show();	$(".catmap").html(data);});	
    }	

    function delCat(catid){
        var del = confirm("Do You Really Want To Delete this Category?")
        if (del==true) {
            $.ajax({	type:"POST",	url:"../others/category.php",	data:{reqType:'delCat', catid:catid}})
            .done(function(data){if(data){ //alert(data)
            window.location= "category.php"
            }});	
        }
    }

    function delPro(proId,img){
        var del = confirm("Do You Really Want To Delete this Product?")
        if (del==true) {
            $.ajax({	type:"POST",	url:"../others/products.php",	data:{reqType:'delPro', ProId:proId, image:img }})
            .done(function(data){if(data){window.location= "products.php"}});	
        }
    }

    function checkUser(email){
        $("#process").show();
        $('#cross').hide();
        $('#tick').hide();
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'checkEmail', email:email}
        })
        .done(function(data){
            if(data == 1){
                $("#process").hide();
                $('#l_password').focus();
                $('#cross').hide();
                $('#tick').fadeIn();			
            } else{
                $("#process").hide();
                $('#l_email').focus();
                $('#tick').hide();
                $('#cross').fadeIn();
            }
        });
    }

    function forgetPassword(email){
        $(".form").hide();
        $("#process").show();
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'checkEmail', email:email}
        })
        .done(function(data){
            if(data == 1){
                $("#process").hide();
                $(".form").show();
                $('#f_email').css('border', '3px #090 solid');
            } else{
                $("#process").hide();
                $(".form").show();
                $("#f_email").focus();
                $('#f_email').css('border', '3px #FF0000 solid');
            }
        });
    }

    function checkUserExist(email){
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'checkEmail', email:email}
        })
        .done(function(data){
            if(data == 1){
                $('#b_email').focus();			$('#b_email').css('border', '3px #C33 solid');	
                $('#msg').css('color','red');	$('#msg').html('Already Exists in Database !! Please Login to Continue..');
                $('#msg').show();
            } else{
                $('#b_email').css('border', '3px #096 solid');
                $('#b_pass').focus();
                $('#msg').hide();
            }
        });
    }

    function addCart(proId){
        var order = document.getElementById("order");
        var quantity = 1;
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'addCart', prodId:proId, order:quantity}
        })
        .done(function(data){
            window.location = 'cart.php';
        });
    }
    function removeCart(proId){
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'removeCart', prodId:proId}
        }).done(function(data){
            window.location = 'cart.php';
        });
    }
    function updateCart(proId,quantity){
        $.ajax({ 
            type:"POST", url:"response.php", data:{reqType:'updateCart', prodId:proId, order:quantity}
        }).done(function(data){
            window.location = 'cart.php';
        });
    }