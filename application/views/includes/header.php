<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>IT Support System</title>

    <!-- Bootstrap -->

    <link href="<?PHP echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?PHP echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <link href="<?PHP echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
      

      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

      <!-- bootboxjs -->
      <script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>

      <!--pnotify-->
      <link href="<?php echo base_url('assets/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
      <script src="<?php echo base_url('assets/pnotify/jquery.pnotify.js') ?>"></script>

  </head>
  <body>

      <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ITSupport</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class=""><a href="home">เหตุ<span class="sr-only">(current)</span></a></li>
            <li><a href="inform">แจ้งซ่อมบำรุง</a></li>
        </ul>
        
        <div class="col-lg-3">
            <div class="input-group">
              <input type="text" id="myInput" class="form-control" placeholder="Search for..." onkeyup="myFunction()">
              <span class="input-group-btn">
                <button class="btn btn-Info" type="button">Go!</button>
            </span>
        </div>
    </div>

    <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Logout <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout">Log out</a></li>
           
        </ul>
    </li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


<?php
    // $Lid = $this->session->userdata('Lid');
    // if ($Lid == "") {
    //     header("Refresh : 1;url = http://crruinter.crru.ac.th/inter_2014/site/dashboard");
    //     echo "<center><h3>Please Login Wait 3 seconds </h3></center>";
    //     echo "</body></html>";
    //     exit;
    // }
?>

<div class="container">
    <div class="row">

<div id="showData">
</div>



