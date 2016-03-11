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
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9 main-content pull-right">
                    <?php include('slider.php');?>
					
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
							<!--<p class="pull-left">438 styles found | <a href="#">View all</a></p>-->
							<p class="pull-right">
								<span class="sort-by">Sort by Category </span>
								<select name="sortproducts" class="beta-select-primary category" id="category" onChange="loadData('')">
									<option value="All">All</option>
									<option value="Dress">Dress</option>
									<option value="Ghagra">Ghagra</option>
									<option value="Saree">Saree</option>
									<option value="Jeans">Jeans</option>
									<option value="Tops">Tops</option>
									<option value="Kurtis">Kurtis</option>
									<option value="Shirts">Shirts</option>
								</select>
							</p>
							
                            <p class="">
								<span class="sort-by">Sort by Gender </span>
								<select name="sortproducts" class="beta-select-primary category" id="gender" onChange="loadData('')">
									<option value="Both">Both</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									
								</select>
							</p>
                            
						</div>
						<?php
                        	/*$sql="SELECT pimgname,pid FROM productstore";
							$res=mysql_query($sql);
							$cnt=mysql_num_rows($res);$i=0;
							if($cnt>0)
							{
								while($row=mysql_fetch_array($res))
								{
									$pid=$row['pid'];
									$pimgname=$row['pimgname'];
									$imgname=$pid.'='.$pimgname;*/
                        ?>
                         <div id="displayData"></div>
						<!--<div class='row'>
							<div class="col-sm-4 ">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="/server/<?php //echo $imgname; ?>" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>-->
                       
					</div> <!-- .beta-products-list -->

				</div> <!-- .main-content -->

				<div class="col-sm-3 aside">
					<?php include('designer.php');?>
					<?php include('occassion.php');?>
					<?php include('height.php');?>
					
					<div class="widget">
						<h3 class="widget-title">Size</h3>
						<div class="widget-body">
							<div class="beta-tags">
								<a onClick="loadData('S')" style='cursor:pointer;'>S</span></a>
								<a onClick="loadData('M')" style='cursor:pointer;'>M</span></a>
								<a onClick="loadData('L')" style='cursor:pointer;'>L</span></a>
								<a onClick="loadData('XL')" style='cursor:pointer;'>XL</span></a>
								<a onClick="loadData('XXL')" style='cursor:pointer;'>XXL</span></a>
							</div>
						</div>
					</div> <!-- tags cloud widget -->
                    
                    <div class="widget">
						<h3 class="widget-title">Complexion</h3>
						<div class="widget-body">
							<div class="beta-tags">
								<a onClick="loadData('','Fair')" style='cursor:pointer;'>Fair</span></a>
								<a onClick="loadData('','Wheatish')" style='cursor:pointer;'>Wheatish</span></a>
								<a onClick="loadData('','Dark')" style='cursor:pointer;'>Dark</span></a>
							</div>
						</div>
					</div> <!-- complexion -->
                    
					<div class="widget">
						<h3 class="widget-title">Price Range</h3>
						<div class="widget-body">
							<div class="price-filter">
								<div id="price-filter-range"></div>
                                <a href="javascript:void(0)" class="beta-btn primary pull-right" onClick="loadData('')">Filter <i class="fa fa-chevron-right"></i></a>
								<span class="pull-left">Price: <span id="price-filter-amount"></span></span>
								
								<div class="clearfix"></div>
							</div>
						</div>
					</div> <!-- price range widget -->

				</div> <!-- .aside -->
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php include('footer.php');?>