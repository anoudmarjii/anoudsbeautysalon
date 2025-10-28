<?php
require 'connect.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anoud's Beauty Center</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon"> <!-- href add link for logo -->

    <link rel="stylesheet" href="../css/reset.css"> <!-- reset code -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header>
        <section class="sale">
            <h1>Sale!</h1>
            <h4>20 Dec 2024- 27 Jan 2025</h4>
        </section>
        <section class="header">
            <h2 id="name">Anoud's Beauty Center</h2>
            <nav id="head">
            <ul>
                <?php 
                if (isset($_SESSION['user'])) {
                    echo '
                    <li>
                        <h4><a href="../profile.php">Profile</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Gifts">Gifts</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Contact">Contact</a></h4>
                    </li>
                    <li>
                        <h4><a href="#About">About Us</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Services">Services</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php">Home</a></h4>
                    </li>'; } else {
                        echo '
                        <li>
                        <h4 id="signIn"><a href="../signInPage.php">Sign In</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Gifts">Gifts</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Contact">Contact</a></h4>
                    </li>
                    <li>
                        <h4><a href="#About">About Us</a></h4>
                    </li>
                    <li>
                        <h4><a href="#Services">Services</a></h4>
                    </li>
                    <li>
                        <h4><a href="#imagepart">Home</a></h4>
                    </li>';
                    };
                ?>
                </ul>
            </nav>
        </section>

    </header>

    <main>
        <!-- add image from css as a background -->
        <section id="imagepart">
            <?php
            if(isset($_SESSION['user'])){
                echo '
                <a href="../bookAnAppointment.php"><input type="button" value="Book Appointment" id="button1"></a>
                ';
            } else {
                echo '
                <a href="../signInPage.php"><input type="button" value="Book Appointment" id="button1"></a>
                ';
            }
            ?>
            <section id="hambNav">
                <h1><i class='bx bx-menu'></i></h1>
                <div class="dropdown-content">
                    <?php 
                    if (isset($_SESSION['user'])) {
                        echo '
                    <p><a href="../profile.php">Profile</a></p>
                    <p><a href="../index.php#imagepart">Home</a></p>
                    <p><a href="../index.php#Services">Services</a></p>
                    <p><a href="../index.php#About">About Us</a></p>
                    <p><a href="../index.php#Contact">Contact</a></p>
                    <p><a href="../index.php#Gifts">Gifts</a></p>
                    '; } else {
                        echo '
                        <p><a href="../signInPage.php">SignIn</a></p>
                    <p><a href="../profile.php">Profile</a></p>
                    <p><a href="../index.php#imagepart">Home</a></p>
                    <p><a href="../index.php#Services">Services</a></p>
                    <p><a href="../index.php#About">About Us</a></p>
                    <p><a href="../index.php#Contact">Contact</a></p>
                    <p><a href="../index.php#Gifts">Gifts</a></p>
                    ';};
                    ?>
                </div>
            </section>

            <article class="info-container">
                <article class="info">
                    <h4>Opening Hours</h4>
                    <p>Sun-Thu 10am-10pm</p>
                    <p>Fri-Sat 10am-6pm</p>
                </article>
                <article class="info">
                    <h4>Location</h4>
                    <p>Street Name</p>
                    <p>Amman, Jordan</p>
                </article>
            </article>
        </section>

        <section id="Services">
            <h3>Services</h3>
            <div class="services-container">
                <article class="servicesboxes">
                    <p>Hair</p>
                </article>
                <article class="servicesboxes">
                    <p>Makeup</p>
                </article>
                <article class="servicesboxes">
                    <p>Nails</p>
                </article>
                <article class="servicesboxes">
                    <p>Packages</p>
                </article>
            </div>
        </section>

        <section id="About">
            <h3>About Us</h3>
            <p>Welcome to Anoud's Beauty Center, where beauty meets luxury. Nestled in the heart of Amman, we specialize in
                offering high-end beauty services designed to rejuvenate, refresh, and elevate your appearance. Our team
                of experienced professionals is passionate about helping you look and feel your best, whether it's
                through a precision haircut, flawless makeup, or a relaxing nail treatment.</p>

            <p>At Anoud's Beauty Center, we believe that beauty is not just about the outer appearance but also about feeling
                confident and comfortable in your own skin. With a welcoming and serene atmosphere, we create a
                personalized experience that caters to your unique needs, ensuring that every visit is nothing short of
                perfection.</p>
        </section>

        <section id="Gifts">
            <h3>Gifts</h3>
            <div class="gifts-container">
                <section class="giftsboxes">
                    <p>20JDs Voucher</p>
                </section>
                <section class="giftsboxes">
                    <p>30JDs Voucher</p>
                </section>
                <section class="giftsboxes">
                    <p>40JDs Voucher</p>
                </section>
                <section class="giftsboxes">
                    <p>50JDs Voucher</p>
                </section>
            </div>
        </section>
    </main>

    <footer class="Contact">
        <h3>Contact Us</h3>
        <ul>
            <li><a href="Telephone:+962795870582"><i class='bx bxs-phone'></i></a></li>
            <li><a href="https://www.instagram.com/graphixybyanoud?igsh=MXRwa213aXQzYWQ0NQ=="><i
                        class='bx bxl-instagram-alt'></i></a></li>
            <li><a href="https://www.linkedin.com/in/anoud-marji-245aa5301"><i class='bx bxl-linkedin-square'></i></a>
            </li>
            <li><i class='bx bxs-envelope'></i></li>
        </ul>

        <p>&copy; All Rights Reserved 2024</p>
    </footer>

</body>

</html>