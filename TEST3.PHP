<?php
$password = 'andrea';
$hash = '$2y$10$qVul7XyM5O08MHkRlOIc3.7aPaR/xiCR9iKLIewpKfGI6MRIPSama';
echo "Password: '$password'<br>";
echo "Hash: '$hash'<br>";
echo "Verify (hash da DB): ";
var_dump(password_verify($password, $hash));
?>
