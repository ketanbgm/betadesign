<?php
	require_once('database.php');

	include('resize-class.php');
	if(isset($_FILES))
	{
		$name=$_FILES['inc_photo']['name'];
		$id=$_REQUEST['img_id'];
		$mtype=$_REQUEST['mtype'];
		
		$newname=$id.'='.$name;
		if($mtype == 'Incredible')
		{
			$img_path="mywing/incrediblebgm/".$newname;
			$img_resize="mywing/incrediblebgm/650x450/".$newname;
			$img_thumnail='mywing/incrediblebgm/thumbnails/'.$newname;
		}
		else if($mtype == 'Unseen')
		{
			$img_path="mywing/unseenbgm/".$newname;
			$img_resize="mywing/unseenbgm/650x450/".$newname;
			$img_thumnail='mywing/unseenbgm/thumbnails/'.$newname;
		}
		else if($mtype == 'Bday')
		{
			$img_path="mywing/bdayphotos/".$newname;
			$img_resize="mywing/bdayphotos/650x450/".$newname;
			$img_thumnail='mywing/bdayphotos/thumbnails/'.$newname;
		}
		
		$tmpname=$_FILES['inc_photo']['tmp_name'];
		$temp = explode(".", $_FILES["inc_photo"]["name"]);
		$allowedExts = array("jpeg","jpg","png","gif");
		
		$extension = end($temp);
		
		//echo"img_path".$img_path;die();
		if(in_array($extension,$allowedExts))
		{
			if(move_uploaded_file($tmpname,$img_path))
			{
				$arr['upload']['filename']=$newname;
				$resize = new resize($img_path);
				$resize->resizeImage(273,190,'auto');
				$resize->saveImage($img_thumnail,80);
				
				$arr['upload']['filename']=$newname;
				$resize = new resize($img_path);
				$resize->resizeImage(650,450,'auto');
				$resize->saveImage($img_resize,100);
				unlink($img_path);
			}
		}
		header('location:uploadImg.php?mtype='.$mtype);
	}
?>