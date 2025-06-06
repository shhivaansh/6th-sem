<?php
$filename="data.txt";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $text=$_POST["text"];

    $file=fopen($filename,"w");
    fwrite($file,$text);
    fclose($file);
}

$content="";
if(file_exists($filename)){
    $file=fopen($filename,"r");
    $content=fread($file,filesize($filename));
    fclose($file);
}
?>


<h2>Write to File</h2>
<form method="post">
    <textarea type="text"><?php echo htmlspecialchars($content); ?></textarea> <br><br>
    <button type="submit">Save to File</button>
</form>

<h2>Read from File</h2>
<p><strong>File Content:</strong></p>
<pre><?php echo htmlspecialchars($content); ?></pre>