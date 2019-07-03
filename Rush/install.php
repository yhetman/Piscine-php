<!--Just use running database!!!. But if u want, u can use minishop.sql to build it from skretch.-->
<?php
  $path = "minishop.sql";
  exec ("/Users/vlytvyne/Desktop/MAMP/mysql/bin/mysql -uroot -proot < $path");
?>