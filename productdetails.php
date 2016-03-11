<?php include('database.php');?>
<?php include('header.php');?>
<?php 
	$results = mysql_query("SELECT COUNT(*) as cnt FROM productstore");
	$row=mysql_fetch_array($results);
	$total_records=$row['cnt'];
	$total_groups = ceil($total_records/12);
	//echo 'total_groups'.$total_groups;
?>
<script>
	var total_groups = '<?php echo $total_groups; ?>';
	//console.log(total_groups);
</script>
<script type="text/javascript" src="/assets/dest/js/common.js"></script>
<style>
a {
border:none;
outline:none;
text-decoration:none;
color:#606366;
-webkit-transition:all .2s ease-in-out;
-moz-transition:all .2s ease-in-out;
-o-transition:all .2s ease-in-out;
-ms-transition:all .2s ease-in-out;
transition:all .2s ease-in-out
}

i {
-webkit-transition:all .2s ease-in-out;
-moz-transition:all .2s ease-in-out;
-o-transition:all .2s ease-in-out;
-ms-transition:all .2s ease-in-out;
transition:all .2s ease-in-out
}

a:active,a:hover {
text-decoration:none;
color:#000
}
</style>
</head>
<body>
	<?php include('menu.php');?>
     <div id="register">
    	<?php include('register.php');?>                       
    </div>
</body>
</html>