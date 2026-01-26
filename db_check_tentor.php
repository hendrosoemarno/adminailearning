<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin', 'root', '');
    $stmt = $pdo->query('DESCRIBE ai_tentor');
    if ($stmt) {
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
    } else {
        echo "Table ai_tentor not found or error.";
        print_r($pdo->errorInfo());
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
