<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OpenLibrary - <?=$page_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=$baseurl?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$baseurl?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=$baseurl?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$baseurl?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=$baseurl?>dist/css/skins/skin-blue.min.css">
  
  <!-- Custom CSS -->
  <?php if (isset($base_css)): foreach ($base_css as $css): ?>
    <link rel="stylesheet" href="<?php echo $css ?>">
  <?php endforeach; endif; ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-collapse">
<div class="wrapper">

  <?= $this->insert('sections::header', ['baseurl' => $baseurl]) ?>
  <?= $this->insert('sections::left-side', ['baseurl' => $baseurl]) ?>
  <?= $this->section('content') ?>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      BETA VERSION
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Open Library</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?=$baseurl?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$baseurl?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$baseurl?>dist/js/adminlte.min.js"></script>

<!-- Customs JS -->
<?php if (isset($base_js)): foreach ($base_js as $js): ?>
  <script src="<?php echo $js ?>"></script>
<?php endforeach; endif; ?>

<script>
<?php if (isset($custom_js)){ echo $custom_js; }?>
</script>

</body>
</html>