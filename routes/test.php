<?php
use Doctrine\DBAL\DriverManager;

$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
		'dbname' => 'slimtest',
		'user' => 'root',
		'password' => '111111',
		'host' => 'localhost',
		'driver' => 'pdo_mysql',
);
$conn = DriverManager::getConnection($connectionParams, $config);

$sql = "SELECT * FROM user";
$stmt = $conn->query($sql);

while ($row = $stmt->fetch()) {
	echo $row['username'];
}