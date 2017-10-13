<?php
  require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<!--sa poip up-->


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="max-age=0" />

<title>search patient</title>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "labsearch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>
<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
	}
	.content{
		width:900px;
		margin:0 auto;
	}
	#searchid
	{
		width:200px;
		border:solid 1px #000;
		padding:10px;
		font-size:12px;
	}
	#result
	{
		position:absolute;
		width:200px;
		padding:10px;
		display:none;
		margin-top:1px;
		border-top:0px;
		overflow:hidden;
	
		background-color: white;
	}
	.hover { 
    background-color: yellow;
}
	.show
	{
		padding:10px; 
		
		font-size:10px; 
		height:20px;
	}
	
}
	.show:hover
	{
		background:white;
		
		cursor:pointer;
	}
</style>
</head>

<body>
	<body style="text-transform:capitalize;left:10%;">
	<?php include('navfixedd.php');?>

<div class="content">
<input type="text" class="search" id="searchid" placeholder="Enter Name or OPD No" />&nbsp; &nbsp; <br /> 
<div id="result">
</div>
</div>
</body>
</html>
