$(document).ready(function(){
	cat();
	brand();
	product();
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

//$("#user_form").on("submit",function(event){
	$("body").delegate("#user_form","click",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "user2.php",
			method : "POST",
			data : $("#user_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "user_form.php?user2=1";
				}
				else
				{
					$("#user_msg").html(data);
					
				}
				
			}
		})
	})
	//ttyuikjdikhcuhibkjdx
	$("body").delegate("#product_form1","click",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "product1.php",
			method : "POST",
			data : $("#product_form1").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "admin_product?product1=1";
				}
				else
				{
					$("#product_msg").html(data);
					
				}
				
			}
		})
	})
	//oiuytrewertyuioqppppp
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Loading...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})
	$("#login").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
					window.location.href = "profile.php";
				}else if(data == "cart_login"){
					window.location.href = "cart.php";
				}
				else if(data == "admin_success")
				{
					window.location.href = "admin_index.php";
				}
				else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//end

	//Get User Information before checkout
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "login_form.php?login=1";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	$("#forget_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "forget.php",
			method : "POST",
			data : $("#forget_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "Mail_Sent_Successfully") {
					window.location.href = "login_form.php";
				}else{
					$("#forget_msg").html(data);
				}
				
			}
		})
	})
	//dfghjkllkjhgffghj
	//kjhgfghjkljeik
	$("#product_add").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "addproduct1.php",
			method : "POST",
			data : $("#product_add").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "add_success") {
					window.location.href = "admin_product.php";
				}else{
					$("#add_msg").html(data);
					window.location.href = "admin_product.php";
				}
				
			}
		})
	})
	//uyeuiioololoe
     $("#change_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "change.php",
			method : "POST",
			data : $("#change_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "change_success") {
					window.location.href = "profile.php";
				}else{
					$("#change_msg").html(data);
				}
				
			}
		})
	})
	//jhgfdsdjkkjhgfyujhgf
	 $("body").delegate("#khul_form","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "khul.php",
			method : "POST",
			data : {kholde:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="yes")
				{	
			 
				  window.location.href="message3.php";	
				}
				else{
					
                   window.location.href="message3.php";
				}
			}
		})
	})
	 //$("#activate_form").on("",function(event){
    $("body").delegate("#active_form","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {activeuser:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="nikal")
				{
					
				   window.location.href="admin_index.php";	
				}
				else{
					 window.location.href="user_form.php";
				}
			}
		})
	})
	//frghjkl;
	 $("body").delegate("#confirm_form","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {confirmorder:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="activate_success")
				{
				  window.location.href="order1.php";	
				}
				else{
					 window.location.href="order1.php";
				}
			}
		})
	})
	//oiuytreertyuiop
	 $("body").delegate("#not_confirm_form","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {notconfirmorder:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="yes")
				{
				  window.location.href="order1.php";	
				}
				else{
					 window.location.href="order1.php";
				}
			}
		})
	})
	
	//deleteproduct
	$("body").delegate("#delete_form1","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {deleteproduct1:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="nhi hua bhai")
				{
					
				   window.location.href="admin_product.php?product1=1";	
				}
				else{
					$("#delete_msg").html(data);
					window.location.href="admin_product.php?product1=1";
				}
			}
		})
	})
	//fghjuiueiiid
	//lkjhueuiwiiiwiiwo
	$("body").delegate("#desc_form1","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "edit.php",
			method : "POST",
			data : {descproduct1:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				window.alert(data);
				//window.location.href="admin_product.php?product1=1";	
			}
		})
	})
	//edituser
	 $("body").delegate("#edit_form","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "editprofile.php",
			method : "POST",
			data : {edituser:1,proId:pid},
			success : function(data){
				$('.overlay').hide();
				if(data=="nhi hua bhai")
				{
				   window.location.href=".php";	
				}
				else{
					window.location.href="user_form.php?user2=1";
				}
			}
		})
	})
	//kjhgfdfghjklkjskj
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				if(data=="nhi hua")
				{
				   window.location.href="index.php";	
				}
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})
	
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}
	//Count user cart items funtion end

	//Fetch Cart item from Database to dropdown menu
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	}

	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
			
		};
		if(qty<=5)
		{
			$("#cart_msg").html("");
		};
		if(qty>5)
		{
			qty=5;
			$("#cart_msg").html("You can't add more then 5!!");
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);

	})
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeItemFromCart:1,rid:remove_id},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}
	
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);
	}

	
	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})




















