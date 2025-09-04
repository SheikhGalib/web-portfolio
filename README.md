# Dynamic Portfolio Website

A modern, responsive portfolio website with dynamic project management using PHP and MySQL.

## Features

- Dynamic project management through admin panel
- Dynamic services section
- Responsive design
- Social media integration
- CV download functionality
- Database-driven content

## Setup Instructions

### 1. Database Setup

1. Create a MySQL database named `portfolio_db`
2. Import the database structure from `database/setup.sql`
3. Update database credentials in `config/database.php`

```sql
-- Create database
CREATE DATABASE portfolio_db;
USE portfolio_db;

-- Then run the SQL from database/setup.sql
```

### 2. Server Setup

1. Make sure you have PHP and MySQL installed
2. Place the portfolio files in your web server directory (htdocs for XAMPP, www for WAMP)
3. Start your web server and MySQL

### 3. Configuration

Update the following files with your information:

#### config/database.php

```php
$host = 'localhost';        // Your database host
$dbname = 'portfolio_db';   // Your database name
$username = 'root';         // Your database username
$password = '';             // Your database password
```

#### script.js

Update social media links:

```javascript
const socialLinks = {
  github: "https://github.com/YOUR_USERNAME",
  facebook: "https://www.facebook.com/YOUR_PROFILE",
  x: "https://x.com/YOUR_HANDLE",
  linkedin: "https://www.linkedin.com/in/YOUR_PROFILE",
};
```

### 4. Content Management

#### Adding Projects

1. Go to `/admin/` in your browser
2. Use the admin panel to add/edit/delete projects
3. Upload project images to the `images/` folder
4. Use the admin panel to manage project information

#### Project Information Fields:

- **Title**: Project name
- **Description**: Detailed project description
- **Image Path**: Path to project image (e.g., `images/project1.png`)
- **GitHub Link**: Link to project repository
- **Live Demo Link**: Link to live project demo
- **Technologies**: Comma-separated list of technologies used
- **Featured**: Check to show on homepage
- **Display Order**: Order in which projects appear

### 5. File Structure

```
web-portfolio/
├── admin/
│   └── index.php           # Admin panel for project management
├── config/
│   └── database.php        # Database configuration
├── database/
│   └── setup.sql          # Database structure and sample data
├── images/                # Project images and profile pictures
├── includes/
│   └── project_manager.php # PHP class for database operations
├── index.php              # Main portfolio page
├── script.js              # JavaScript functionality
├── style.css              # Stylesheet
└── README.md              # This file
```

### 6. Adding New Projects

#### Through Admin Panel:

1. Visit `/admin/index.php`
2. Fill out the project form
3. Click "Add Project"

#### Sample Project Data:

- **Title**: "E-commerce Website"
- **Description**: "A full-featured e-commerce platform with user authentication, shopping cart, and payment integration."
- **Image Path**: "images/ecommerce-project.png"
- **GitHub Link**: "https://github.com/SheikhGalib/ecommerce-project"
- **Live Demo**: "https://your-demo-site.com"
- **Technologies**: "HTML, CSS, JavaScript, PHP, MySQL"
- **Featured**: ✓ (checked)
- **Display Order**: 1

### 7. Customization

#### Adding New Services:

1. Edit the services table in your database
2. Add new services with appropriate icons from Boxicons

#### Updating Personal Information:

1. Edit the text content directly in `index.php`
2. Replace profile images in the `images/` folder
3. Update the CV file path in `script.js`

### 8. Deployment

For production deployment:

1. Upload all files to your web server
2. Update database credentials
3. Ensure proper file permissions
4. Test all functionality

### 9. Security Considerations

- Change default database credentials
- Add authentication to admin panel
- Validate and sanitize all user inputs
- Use HTTPS in production
- Regular database backups

### 10. Troubleshooting

#### Common Issues:

- **Database connection errors**: Check credentials in `config/database.php`
- **Images not loading**: Verify image paths and file permissions
- **PHP errors**: Ensure PHP is properly configured on your server

## Technologies Used

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- Boxicons (for icons)
- Google Fonts (Poppins)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## License

This project is open source and available under the [MIT License](LICENSE).
