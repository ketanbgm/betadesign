<?php include('database.php');?>
<?php include('header.php');?>
</head>
<body>
	
	<?php include('menu.php');?>
    <div id="buy">
       <?php include('buy.php');?>                       
    </div>
     <div id="register">
       <?php include('register.php');?>                       
    </div>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product</h6>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container" style="min-height:500px;">
		<div id="content">
			<div class="row">
				<!--<div class="col-sm-9">-->
				<div>

					<div class="row">
                    <?php
						$id='';
						if(isset($id))
						{
							$id=$_GET['id'];
						}
						$sql="SELECT * FROM productstore WHERE pid='".$id."'";
						$res=mysql_query($sql);
						$cnt=mysql_num_rows($res);
						if($cnt>0)
						{
							while($row=mysql_fetch_array($res))
							{
								$pid=$row['pid'];
								$pname=$row['pname'];
								$pimgname=$row['pimgname'];
								$pcolor=$row['pcolor'];
								$pprice=$row['pprice'];
								$pcategory=$row['pcategory'];
								$pdesigner=$row['pdesigner'];
								$dnumber=$row['dnumber'];
								$pdescription=$row['pdescription'];
								
								echo "<div class='col-sm-4'>";
									echo "<img src='/server/".$pimgname."' alt='product'>";
								echo "</div>";
								
								echo "<div class='col-sm-8'>";
								echo "<div class='single-item-body'>";
									echo "<p class='single-item-title'><b>".$pname."</b></p>";
									echo "<p class='single-item-price'>";
										echo "<span>Rs.".$pprice."</span>";
									echo "</p>";
								echo "</div>";
	
								echo "<div class='clearfix'></div>";
								echo "<div class='space20'>&nbsp;</div>";
	
								echo "<div class='single-item-desc'>";
									echo "<p style='text-align:justify;'>".$pdescription."</p>";
									
								echo "</div>";
								echo "<div class='single-item-desc'>";
								echo "</br>";
								echo "Mobile Number:";
								echo "<b>".$dnumber."</b>";
								echo "<br/><br/><input type='button' name='buy' id='buy' value='Buy' class='btn btn-success' onclick='getBuyModal(1)'/>";
								echo "</div>";
								
							echo "</div>";
							}
						}
					?>
					</div>

                        <?php 
							if(isset($id))
							{
								$id=$_GET['id'];
							}
							$sql="SELECT * FROM accessories WHERE pid=".$id."";
							$res=mysql_query($sql);
							$cnt=mysql_num_rows($res);
							if($cnt>0)
							{
								echo "<hr/>";
								echo "<div class='beta-products-list'>";
									echo "<h4>Related Accesories</h4>";
			
									echo "<div class='row'>";
                        
								while($row=mysql_fetch_array($res))
								{
									$aid=$row['aid'];
									$aname=$row['aname'];
									$aimgname=$row['aimgname'];
									$aprice=$row['aprice'];
									//$adiscription=$row['adiscription'];
									
									//<div class="col-sm-4">
									echo "<li style='float:left; list-style:none;padding-bottom:20px;' class='single-item'>";
										echo "<div class='single-item-header'>";
											echo "<a href='#'><img src='server/".$aimgname."' alt='' style='height:270px; width:270px;'></a>";
										echo "</div>";
										echo "<div class='single-item-body'>";
											echo "<p class='single-item-title' align='center'><b>".$aname."</b></p>";
											echo "<p class='single-item-price' align='center'>";
												echo "<span>Rs.".$aprice."</span>";
											echo "</p>";
										echo "</div>";
										/*echo "<div class='single-item-caption'>";
											echo "<a class='add-to-cart pull-left' href='#'><i class='fa fa-shopping-cart'></i></a>";
											echo "<a class='beta-btn primary' href='#'>Details <i class='fa fa-chevron-right'></i></a>";
											echo "<div class='clearfix'></div>";
										echo "</div>";
										echo "</div>";*/
									echo "</li>";
									
								}
									echo "</div>";
								echo "</div>";
							}
						?>
                        
                        <?php if(isset($id))
						{
							$id=$_GET['id'];
						}
						$sql="SELECT * FROM styling WHERE pid=".$id."";
						$res=mysql_query($sql);
						$cnt=mysql_num_rows($res);
						if($cnt>0)
						{
							echo "<hr/>";
							echo "<h4>Styling</h4>";
							while($row=mysql_fetch_array($res))
							{  
								$styleid=$row['styleid'];
								$stylename=$row['stylename'];
								$styledescrp=$row['styledescrp'];
								echo "<div style='width:100%;'> <b>".$stylename."</b><p style='text-align:justify; width:80%;'>".$styledescrp."</p></div>";
							}
						}
						?>
				</div>
				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
    
   <script type="text/javascript">
		
		function getBuyModal(val)
		{
			if(val==1)
				//$("#ContactModal").modal('hide');
			$("#buyModal").modal('show');	
		}
		
   </script>
    
<?php include('footer.php');?>