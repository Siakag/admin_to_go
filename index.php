<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
  <meta charset='UTF-8'>
  <title>Robin's Desk - Admin to Go</title>
  <meta description="Robin's Desk provides quality assured onsite and offsite administrative consulting at affordable rates.">
  <meta keywords="denver administrative assistant, Robin's desk, robins-desk, admin to go, offsite administrrative consultant, onsite administrrative consultant">
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <link type='image/x-icon' href='css/favicon.ico' rel='shortcut icon'>
  <link type='image/x-icon' href='css/favicon.ico' rel='icon'>

<!-- css include -->
<?php
    include('includes/css.html');
?>

  <!-- GA code -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46849379-1', 'robins-desk.com');
    ga('send', 'pageview');
  </script>
</head>

<body>
  <div class='row small-12 large-2 left' id='nav'>
<?php
    include('includes/nav.html');
?>
  </div>
  <!-- end left content -->

  <div class='row small-12 large-10 right'>
    <div id='content'>
<?php
      include('includes/content.php');
?>
    </div>

    <div id='footer'>
<?php
      include('includes/footer.html');
?>
    </div>
  </div>
  <!-- end right content -->

</body>

<!-- js include -->
<?php
    include('includes/js.html');
?>

</html>