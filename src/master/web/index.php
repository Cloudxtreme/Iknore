<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include('../iknore/iknore_master.php');

if(isset($_GET['hello']))
{
    //$ip = 183500926;
    //$b1 = $ip >> 24 & 255;
    //$b2 = $ip >> 16 & 255;
    //$b3 = $ip >> 8 & 255;
    //$b4 = $ip & 255;
    //
    //echo $b1 . '.' . $b2 . '.' . $b3 . '.' . $b4;
   
    IknoreMaster::initialize();
}
?>