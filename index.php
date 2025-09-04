<?php
// Include the project manager
require_once 'includes/project_manager.php';

// Get projects and services from database
$projects = $projectManager->getAllProjects(true); // Only featured projects
$services = $projectManager->getAllServices(true); // Only featured services
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website</title>

    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <header class="header">
        <a href="#home" class="logo">
            Sheikh <span>Galib</span>
        </a>
        <i class="bx bx-menu" id="menu-icon"></i>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

        <button class="gradient-btn" onclick="window.location.href='#contact'">Contact Me</button>

    </header>

    <section class="home" id="home">
        <div class="home-content">
            <h1>Hi, It's <span>Galib</span></h1>
            <h3>I'm a <span>programmer</span></h3>
            <p>Lorem ipsum dolor sit,
                amet consectetur adipisicing elit.
                Odio, illum dicta autem alias,
                sed blanditiis quasi corporis porro soluta maxime labore possimus mollitia deserunt!
                Tempora assumenda iure harum amet. Debitis?</p>

            <div class="social-icons">
                <a href="#" onclick="openSocialLink('github')"><i class="bx bxl-github"></i></a>
                <a href="#" onclick="openSocialLink('facebook')"><i class="bx bxl-facebook"></i></a>
                <a href="#" onclick="openSocialLink('x')"><i class="bx bxl-twitter"></i></a>
                <a href="#" onclick="openSocialLink('linkedin')"><i class="bx bxl-linkedin"></i></a>
            </div>

            <div class="btn-group">
                <a href="#" class="btn" onclick="downloadCV()">Download CV</a>
                <a href="#contact" class="btn">Contact Me</a>
            </div>

        </div>

        <div class="home-img">
            <img src="images/profile-3.png" alt="profile image" />
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-img">
            <img src="images/profile-3.png" alt="image">
        </div>

        <div class="about-content">
            <h2>About <span>Me</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Enim asperiores fugit nulla incidunt omnis?
                Modi, placeat nam deserunt non quasi cumque omnis earum ullam velit nesciunt
                incidunt fugiat fugit! Officia.</p>
            <a href="#" class="btn">Read More</a>
        </div>

    </section>

    <section class="services" id="services">

        <h2 class="heading">Services</h2>
        <div class="services-container">

            <?php foreach ($services as $service): ?>
                <div class="service-box">
                    <div class="service-info">
                        <i class="<?php echo htmlspecialchars($service['icon_class']); ?>"></i>
                        <h4><?php echo htmlspecialchars($service['title']); ?></h4>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>

    <section class="projects" id="projects">

        <h2 class="heading">Projects </h2>

        <div class="projects-box">

            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <img src="<?php echo htmlspecialchars($project['image_path']) . '?v=' . strtotime($project['updated_at']); ?>"
                        alt="<?php echo htmlspecialchars($project['title']); ?>">
                    <div class="project-info">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo htmlspecialchars($project['description']); ?></p>

                        <div class="project-buttons">
                            <?php if (!empty($project['github_link'])): ?>
                                <a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank"
                                    class="btn project-btn">View Code</a>
                            <?php endif; ?>

                            <?php if (!empty($project['live_demo_link'])): ?>
                                <a href="<?php echo htmlspecialchars($project['live_demo_link']); ?>" target="_blank"
                                    class="btn project-btn">Live Demo</a>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($project['technologies'])): ?>
                            <div class="project-tech">
                                <span class="tech-label">Technologies:</span>
                                <span class="tech-list"><?php echo htmlspecialchars($project['technologies']); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me</span></h2>

        <form action="#">

            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="Your Full Name">
                    <input type="email" placeholder="Your Email">

                </div>
                <div class="input-box">
                    <input type="number" placeholder="Your Phone Number">
                    <input type="text" placeholder="Subject">
                </div>
            </div>

            <div class="input-group-2">
                <textarea name="" id="" placeholder="Your Message" cols="30" rows="10"></textarea>
                <input type="submit" value="Send Message" class="btn">
            </div>
        </form>

    </section>

    <footer class="footer">
        <div class="social-icons">
            <a href="#" onclick="openSocialLink('github')"><i class="bx bxl-github"></i></a>
            <a href="#" onclick="openSocialLink('facebook')"><i class="bx bxl-facebook"></i></a>
            <a href="#" onclick="openSocialLink('instagram')"><i class="bx bxl-twitter"></i></a>
            <a href="#" onclick="openSocialLink('linkedin')"><i class="bx bxl-linkedin"></i></a>
        </div>

        <ul class="list">
            <li><a href="#">FAQ</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <p class="copyright">
            &copy; 2025 by Sheikh Galib. All rights reserved.
        </p>
    </footer>

    <script src="script.js"></script>
</body>

</html>