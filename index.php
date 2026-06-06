<?php
include 'db.php';

$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM profile LIMIT 1"));
$education = mysqli_query($conn, "SELECT * FROM education");
$skills = mysqli_query($conn, "SELECT * FROM skills");
$projects = mysqli_query($conn, "SELECT * FROM projects");
$certifications = mysqli_query($conn, "SELECT * FROM certifications");
$experience = mysqli_query($conn, "SELECT * FROM experience");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $profile['full_name']; ?> | Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <div class="logo"><?php echo $profile['full_name']; ?></div>

    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#education">Education</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#certifications">Certifications</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<section id="home">
    <div class="home-container">

        <div class="home-content">
            <h1>Hi, I'm <?php echo $profile['full_name']; ?></h1>

            <h2><?php echo $profile['designation']; ?></h2>

            <p><?php echo $profile['about_me']; ?></p>

            <a href="resume/<?php echo $profile['resume_file']; ?>" download>
                <button>Download Resume</button>
            </a>
        </div>

        <div class="home-image">
            <img
                src="images/profile.jpg?v=3"
                alt="Profile Image"
                style="width:180px; height:180px; object-fit:cover; border-radius:50%; border:5px solid #2563eb;">
        </div>

    </div>
</section>

<section id="about">
    <h2>About Me</h2>
    <p><?php echo $profile['about_me']; ?></p>
</section>

<section id="education">
    <h2>Education</h2>

    <?php while ($row = mysqli_fetch_assoc($education)) { ?>
        <div class="project-card">
            <h3><?php echo $row['degree']; ?></h3>
            <p><strong>Specialization:</strong> <?php echo $row['specialization']; ?></p>
            <p><strong>Institution:</strong> <?php echo $row['institution']; ?></p>
            <p><strong>CGPA:</strong> <?php echo $row['cgpa']; ?></p>
            <p><strong>Year:</strong> <?php echo $row['start_year']; ?> - <?php echo $row['end_year']; ?></p>
            <p><?php echo $row['description']; ?></p>
        </div>
    <?php } ?>
</section>

<section id="skills">
    <h2>Skills</h2>

    <ul>
        <?php while ($row = mysqli_fetch_assoc($skills)) { ?>
            <li><?php echo $row['skill_name']; ?> - <?php echo $row['proficiency_level']; ?></li>
        <?php } ?>
    </ul>
</section>

<section id="projects">
    <h2>Projects</h2>

    <?php while ($row = mysqli_fetch_assoc($projects)) { ?>
        <div class="project-card">
            <h3><?php echo $row['project_title']; ?></h3>
            <p><?php echo $row['short_description']; ?></p>
            <p><?php echo $row['detailed_description']; ?></p>
            <p><strong>Tech:</strong> <?php echo $row['tech_stack']; ?></p>
            <p><strong>Status:</strong> <?php echo $row['project_status']; ?></p>
            <a href="<?php echo $row['github_link']; ?>" target="_blank">GitHub Link</a>
        </div>
    <?php } ?>
</section>

<section id="certifications">
    <h2>Certifications</h2>

    <?php while ($row = mysqli_fetch_assoc($certifications)) { ?>
        <div class="project-card">
            <h3><?php echo $row['certificate_name']; ?></h3>
            <p><strong>Organization:</strong> <?php echo $row['organization']; ?></p>
            <p><strong>Issue Date:</strong> <?php echo $row['issue_date']; ?></p>
            <p><?php echo $row['description']; ?></p>
            <a href="<?php echo $row['certificate_link']; ?>" target="_blank">View Certificate</a>
        </div>
    <?php } ?>
</section>

<section id="experience">
    <h2>Experience</h2>

    <?php while ($row = mysqli_fetch_assoc($experience)) { ?>
        <div class="project-card">
            <h3><?php echo $row['role']; ?></h3>
            <p><strong>Company:</strong> <?php echo $row['company_name']; ?></p>
            <p><strong>Type:</strong> <?php echo $row['employment_type']; ?></p>
            <p><?php echo $row['description']; ?></p>
        </div>
    <?php } ?>
</section>

<section id="contact">
    <h2>Contact Me</h2>

    <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $profile['phone']; ?></p>
    <p><strong>Location:</strong> <?php echo $profile['location']; ?></p>

    <p><a href="<?php echo $profile['linkedin_url']; ?>" target="_blank">LinkedIn</a></p>
    <p><a href="<?php echo $profile['github_url']; ?>" target="_blank">GitHub</a></p>

    <form action="contact.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" minlength="3" maxlength="50" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" maxlength="100">
        <textarea name="message" placeholder="Your Message" minlength="10" maxlength="1000" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>

<footer>
    <p>© 2026 <?php echo $profile['full_name']; ?>. All Rights Reserved.</p>
</footer>

<script src="script.js"></script>

</body>
</html>