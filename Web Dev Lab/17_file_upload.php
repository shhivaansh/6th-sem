<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $file=$_FILES["file"];

    if($file["error"]===0){
        $ext=strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
        $size=$file["size"];

        if(in_array($ext,['jpg', 'jpeg', 'png', 'gif']) && $size<=2*1024*1024){
            move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
            echo "File uploade: " . $file["name"];
        }else{
            echo "failed";
        }
    }else{
        echo "Sorry";
    }
}

?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required> <br><br>
    <button type="submit"> Upload</button>
</form>