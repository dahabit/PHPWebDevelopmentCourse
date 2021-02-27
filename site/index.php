<?php


include_once 'header.php';

$page=$_GET['page'];

switch ($page){
          case 'home';
          include_files('home.php');
           break;


           case 'contact_us';
           include_files('contact_us.php');
           break;


          case 'friends';
          include_files('friends.php');
          break;


          case 'our_news';
          include_files('our_news.php');
          break;


           case 'Agenda';
           include_files('Agenda.php');
           break;

default:
       include_once 'home.php';
       break;   
}

include_once 'footer.php';   
