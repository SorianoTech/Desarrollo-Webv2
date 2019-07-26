<?php
setcookie('usuario', '', time()-60);
setcookie('contador', '', time()-60);
header('Location: logearse.php');
exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

