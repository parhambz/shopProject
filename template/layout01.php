<!DOCTYPE html>
<?php 
require 'theme.php';
$theme=new theme();
?>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}
.header, .footer {
    background-color: grey;
    color: white;
    padding: 15px;
}
.column {
    float: left;
    padding: 15px;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.menu {
    width: 25%;
}
.content {
    width: 75%;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 8px;
    background-color: #33b5e5;
    color: #ffffff;
}
.menu li:hover {
    background-color: #0099cc;
}
</style>
<title><?= $theme::$title?></title>
</head>
<body>

<div class="header">
  <h1><?=$theme::$header?></h1>
</div>

<div class="clearfix">
  <div class="column menu">
      <ul>  
  <?php require 'menue.php'; ?>
      </ul>
  </div>

  <div class="column content">
    <?= $content?>
  </div>
</div>

<div class="footer">
  <p><?=theme::$footer?></p>
</div>

</body>
</html>
