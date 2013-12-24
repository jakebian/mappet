<!DOCTYPE HTML>

<html lang="en">
<head>
<meta charset="utf-8">
<title>MINIMAL</title>
</head>
<body>

<div class="container">
   <h1>Change this picture!</h1>
   <img id="image-target" src="http://blog.gettyimages.com/wp-content/uploads/2013/01/Siberian-Tiger-Running-Through-Snow-Tom-Brakefield-Getty-Images-200353826-001.jpg">

   <?php include("upload-markup.php") ?>
   
</div>

<?php
    include ("file-upload-res.php");
?>

<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {

    var url ='file-upload/server/php/';
    function successCall(index,file,data){
        $('#image-target').attr('src',file.url);
        $('#files').fadeOut();
    }
    initUpload(url,successCall);


});
</script>
</body> 
</html>
