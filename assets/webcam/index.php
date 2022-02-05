<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="java.js"></script>
    <script src="webcam.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Camera Webcam - Ujicoba v.02</h1>
   
    <form method="POST" action="simpan.php">
        <div class="row">
            <div class="col-md-3">      
                <div class="panel panel-primary bg-blanck">
                  <div class="panel-heading">
                    <h3 class="panel-title">Camera Webcam</h3>
                  </div>
                  <div class="panel-body">
                    <center><div id="my_camera"></div>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="gambar" class="image-tag">
                        <input type="hidden" name="nama" class="image-tag" value='coba-saja'></center>
                    </div>
                  </div>
                </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Hasil Camera Webcam</h3>
                  </div>
                  <div class="panel-body" style="padding-left: ">
                    <div id="results">Your captured image will appear here...</div>
                  </div>
                </div>
                
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
      // live preview size
      width: 300,
      height: 230,
      
      // device capture size
      dest_width: 300,
      dest_height: 230,
      
      // final cropped size
      crop_width: 184,
      crop_height: 230,
      
      // format and quality
      image_format: 'jpeg',
      jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>