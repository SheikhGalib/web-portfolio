<?php
require_once __DIR__ . '/../config/database.php';

class ProjectManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all projects ordered by display_order
    public function getAllProjects($featured_only = false)
    {
        $sql = "SELECT * FROM projects";
        if ($featured_only) {
            $sql .= " WHERE featured = 1";
        }
        $sql .= " ORDER BY display_order ASC, created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single project by ID
    public function getProject($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add a new project
    public function addProject($data)
    {
        $sql = "INSERT INTO projects (title, description, image_path, github_link, live_demo_link, technologies, featured, display_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['image_path'],
            $data['github_link'],
            $data['live_demo_link'],
            $data['technologies'],
            $data['featured'] ?? false,
            $data['display_order'] ?? 0
        ]);
    }

    // Update an existing project
    public function updateProject($id, $data)
    {
        $sql = "UPDATE projects SET 
                title = ?, description = ?, image_path = ?, github_link = ?, 
                live_demo_link = ?, technologies = ?, featured = ?, display_order = ?,
                updated_at = CURRENT_TIMESTAMP
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['image_path'],
            $data['github_link'],
            $data['live_demo_link'],
            $data['technologies'],
            $data['featured'] ?? false,
            $data['display_order'] ?? 0,
            $id
        ]);
    }

    // Delete a project
    public function deleteProject($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Force update timestamp for cache busting (useful when image file is replaced)
    public function touchProject($id)
    {
        $stmt = $this->pdo->prepare("UPDATE projects SET updated_at = CURRENT_TIMESTAMP WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Get all services
    public function getAllServices($featured_only = false)
    {
        $sql = "SELECT * FROM services";
        if ($featured_only) {
            $sql .= " WHERE featured = 1";
        }
        $sql .= " ORDER BY display_order ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Initialize the ProjectManager
$projectManager = new ProjectManager($pdo);
?>