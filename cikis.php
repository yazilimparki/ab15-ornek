<?php
session_start();
unset($_SESSION['user']);
$_SESSION['mesaj'] = 'Çıkış yapıldı.';
header("Location: giris.php");
