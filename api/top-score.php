
<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");
// 建立数据库连接
$servername = "localhost";
$username = "root";
$password = "frank8355542";
$dbname = "game2048";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接数据库失败: " . $conn->connect_error);
}

// 查询数据库获取最高分数
$sql = "SELECT MAX(score) as topScore FROM scores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $topScore = $row["topScore"];
} else {
    $topScore = 0;
}
// 返回最高分数

$response = array('topScore' => $topScore);
header('Content-Type: application/json');
echo json_encode($response);

//$conn->close();
?>