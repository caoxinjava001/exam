<?php 
//$url = 'images/'.time()."_".$_FILES['upload']['name'];
$now_time = time();
$year = date("Y",$now_time);
$month = date("m",$now_time);
$day = date("d",$now_time);
$real_path_one = "/home/upload_159jh_com/pic/cfk_upload";
$real_path_two = "/".$year."/".$month."/".$day."/";
$path_val = $real_path_one.$real_path_two;
$exec_path="mkdir -p $path_val";
@exec($exec_path);

$show_real_val = $real_path_two.$now_time."_".md5($_FILES['upload']['name']).".jpg";
$url = $path_val.$now_time."_".md5($_FILES['upload']['name']).".jpg";


 //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
       $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
      $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
     
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
     // $url = "../" . $url;
    }
 
$funcNum = $_GET['CKEditorFuncNum'] ;
$url = 'http://pic001.yduedu.com'.$show_real_val;
echo "<script type='text/javascript'>document.domain='yduedu.com';window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
?>
