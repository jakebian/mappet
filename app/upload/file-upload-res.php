<?php 

function getpath($path){
	$app_path="http://localhost/samphire-dev/samphire/app";
	echo $app_path.'/upload/file-upload/'.$path;
}
?>
<link rel="stylesheet" href=<?php getpath("css/bootstrap.css")?> >
<!-- Generic page styles -->
<link rel="stylesheet" href=<?php getpath("css/style.css")?> >
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href=<?php getpath("css/jquery.fileupload.css")?> >

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src=<?php getpath("js/vendor/jquery.ui.widget.js")?>></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src=<?php getpath("js/jquery.iframe-transport.js")?>></script>
<!-- The basic File Upload plugin -->
<script src=<?php getpath("js/jquery.fileupload.js")?>></script>
<!-- The File Upload processing plugin -->
<script src=<?php getpath("js/jquery.fileupload-process.js")?>></script>
<!-- The File Upload image preview & resize plugin -->
<script src=<?php getpath("js/jquery.fileupload-image.js")?>></script>
<!-- The File Upload audio preview plugin -->
<script src=<?php getpath("js/jquery.fileupload-audio.js")?>></script>
<!-- The File Upload video preview plugin -->
<script src=<?php getpath("js/jquery.fileupload-video.js")?>></script>
<!-- The File Upload validation plugin -->
<script src=<?php getpath("js/jquery.fileupload-validate.js")?>></script>

<script src=<?php getpath("js/run.js")?>></script>
