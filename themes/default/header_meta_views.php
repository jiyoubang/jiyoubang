<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="<?php echo $header['description'] ?>" name="description">
<meta content="<?php echo $header['keywords'] ?>" name="keywords">
<title><?php echo $header['title'] ?> </title>

<?php $base_url=base_url(); foreach($header['css'] as $value){ ?>
<link href="<?php echo $base_url.$value ?>?v=2014.2.25" rel="stylesheet" type="text/css" />
<?php } ?>

<?php foreach($header['js'] as $value){ ?>
 <script src="<?php echo $base_url.$value ?>?v=2014.2.25" type="text/javascript" ></script>
<?php } ?>

