<?php
$msg='';
if(isset($_POST['submit']))
{

        $filename=$_FILES['image']['name'];
        //$ext=end(explode('.',$filename));
        //if($ext=='jpg'||$ext=='png'||$ext=='gif'||$ext=='bmp')
        //{
		$filename=time().$filename;
        $savepath='./images_books/'.$filename;
        $isuploaded=move_uploaded_file($files['image']['tmp_name'],$savepath);
         if ($isuploaded)
        {$msg='image uploaded';}
         else
         {$msg='some error';}
         echo $msg;
         //}
      
         
         
