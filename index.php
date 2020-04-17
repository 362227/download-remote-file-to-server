<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="RemoteDownloader>
  <meta name="author" content="WinSub.kr">
  <meta name="theme-color" content="#D8D8D8">
  <title>download-remote-file-to-server</title>
  <link href="https://cdn.winsub.kr/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' type='text/css' href="https://cdn.winsub.kr/default.css">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<center>
<p class="drag">download-remote-file-to-server</p>
<div class="container">
    <div class="col-lg-8 mx-auto">
<form method="post">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">URL</span>
  </div>
  <input type="text" class="form-control" placeholder="URL" name="url" aria-label="Username" aria-describedby="basic-addon1">
</div>
<input name="submit" class="btn btn-dark btn-block" type="submit" value="다운로드"> <br>
<input name="submit" id="btn1" class="btn btn-dark btn-block" type="submit" value="<?php echo $_SERVER['SERVER_NAME']; $uri= $_SERVER['REQUEST_URI']; echo $uri."files/파일이름"; ?> 복사">
<a href="files">다운받은 폴더이동</a>
</form>



<script>
function copyToClipboard(val) {
  var t = document.createElement("textarea");
  document.body.appendChild(t);
  t.value = val;
  t.select();
  document.execCommand('copy');
  document.body.removeChild(t);
}
$('#btn1').click(function() {
  copyToClipboard('<?php echo $_SERVER['SERVER_NAME']; $uri= $_SERVER['REQUEST_URI']; echo $uri."files/파일이름"; ?>');
  alert('<?php echo $_SERVER['SERVER_NAME']; $uri= $_SERVER['REQUEST_URI']; echo $uri."files/파일이름"; ?>');
});
</script>

</div></div>

<?php

// 최대 실행시간 (초단위)
set_time_limit (24 * 60 * 60);

if (!isset($_POST['submit'])) die();

// 저장할 폴더
$destination_folder = 'files/';

$url = $_POST['url'];
$newfname = $destination_folder . basename($url);

$file = fopen ($url, "rb");
if ($file) {
  $newf = fopen ($newfname, "wb");

  if ($newf)
  while(!feof($file)) {
    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
  }
}

if ($file) {
  fclose($file);
}

if ($newf) {
  fclose($newf);
}

?>

</center>
<!-- WinSubCDN -->
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

  </body>
  </html>
