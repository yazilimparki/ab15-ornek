<?php
ob_start();
session_start();
$title = 'Giriş Kontrol';
include 'giris-header.php';

if (isset($_POST)) {
	try {
		$db = new PDO('mysql:host=localhost;dbname=ab15', 'root', 'root', [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);

		$query = $db->prepare('SELECT * FROM kullanicilar WHERE 
			kullanici_adi = ?');

		$query->execute(array(
			$_POST['username']
		));

		if ($query->rowCount() > 0) {
			$user = $query->fetch();

			if (password_verify($_POST['password'], $user['parola'])) {
				unset($user['parola']);
				$_SESSION['user'] = $user;
				header("Location: hosgeldin.php");
				exit;
			}
			else {
				echo '<p class="hata">Hatalı kullanıcı adı veya parolası.</p>';
			}
		}
		else {
			echo '<p class="hata">Hatalı kullanıcı adı veya parolası.</p>';
		}
	}
	catch (PDOException $e) {
		echo '<p class="hata">Veritabanı hatası oluştu: ' . $e->getMessage() . '</p>';
	}
}
else {
	echo '<p class="hata">Kullanıcı adı ve parola giriniz.</p>';
}

include 'giris-footer.php';
ob_end_flush();
?>