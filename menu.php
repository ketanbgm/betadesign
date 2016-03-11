
	<div id="header">
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.php" id="logo"><img src="assets/dest/images/logo.png" alt=""></a>
				</div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->

		<div class="header-bottom">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index.php">Store</a></li>
						<li><a href="/adminpanel/index.php">Sign In</a></li>
						<li><a ><span onClick="getRegisterModal('1')" style="margin-left:-5px; cursor:pointer;" class="registersignin">Register</span></a>
                        </li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
    <script type="text/javascript">
		
		function getRegisterModal(val)
		{
			if(val=='1')
				//$("#ContactModal").modal('hide');
			$("#RegisterModal").modal('show');	
		}
		
	</script>