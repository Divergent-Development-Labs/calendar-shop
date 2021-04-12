<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<div class="container-fluid">
  <h3>Tabs</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#1" data-toggle="pill">Menu 1</a></li>
    <li><a href="#2" data-toggle="pill">Menu 2</a></li>
    <li><a href="#3" data-toggle="pill">Menu 3</a></li>
  </ul>
  <br>

  <div class="tab-content">
	    <div class="tab-pane fade" id="1">  1 </div>
	    <div class="tab-pane fade" id="2">  2 </div>
        <div class="tab-pane fade" id="3">  3 </div>
  </div>
  <p><strong>Note:</strong> This example shows how to create a basic navigation tab. It is not toggleable/dynamic yet (you can't click on the links to display different content)- see the last example in the Bootstrap Tabs and Pills Tutorial to find out how this can be done.</p>
</div>


</body>
</html>