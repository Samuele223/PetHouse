<?php
echo 'PHP Version: ' . phpversion() . "<br>";

$hash = '$2y$10$UgozlWy/v4Biaz430Jnu4.Bj5DbScmxu00j5uxlNztnsSV8DKeOOa';
$password = 'andrea';

echo 'Test con andrea: ';
var_dump(password_verify('andrea', $hash));

// Genera tu un nuovo hash a mano
$my_hash = password_hash('andrea', PASSWORD_DEFAULT);
echo 'Hash generato ora: ' . $my_hash . "<br>";
echo 'Test con andrea (hash nuovo): ';
var_dump(password_verify('andrea', $my_hash));

echo phpversion();
?>