<?php
require_once 'includes/project_manager.php';

// Test the cache busting functionality
echo "<h2>Testing Image Cache Busting</h2>";

// Get all projects
$projects = $projectManager->getAllProjects();

echo "<h3>Current Projects with Cache-Busted Image URLs:</h3>";
foreach ($projects as $project) {
    $cacheUrl = $project['image_path'] . '?v=' . strtotime($project['updated_at']);
    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
    echo "<strong>Project:</strong> " . htmlspecialchars($project['title']) . "<br>";
    echo "<strong>Original Path:</strong> " . htmlspecialchars($project['image_path']) . "<br>";
    echo "<strong>Cache-Busted URL:</strong> " . htmlspecialchars($cacheUrl) . "<br>";
    echo "<strong>Updated At:</strong> " . $project['updated_at'] . "<br>";
    echo "<img src='" . htmlspecialchars($cacheUrl) . "' alt='Test' style='max-width: 100px; max-height: 100px; margin-top: 5px;'>";
    echo "</div>";
}

echo "<p><a href='admin/index.php'>← Back to Admin</a> | <a href='index.php'>← Back to Portfolio</a></p>";
?>