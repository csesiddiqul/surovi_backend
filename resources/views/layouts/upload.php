<?php
header('Content-Type: application/json');

$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

$targetFile = $targetDir . basename($_FILES["files"]["name"]);

if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFile)) {
    echo json_encode([
        "success" => true,
        "files" => [
            [
                "url" => $targetFile
            ]
        ]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Upload failed."
    ]);
}
?>
