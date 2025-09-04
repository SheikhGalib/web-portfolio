-- Create database (run this first)
-- CREATE DATABASE portfolio_db;
-- USE portfolio_db;

-- Projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(500) NOT NULL,
    github_link VARCHAR(500),
    live_demo_link VARCHAR(500),
    technologies VARCHAR(500),
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    display_order INT DEFAULT 0
);

-- Insert sample projects (replace with your actual projects)
INSERT INTO projects (title, description, image_path, github_link, live_demo_link, technologies, featured, display_order) VALUES
('E-commerce Website', 'A full-featured e-commerce platform built with modern web technologies. Features include user authentication, shopping cart, payment integration, and admin dashboard.', 'images/project1.png', 'https://github.com/SheikhGalib/ecommerce-project', 'https://your-ecommerce-demo.com', 'HTML, CSS, JavaScript, PHP, MySQL', TRUE, 1),

('Task Management App', 'A comprehensive task management application with real-time updates, team collaboration features, and intuitive user interface.', 'images/project2.png', 'https://github.com/SheikhGalib/task-manager', 'https://your-task-manager-demo.com', 'React, Node.js, MongoDB, Socket.io', TRUE, 2),

('Weather Dashboard', 'A responsive weather dashboard that provides real-time weather information, forecasts, and interactive maps for any location worldwide.', 'images/project3.png', 'https://github.com/SheikhGalib/weather-dashboard', 'https://your-weather-demo.com', 'JavaScript, API Integration, Chart.js', TRUE, 3),

('Portfolio Website', 'A modern, responsive portfolio website showcasing projects and skills with dynamic content management and smooth animations.', 'images/project4.png', 'https://github.com/SheikhGalib/portfolio-website', 'https://your-portfolio-demo.com', 'HTML, CSS, JavaScript, PHP, MySQL', TRUE, 4),

('Chat Application', 'Real-time chat application with multiple rooms, file sharing, emoji support, and user authentication.', 'images/project5.png', 'https://github.com/SheikhGalib/chat-app', 'https://your-chat-demo.com', 'Node.js, Socket.io, Express, MongoDB', TRUE, 5);

-- Services table (optional - for dynamic services section)
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon_class VARCHAR(100) NOT NULL,
    featured BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    display_order INT DEFAULT 0
);

-- Insert sample services
INSERT INTO services (title, description, icon_class, featured, display_order) VALUES
('UI/UX Design', 'Creating intuitive and visually appealing user interfaces with focus on user experience. Specializing in modern design principles and responsive layouts.', 'bx bxl-figma', TRUE, 1),
('Web Development', 'Building responsive and dynamic websites using modern technologies. From simple landing pages to complex web applications with database integration.', 'bx bx-code', TRUE, 2),
('Python Development', 'Developing robust applications using Python. Experience in web frameworks, data analysis, automation scripts, and API development.', 'bx bxl-python', TRUE, 3);
