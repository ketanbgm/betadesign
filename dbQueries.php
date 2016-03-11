<?php
include('database.php');
//echo"hi";die();
//function getRecipeDetails()
//{
	$items_per_group=12;
	$group_number=$_POST['group_number'];
	$designer=$_POST['designer'];
	$category=$_POST['category'];
	$occasion=$_POST['occasion'];
	//$scolor=$_POST['scolor'];
	$sheight=$_POST['sheight'];
	$size=$_POST['size']; //echo"size". $size;
	$price=$_POST['price'];
	$complexion=$_POST['complexion'];
	$gender=$_POST['gender'];
	//$range=array();
	$range = explode("-", $price); //print_r($range);
	//$range = preg_split( "- -", $price ); //print_r($range);die();
	//$start=explode("$",$range); print_r($start);die();
	//$pstart[1]='';$pend[1]='';
	for($i=0;$i<count($range);$i++) 
	{
		$start=$range[0];
		$pstart=explode("Rs",$start); 
		$pstart[1]; //print_r($pstart[1]);die();
		
		$end=$range[1]; //print_r($end);die();
		$pend=explode("Rs",$end); //print_r($pend);
		$pend[1]; //print_r($pend[1]); //die();
		//echo $pend[0][1]; die();
	}
	
	/*$start=explode("$",$range[0]);
	$end=explode("$",$range[1]);*/ //print_r($pstart[1]);
	//echo $$pstart[1];die();
	//echo $pend[1];die();
	$position = ($group_number * $items_per_group);
	//$html='';
	$sql = "SELECT DISTINCT(p.pid),p.pdesigner,pimgname,pname,pprice FROM productstore p LEFT JOIN occassion o ON p.pid=o.pid LEFT JOIN dsize s ON p.pid=s.pid LEFT JOIN dheight h ON h.pid=p.pid LEFT JOIN
complexion c ON p.pid=c.pid WHERE p.pid is not NULL";

	if($category != 'All')
		$sql=$sql." AND pcategory='".$category."'";
	if($designer != '')
		$sql=$sql." AND p.pdesigner IN ('".$designer."')";
	if($occasion !='')
		$sql=$sql." AND oname IN ('".$occasion."')";	
	if($sheight !='')
		$sql=$sql." AND hname IN ('".$sheight."')";
	if($pstart !='' && $pend!='')
		$sql=$sql." AND pprice BETWEEN ".$pstart[1]." AND ".$pend[1]."";
	if($size!='undefined' && $size!='')
		$sql=$sql." AND s.sname='".$size."'";	
	if($complexion!='undefined' && $complexion!='')
		$sql=$sql." AND c.complexionname='".$complexion."'";
	if($gender != 'Both')
		$sql=$sql." AND gender='".$gender."'";		
	//$sql=$sql." LIMIT $position, $items_per_group";	
	//echo $sql;
	$result = mysql_query($sql);
	$html=NULL;
	//echo $html;die();
	if(mysql_num_rows($result) > 0)
	{
		$html=$html."<ul id='recipes' class='imgblock imgblockrecipe'>";
		$n=0;
		while($row = mysql_fetch_array($result))
		{
			$html=$html."<li style='float:left; list-style:none;padding-bottom:20px;' class='single-item'>";
			$html=$html."<div class='single-item-header'><a href='#' onClick='getProduct(".$row['pid'].");'>";
			$html=$html."<img src='server/".$row['pimgname']."'/>";
			$html=$html."</a></div>";
			$html=$html."<p class='single-item-title' align='center'>".$row['pname']."</p>";
			$html=$html."<p class='single-item-title' align='center'>Rs. ".$row['pprice']."</p>";
			$html=$html."</li>";
		}
		$html=$html."</ul>";
		
	}
	else
	{
		$html="<h4 style='text-align:center;'>No Match Found</h4>";
	}
	echo $html;
	
//}
?>