<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script> -->
  <!-- <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
  </script> -->

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

  <!-- Facebook -->
  <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="BootstrapDash">

  <title>Password Recovery</title>

  <!-- vendor css -->
  <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
  <!-- azia CSS -->
  <link rel="stylesheet" href="../css/azia.css">
  <!-- toastr css -->
  <link href="../lib/jquery-toastr/toastr.min.css" rel="stylesheet">

</head>

<body class="az-body">

  <div class="az-signin-wrapper">
    <div class="az-card-signin">
      <h1 class="az-logo">az<span>i</span>a</h1>
      <div class="az-signin-header">
        <h2>Forgot password!</h2>
        <h4>Please enter the registered email</h4>

        <form action="../php/recovery.php" method="post" id="recovery-form">
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="email" id="email">
          </div><!-- form-group -->
          <button class="btn btn-az-primary btn-block" type="submit" id="submit">Submit</button>
        </form>

      </div><!-- az-signin-header -->
      <div class="az-signup-footer">
        <p>Already have an account? <a href="page-signin.php">Sign In</a></p>
        <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
      </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
  </div><!-- az-signin-wrapper -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/ionicons/ionicons.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../js/azia.js"></script>
  <script src="../lib/jquery-toastr/toastr.min.js"></script>
  <script src="../js/custom/aks.js"></script>
  <script>
    $(function() {
      'use strict'

    });
  </script>

  <?php
    session_start();
  if (isset($_SESSION['emailErr'])) {
  ?>
    <script>
      $(document).ready(function() {
        toastr.error("<?php echo $_SESSION['emailErr']; ?>", '*Email', {
          closeButton: true,
          progressBar: true,
          preventDuplicates: true,
        });
      });
    </script>
  <?php
    unset($_SESSION['emailErr']);
  }
  ?>
</body>

</html>