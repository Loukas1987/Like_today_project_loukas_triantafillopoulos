<?php
//We start sessions
session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('localhost','user305', 'ebIgeim1');
mysql_select_db('user305_db3');

//Webmaster Email
$mail_webmaster = 'triantafillopoulos.loukas@gmail.com';

//Top site root URL
$url_root = 'http://ellaksrv.datacenter.uoc.gr/~user305/like_today_project/index.php';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>