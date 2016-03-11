<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<?php
			/*if($_SESSION['ctype']=='entrepreneur')
			{
				echo "<li class='active'><a href='sendMail.php' >Send Mail</a></li>";
			}*/
			//if($_SESSION['ctype']=='mywing')
			//{
				echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>My Wing <span class='caret'></span></a>";
					echo '<ul class="dropdown-menu" role="menu">';
					echo '<li><a href="uploadImg.php?mtype=Incredible"> Incredible Belgaum </a></li>';
					echo '<li><a href="uploadImg.php?mtype=Unseen"> Unseen Belgaum </a></li>';
					echo '<li><a href="uploadImg.php?mtype=Bday"> Birthday Posts </a></li>';
					echo "</ul>";
				echo "</li>";
			//}
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo ucwords($_SESSION['cname']);?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="userprofile.php" >Profile </a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>                
