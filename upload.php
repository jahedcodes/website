<?php
header('Content-Type: application/json; charset=utf-8');

if (!isset($_FILES['file'])) {
    echo json_encode(["status" => "error", "message" => "no file"]);
    exit;
}

$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

$file = $_FILES['file'];

$realName = preg_replace("/[^a-zA-Z0-9_\-\.]/", "_", basename($file['name']));
$target = $uploadDir . $realName;


$i = 1;
$pathInfo = pathinfo($realName);
while(file_exists($target)){
    $realName = $pathInfo['filename'] . "_$i." . $pathInfo['extension'];
    $target = $uploadDir . $realName;
    $i++;
}

if(move_uploaded_file($file['tmp_name'], $target)){
    echo json_encode(["status" => "success", "file" => $realName]);
} else {
    echo json_encode(["status" => "error", "message" => "upload failed"]);
}