<?php
session_start();

$betFor = $_POST['bet_for'];
$balance = $_POST['balance'];

$dice1 = rand('1', '6');
$dice2 = rand('1', '6');
$_SESSION['dice1'] = $dice1;
$_SESSION['dice2'] = $dice2;
$total = $dice1 + $dice2;
$_SESSION['total'] = $total;

if($betFor == 'below_7' && $total < 7 ){
    $_SESSION['currentBalance'] = $balance + 10;
    $_SESSION['status'] ='win';
}elseif($betFor == '7' && $total == 7 ){
    $_SESSION['currentBalance'] = $balance + 20;
    $_SESSION['status'] ='win';
}elseif($betFor == 'above_7' && $total > 7 ){
    $_SESSION['currentBalance'] = $balance + 10;
    $_SESSION['status'] ='win';
}else{
    $_SESSION['currentBalance'] = $balance - 10;
    $_SESSION['status'] ='lose';
}

header('location: index.php');