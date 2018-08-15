<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('insert/file_post');?>

<input type="hidden" name="ksens" value="1" readonly="readonly"/>
<input type="file" name="file" size="20"  />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
