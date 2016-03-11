<div class="widget">
		<h3 class="widget-title">Designers</h3>
		<div class="widget-body">
			<ul class="list-unstyled">
				<?php 
				$sql="SELECT distinct(pdesigner) FROM productstore";
				$res=mysql_query($sql);
				$cnt=mysql_num_rows($res);
				$i=1;
				if($cnt>0)
				{
					while($row=mysql_fetch_array($res))
					{
						//$pid=$row['pid'];
						$pdesigner=$row['pdesigner'];
						if($pdesigner != '')
						{
							echo "<li>";
								echo "<input class='designer' type='checkbox' name='designer' id='".$i."' value='".strtoupper($pdesigner)."' onchange='loadData()'>";
								echo "<label for='".$i."'><span></span>".strtoupper($pdesigner)."</span></label>";
							echo "</li>";
						}
						$i++;
					}
				}
				?>		
			</ul>
		</div>
	</div> <!-- brands widget -->