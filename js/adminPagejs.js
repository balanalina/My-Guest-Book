$(document).ready(function(){
	loadData();
	//function to load the paged data
	function loadData(page){
	$.ajax({
		url:"php/pagination.php",
		method:"POST",
		data:{page:page},
		success:function(data){
           $("#paginationData").html(data);
			}
		});
    }
    //change the page for data 
	$(document).on('click','.paginationLabel',function(){
		var page = $(this).attr("id");
		loadData(page);
	});
	//select a row of data
	$(document).on('click','.row',function(){
		//take the authorid of the comment,which i conteint in the id of the row
		var id = $(this).attr('id');
		//load the options for the row
		$(".delmod").html('<p id="child">Delete</p><p id="child1">Modify</p><textarea id="fauthor">newMail</textarea><textarea id ="ftitle">newTitle</textarea><textarea id="fcomment">newComment</textarea>');
		//the options dissaper if to much passes without action
		$(".delmod").fadeIn().delay(7000).fadeOut();;
		//make the options color red when hovered on
		$("#child").hover(function(){
				$(this).css({'color':'red'});
			},function(){
				$(this).css({'color':'black'});
			});
		$("#child1").hover(function(){
				$(this).css({'color':'red'});
			},function(){
				$(this).css({'color':'black'});
			});
		//delete the comment
		$("#child").click(function(){
			$.post('php/deleteComment.php',{id:id},function(data){
				$(".delmod").html(data);
				loadData();
				$(".delmod").css({'dispaly':'none'});
				$(".delmod").delay(3000).fadeOut();
			});
		})
		//update the comment
		$("#child1").click(function(){
			var newMail=$("#fauthor").val();
			var newTitle=$("#ftitle").val();
			var newComment=$("#fcomment").val();
			$.post('php/updateComment.php',{newMail:newMail,newTitle:newTitle,newComment:newComment,id:id},function(data){
				$(".delmod").html(data);
				loadData();
				$(".delmod").css({'dispaly':'none'});
				$(".delmod").delay(3000).fadeOut();
			});
	    });
	});

});