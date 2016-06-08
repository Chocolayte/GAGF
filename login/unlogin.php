<?php
	if (isset($_COOKIE['log'])) {
    unset($_COOKIE['log']);
    setcookie('log', '', time() - 3600, '/'); // empty value and old timestamp
	header('Location: ../');
	}	
?>