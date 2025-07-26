<?php
if (isset($_POST["clear"])) {
    try {
        require_once "dbh-inc.php";
        $active = 0;
        $query = "UPDATE tasks SET is_active = :active";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":active", $active, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode([
            "success" => false,
            "message" => "Query Failed: " . $e->getMessage()
        ]);
        exit;
    } finally {
        $pdo = null;
        $stmt = null;
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
}
