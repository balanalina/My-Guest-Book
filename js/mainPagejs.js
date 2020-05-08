
$(document).ready(function(){
	//add new comment 
	$("#submitButton").click(function(){
		var author = $("#fauthor").val();
		var title = $("#ftitle").val();
		var comment = $("#fcomment").val();
    	$.post('php/addComment.php',{author: author,title: title, comment: comment},function(){
    		alert("Submitted!");
    	}).always(function(){
    		$("#response").fadeIn().delay(3000).fadeOut();
    	});;
    	$("#response").fadeIn().delay(3000).fadeOut();	
    });
    //login as admin and get to the admin page if the information is correct
	$("#loginButton").click(function(){
		var user = $("#fuser").val();
		var password = $("#fpassword").val();
		if(user == "admin" && password == "admin")
			window.location.replace("http://localhost/GuestBook/adminPage.html");
		else{
			$("#response2").fadeIn().delay(3000).fadeOut();
   			$("#fuser").val("");
   			$("#fpassword").val("");
		}
	});
});

