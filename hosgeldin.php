<?php
session_start();
$title = 'Hoşgeldin Sayfası';
include 'giris-header.php';

if (isset($_SESSION['user'])) {
	printf("Hoşgeldin <strong>%s!</strong>",
		$_SESSION['user']['isim']);

	echo '<p><a href="cikis.php">Çıkış Yap</a></p>';
}
else {
	echo '<p class="hata">Yetkiniz yok!</p>';
}

include 'giris-footer.php';