<?php
session_start();
$title = 'Giriş';
include 'giris-header.php';

if (isset($_SESSION['mesaj'])) {
	echo '<div class="mesaj">' . $_SESSION['mesaj'] . '</div>';
	unset($_SESSION['mesaj']);
}
?>
<form method="post" action="giris-kontrol.php">
<p>
	Kullanıcı Adı:<br>
	<input type="text" name="username">
</p>
<p>
	Parola:<br>
	<input type="password" name="password">
</p>
<input type="submit" value="Giriş">
</form>
<?php
include 'giris-footer.php';
?>