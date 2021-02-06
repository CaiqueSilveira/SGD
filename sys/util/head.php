<?php 
  $nomePage = $_SERVER['PHP_SELF'];
       if($nomePage === '/sgd/sys/view/index.php')
            include "secure.php"; 
      else
            include "../secure.php";
       protegePagina();
  ?>
<head>
    <meta charset="UTF-8" />
    <title>SGD | Sistema de Gerenciamento Dívidas</title>
    <link rel="shortcut icon" href="/sgd/sys/bootstrap/img/logo_tj.png"" type="image/x-icon" />

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- bootstrap 3.0.2 -->
    <link href="/sgd/sys/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/sgd/sys/bootstrap/css/load.css" rel="stylesheet" type="text/css" />
    <!-- jquery ui -->
    <link href="/sgd/sys/bootstrap/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/sgd/sys/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="/sgd/sys/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="/sgd/sys/bootstrap/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="/sgd/sys/bootstrap/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="/sgd/sys/bootstrap/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="/sgd/sys/bootstrap/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/sgd/sys/bootstrap/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/sgd/sys/bootstrap/css/option.css" rel="stylesheet" type="text/css" />
    <link href="/sgd/sys/bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/sgd/sys/bootstrap/dist/css/AdminLTE.min.css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/sgd/sys/bootstrap/dist/css/skins/_all-skins.min.css" />
    <!-- jQuery 3 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="/sgd/sys/bootstrap/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="/sgd/sys/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/1.5.2/raphael-min.js"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <!-- jvectormap -->
    <script src="/sgd/sys/bootstrap/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="/sgd/sys/bootstrap/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="/sgd/sys/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="/sgd/sys/bootstrap/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- AdminLTE App -->
    <script src="/sgd/sys/bootstrap/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/dist/js/adminlte.min.js"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/typeahead/bootstrap-typeahead.min.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/typeahead/jquery.mockjax.js" type="text/javascript"></script>
    <script src="/sgd/sys/bootstrap/js/plugins/sweetalert.min.js"></script>
</head>
