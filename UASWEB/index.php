<?php
$connection = mysqli_connect("localhost", "root", "", "putra");

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;

    exit;
}

$title = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'title'"));
$title = $title['value'];

$heading = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'heading'"));
$heading = $heading['value'];
$subheading = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'subheading'"));
$subheading = $subheading['value'];
$tagline = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'tagline'"));
$tagline = $tagline['value'];

$about_title = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'about_title'"));
$about_title = $about_title['value'];
$about_description = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'about_description'"));
$about_description = $about_description['value'];

$email = mysqli_fetch_assoc(mysqli_query($connection, "SELECT value FROM settings WHERE `key` = 'email'"));
$email = $email['value'];

$educations = mysqli_query($connection, "SELECT * FROM education");
$experiences = mysqli_query($connection, "SELECT * FROM experience");
$skills = mysqli_query($connection, "SELECT * FROM skills INNER JOIN skill_categories ON skills.category_id = skill_categories.id");

$educationData = [];
$experienceData = [];
$skillData = [];

while ($education = mysqli_fetch_assoc($educations)) {
    $educationData[] = $education;
}

while ($experience = mysqli_fetch_assoc($experiences)) {
    $experienceData[] = $experience;
}

while ($skill = mysqli_fetch_assoc($skills)) {
    $skillData[$skill['category_name']][] = $skill;
}

$codingSkills = $skillData['Coding Skills'];
$electricianSkills = $skillData['Electrician Skills'];

mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "{$tagline} | {$title}" ?></title>

    <link rel="stylesheet" href="css/style.css">

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- header design -->

    <header class="header">
        <a href="#" class="logo"><?= $heading ?>.</a>

        <div class="bx bx-menu" id="menu-icon"></div>
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#education">Education</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>

            <span class="active-nav"></span>
        </nav>
    </header>

    <!-- home section design -->

    <section class="home" id="home">
        <div class="home-content">
            <h1><?= $heading ?></h1>
            <div class="text-animate">
                <h3><?= $subheading ?></h3>
            </div>
            <p><?= $tagline ?></p>

            <div class="btn-box">
                <a href="#" class="btn">Hire Me</a>
                <a href="#" class="btn">Contact Me</a>
            </div>
        </div>

        <div class="home-sci">
            <a href="https://www.facebook.com/maulana.putra.37853734" target="_blank"><i class='bx bxl-facebook'></i></a>
            <a href="https://github.com/Inetzs" target="_blank"><i class='bx bxl-github' ></i></a>
            <a href="https://twitter.com/Putra_8788" target="_blank"><i class='bx bxl-twitter'></i></a>
        </div>

        <div class="home-imgHover"></div>
    </section>

    <!-- about section design -->

    <section class="section about" id="about">
        <h2 class="heading">About <span>Me</span></h2>

        <div class="about-image">
            <img src="/UAS/images/About1.svg" alt=""> 
           <span class="circle-spin"></span>
        </div>

        <div class="about-content">
            <h3><?= $about_title ?></h3>
            <p><?= $about_description ?></p>
            <div class="btn-box btns">
                <a href="#" class="btn">Read More</a>
            </div>
        </div>
    </section>

    <!-- education section design -->

    <section class="education" id="education">
        <h2 class="heading">My <span>Journey</span></h2>
        <div class="education-row">
            <div class="education-column">
                <h3 class="title">Education</h3>
                <div class="education-box">
                    <?php foreach ($educationData as $education) : ?>
                        <div class="education-content">
                            <div class="content">
                                <div class="year"><i class='bx bxs-calendar'></i><?= $education['start_date'] ?> - <?= $education['end_date'] ?></div>
                                <h3><?= $education['title'] ?> - <?= $education['institution'] ?></h3>
                                <P><?= $education['description'] ?></P>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="education-column">
                <h3 class="title">Experience</h3>
                <div class="education-box">
                    <?php foreach ($experienceData as $experience) : ?>
                        <div class="education-content">
                            <div class="content">
                                <div class="year"><i class='bx bxs-calendar'></i><?= $experience['start_date'] ?> - <?= $experience['end_date'] ?></div>
                                <h3><?= $experience['title'] ?> - <?= $experience['position'] ?></h3>
                                <P><?= $experience['description'] ?></P>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- skills section design -->

    <section class="skills" id="skills">
        <h2 class="heading">My <span>Skills</span></h2>

        <div class="skills-row">
            <div class="skills-column">
                <h3 class="title"><?= $codingSkills[0]['category_name'] ?></h3>

                <div class="skills-box">
                    <div class="skills-content">
                        <?php foreach ($codingSkills as $skill) : ?>
                            <div class="progress">
                                <h3><?= $skill['skill_name'] ?> <span><?= $skill['percentage'] ?>%</span></h3>
                                <div class="bar"><span></span></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="skills-column">
                <h3 class="title">Electrician Skills</h3>

                <div class="skills-box">
                    <div class="skills-content">
                        <?php foreach ($electricianSkills as $skill) : ?>
                            <div class="progress">
                                <h3><?= $skill['skill_name'] ?> <span><?= $skill['percentage'] ?>%</span></h3>
                                <div class="bar"><span></span></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact section design -->

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>

        <form action="#">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Full Name" required>
                    <span class="focus"></span>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Email Address" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="number" placeholder="Mobile Number" required>
                    <span class="focus"></span>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Email Subject" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="textarea-field">
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <span class="focus"></span>
            </div>

            <div class="btn-box btns">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </section>

    <!-- footer design -->

    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; 2023 by Inetzs | All Rights Reserved.</p>
        </div>
        <div class="footer-iconTop">
            <a href="#"><i class='bx bx-up-arrow-alt'></i></a>
        </div>
    </footer>


    <script src="js/script.js"></script>
</body>

</html>
