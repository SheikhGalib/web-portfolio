<?php
require_once '../includes/project_manager.php';

// Handle form submissions
if ($_POST) {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $data = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'image_path' => $_POST['image_path'],
                    'github_link' => $_POST['github_link'],
                    'live_demo_link' => $_POST['live_demo_link'],
                    'technologies' => $_POST['technologies'],
                    'featured' => isset($_POST['featured']) ? 1 : 0,
                    'display_order' => $_POST['display_order']
                ];
                
                if ($projectManager->addProject($data)) {
                    $success = "Project added successfully!";
                } else {
                    $error = "Failed to add project.";
                }
                break;
                
            case 'update':
                $data = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'image_path' => $_POST['image_path'],
                    'github_link' => $_POST['github_link'],
                    'live_demo_link' => $_POST['live_demo_link'],
                    'technologies' => $_POST['technologies'],
                    'featured' => isset($_POST['featured']) ? 1 : 0,
                    'display_order' => $_POST['display_order']
                ];
                
                if ($projectManager->updateProject($_POST['id'], $data)) {
                    $success = "Project updated successfully!";
                } else {
                    $error = "Failed to update project.";
                }
                break;
                
            case 'delete':
                if ($projectManager->deleteProject($_POST['id'])) {
                    $success = "Project deleted successfully!";
                } else {
                    $error = "Failed to delete project.";
                }
                break;
                
            case 'refresh':
                if ($projectManager->touchProject($_POST['id'])) {
                    $success = "Project image cache refreshed successfully!";
                } else {
                    $error = "Failed to refresh project cache.";
                }
                break;
        }
    }
}

// Get all projects for display
$projects = $projectManager->getAllProjects();

// Get project for editing if edit_id is provided
$editProject = null;
if (isset($_GET['edit_id'])) {
    $editProject = $projectManager->getProject($_GET['edit_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin - Project Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .form-container, .projects-list {
            background: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        
        textarea {
            height: 100px;
            resize: vertical;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .checkbox-group input {
            width: auto;
        }
        
        .btn {
            background: #3498db;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        
        .btn:hover {
            background: #2980b9;
        }
        
        .btn-success { background: #27ae60; }
        .btn-success:hover { background: #219a52; }
        
        .btn-danger { background: #e74c3c; }
        .btn-danger:hover { background: #c0392b; }
        
        .btn-warning { background: #f39c12; }
        .btn-warning:hover { background: #d68910; }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .project-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .project-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .project-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .project-meta {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Portfolio Admin Panel</h1>
            <p>Manage your projects and portfolio content</p>
            <a href="../index.php" class="btn" style="margin-top: 10px;">← Back to Portfolio</a>
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="form-container">
            <h2><?php echo $editProject ? 'Edit Project' : 'Add New Project'; ?></h2>
            
            <form method="POST">
                <input type="hidden" name="action" value="<?php echo $editProject ? 'update' : 'add'; ?>">
                <?php if ($editProject): ?>
                    <input type="hidden" name="id" value="<?php echo $editProject['id']; ?>">
                <?php endif; ?>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Project Title *</label>
                        <input type="text" id="title" name="title" required 
                               value="<?php echo $editProject ? htmlspecialchars($editProject['title']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="display_order">Display Order</label>
                        <input type="number" id="display_order" name="display_order" min="0"
                               value="<?php echo $editProject ? $editProject['display_order'] : '0'; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" required><?php echo $editProject ? htmlspecialchars($editProject['description']) : ''; ?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="image_path">Image Path *</label>
                        <input type="text" id="image_path" name="image_path" required 
                               placeholder="images/project1.png"
                               value="<?php echo $editProject ? htmlspecialchars($editProject['image_path']) : ''; ?>"
                               onchange="previewImage()">
                        <small style="color: #666; font-size: 12px;">
                            Tip: If you replace an image file with the same name, use the "Refresh Cache" button below to force browsers to reload the image.
                        </small>
                        <div id="image_preview" style="margin-top: 10px;">
                            <?php if ($editProject && $editProject['image_path']): ?>
                                <img src="../<?php echo htmlspecialchars($editProject['image_path']) . '?v=' . time(); ?>" 
                                     alt="Current image" style="max-width: 200px; max-height: 150px; border: 1px solid #ddd; border-radius: 5px;">
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="technologies">Technologies</label>
                        <input type="text" id="technologies" name="technologies" 
                               placeholder="HTML, CSS, JavaScript, PHP"
                               value="<?php echo $editProject ? htmlspecialchars($editProject['technologies']) : ''; ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="github_link">GitHub Link</label>
                        <input type="url" id="github_link" name="github_link" 
                               placeholder="https://github.com/username/project"
                               value="<?php echo $editProject ? htmlspecialchars($editProject['github_link']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="live_demo_link">Live Demo Link</label>
                        <input type="url" id="live_demo_link" name="live_demo_link" 
                               placeholder="https://your-project-demo.com"
                               value="<?php echo $editProject ? htmlspecialchars($editProject['live_demo_link']) : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="featured" name="featured" 
                               <?php echo ($editProject && $editProject['featured']) ? 'checked' : ''; ?>>
                        <label for="featured">Featured Project (show on homepage)</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">
                    <?php echo $editProject ? 'Update Project' : 'Add Project'; ?>
                </button>
                
                <?php if ($editProject): ?>
                    <a href="index.php" class="btn">Cancel Edit</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="projects-list">
            <h2>Existing Projects</h2>
            
            <?php if (empty($projects)): ?>
                <p>No projects found. Add your first project above!</p>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                    <div class="project-item">
                        <div class="project-header">
                            <div>
                                <div class="project-title"><?php echo htmlspecialchars($project['title']); ?></div>
                                <div class="project-meta">
                                    Order: <?php echo $project['display_order']; ?> | 
                                    Featured: <?php echo $project['featured'] ? 'Yes' : 'No'; ?> | 
                                    Created: <?php echo date('M j, Y', strtotime($project['created_at'])); ?>
                                </div>
                            </div>
                            <div>
                                <a href="?edit_id=<?php echo $project['id']; ?>" class="btn btn-warning">Edit</a>
                                <form method="POST" style="display: inline;" 
                                      title="Refresh image cache if you replaced the image file">
                                    <input type="hidden" name="action" value="refresh">
                                    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                    <button type="submit" class="btn" style="background: #17a2b8;">Refresh Cache</button>
                                </form>
                                <form method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        <p><?php echo htmlspecialchars(substr($project['description'], 0, 150)) . '...'; ?></p>
                        
                        <div style="margin-top: 10px;">
                            <?php if ($project['github_link']): ?>
                                <a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank" class="btn">GitHub</a>
                            <?php endif; ?>
                            
                            <?php if ($project['live_demo_link']): ?>
                                <a href="<?php echo htmlspecialchars($project['live_demo_link']); ?>" target="_blank" class="btn">Live Demo</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function previewImage() {
            const imagePath = document.getElementById('image_path').value;
            const previewDiv = document.getElementById('image_preview');
            
            if (imagePath.trim()) {
                // Add cache-busting parameter to force reload
                const timestamp = new Date().getTime();
                previewDiv.innerHTML = `
                    <img src="../${imagePath}?v=${timestamp}" 
                         alt="Image preview" 
                         style="max-width: 200px; max-height: 150px; border: 1px solid #ddd; border-radius: 5px;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <div style="display: none; color: #e74c3c; font-size: 12px; margin-top: 5px;">
                        Image not found or invalid path
                    </div>
                `;
            } else {
                previewDiv.innerHTML = '';
            }
        }

        // Force refresh of main portfolio page images after update
        function refreshPortfolioImages() {
            if (window.opener && !window.opener.closed) {
                try {
                    const images = window.opener.document.querySelectorAll('.project-card img');
                    images.forEach(img => {
                        const currentSrc = img.src;
                        const separator = currentSrc.includes('?') ? '&' : '?';
                        img.src = currentSrc.split('?')[0] + separator + 'v=' + new Date().getTime();
                    });
                } catch (e) {
                    console.log('Could not refresh parent window images');
                }
            }
        }

        // Call refresh function after successful form submission
        <?php if (isset($success) && strpos($success, 'updated') !== false): ?>
            refreshPortfolioImages();
        <?php endif; ?>
    </script>
</body>
</html>
