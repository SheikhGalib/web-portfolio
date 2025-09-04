<?php
echo "PHP is working! Current time: " . date('Y-m-d H:i:s');
echo "<br><br>";
echo "Testing database connection...<br>";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=portfolio_db;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connection successful!<br>";
    
    // Test query
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM projects");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "✅ Found " . $result['count'] . " projects in database<br>";
    
} catch(PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage();
}
?>
