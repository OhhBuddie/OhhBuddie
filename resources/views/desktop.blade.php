<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <!-- Font Awesome for Icons -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet"
    />
  <style>
      
        /* Body reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Content Section (for example purpose) */
        .content {
            padding: 20px;
            margin-bottom: 60px; /* Leave space for bottom navbar */
        }

        .content h1 {
            text-align: center;
            color: #333;
        }

        .content p {
            text-align: justify;
            line-height: 1.6;
            color: #555;
        }

      

        @import url('https://fonts.googleapis.com/css2?family=Turret+Road:wght@200;300;400;500;700;800&display=swap');

body {
    background-color: #f6f5f5;
    margin: 0;
    padding: 0;
}

ul { list-style: none; }
a { text-decoration: none; }

section {
    width: 100%;
    height: 95vh;
    background-image: url('https://i.postimg.cc/pdjRsMfM/bg.png');
    background-repeat: no-repeat;
    background-size: cover;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    background-color: #ffffff;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, .2);
    padding: 0 5%;
}

    nav ul { display: flex; }

        nav ul li a { 
            margin: 30px;
            font-family: myriad pro regular;
            color: #505050;
            font-size: 15px;
            font-weight: 700;
        }

.logo { font-family: 'Turret Road'; color: #000000; font-size: 22px; }
.active { font-weight: bold; color: #2d2a2a; }

.text-container {
    position: absolute;
    left: 13%;
    top: 42%;
    transform: translate(-13%, -42%);
}

    .text-container p { line-height: 0px; margin: 45px 0px 25px; }

        .text-container p:nth-child(1) {
            font-family: calibri;
            font-weight: bold;
            color: #6d6d6d;
            font-size: 22px;
        }
    
        .text-container p:nth-child(2) {
            font-family: calibri;
            font-weight: bold;
            letter-spacing: 1px;
            color: #1a1a1a;
            font-size: 60px;
        }
    
        .text-container p:nth-child(3) {
            font-family: myriad pro regular;
            color: #403e3e;
            font-size: 30px;
            line-height: 30px;
        }

    .text-container button {
        width: 130px;
        height: 42px;
        border-radius: 10px;
        font-family: calibri;
        font-weight: bold;
        font-size: 14px;
        outline: none;
        margin: 0 10px;
    }

.hire-btn { border: 2px solid #373636; cursor: pointer; }
.down-cv { background-color: #0b0b0b; color: #ffffff; border: none; cursor: pointer; }
button:active { transform: scale(1.1); }

.model {
    height: 560px;
    position: absolute;
    bottom: 40px;
    left: 70%;
    transform: translateX(-70%);
}

.about-container {
    width: 80%;
    height: 330px;
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, .2);
    display: flex;
    margin: -7% auto 20px auto;
    position: relative;
    justify-content: space-evenly;
    align-items: center;
}

    .about-container img { height: 250px; }

.about-text { width: 550px; }
    .about-text p:nth-child(1) {
        color: #403e3e;
        font-family: myriad pro;
        font-weight: bold;
        font-size: 23px;
        line-height: 0px;
    }

    .about-text p:nth-child(2) {
        color: #3e3d3d;
        font-size: 13px;
        font-family: myriad pro;
        font-weight: bold;
        line-height: 5px;
    }

    .about-text p:nth-child(3),
    .about-text p:nth-child(4) {
        color: #7e7d7d;
        font-family: calibri;
        font-size: 16px;
    }

    .about-text button {
        width: 120px;
        height: 40px;
        color: #ffffff;
        outline: none;
        border: none;
        font-family: calibri;
        background-color: #262525;
    }

.services { 
    height: 600px; 
    background-color: #ffffff; 
    padding: 2% 10% 0px 10%;
}

.services-text { width: 500px; margin: 50px 0; }

    .services-text p:nth-child(1) {
        font-family: calibri;
        font-weight: bold;
        color: #3e3d3d;
        font-size: 30px;
        line-height: 0px;
    }

    .services-text p:nth-child(2) {
        font-family: calibri;
        font-weight: bold;
        color: #3e3e3d;
        font-size: 15px;
        line-height: 5px;
    }

    .services-text p:nth-child(3) {font-family: calibri; color: #7e7d7d; }

.box1, .box2, .box3 {
    width: 300px;
    height: 320px;
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, .3);
}

.box-container { display: flex; justify-content: space-between; }

.box1 { background-image: url('https://i.postimg.cc/B6b1V6nw/services-1.png'); }
.box2 { background-image: url('https://i.postimg.cc/B6z1908Z/services-2.png'); }
.box3 { background-image: url('https://i.postimg.cc/Z0tBnxF1/services-3.png'); }

    .box1, .box2, .box3 {
        width: 300px;
        height: 320px;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, .3);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

        .box1 span, .box2 span, .box3 span {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: calibri;
            font-weight: bold;
        }

        .box1 p:nth-child(2),
        .box2 p:nth-child(2),
        .box3 p:nth-child(2) {
            color: #ffffff;
            font-family: calibri;
            font-size: 23px;
            line-height: 0px;
        }

        .box1 p:nth-child(3),
        .box2 p:nth-child(3),
        .box3 p:nth-child(3) {
            font-family: calibri;
            text-align: center;
            width: 230px;
            margin: 0 0 20px 0;
            color: #8f8f8f;
        }

        .box1 button, .box2 button, .box3 button {
            width: 100px;
            height: 30px;
            background-color: #ffffff;
            border: none;
            outline: none;
            border-radius: 5px;
        }

.box-container { display: flex; justify-content: space-between; }

.contact-me {
    width: 100%;
    height: 280px;
    background-image: url('https://i.postimg.cc/0NzPFZQY/project-in-your-mind.png');
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

    .contact-me p {
        color: #ffffff;
        font-size: 30px;
        font-family: calibri;
        font-weight: bold;
        border-bottom: 2px solid #ffffff;
    }

    .contact-me button {
        width: 240px;
        height: 40px;
        background-color: #ffffff;
        outline: none;
        border: none;
        font-size: 14px;
        font-weight: bold;
    }

footer {
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}

    footer p { font-family: calibri; }
        footer p:nth-child(1) { font-size: 30px; font-weight: bold; color: #191919; line-height: 10px; font-family: 'Turret Road'; }
        footer p:nth-child(2) { font-size: 16px; width: 600px;; color: #7e7d7d; text-align: center; }

.social-icons { display: flex;} 

    .social-icons a{
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #e6e3e3;
        margin: 20px 10px;
        border-radius: 50%;
    }

    .social-icons i, .a-social-b i { color: #000000; transition: all .5s ease; }
        .social-icons i:hover, .a-social-b i:hover { transform: scale(2); }
            .social-icons .fa-facebook:hover, .a-social-b .fa-facebook:hover { color: #4267b2; }
            .social-icons .fa-x-twitter:hover, .a-social-b .fa-x-twitter:hover { color: #1da1f2; }
            .social-icons .fa-instagram:hover, .a-social-b .fa-instagram:hover { color: #c13584; }
            .social-icons .fa-youtube:hover, .a-social-b .fa-youtube:hover { color: #ff0000; }

.copyright {
    color: #565555;
    font-size: 15px;
    position: absolute;
    left: 50%;
    bottom: 10px;
    transform: translateX(-50%);
}

.a-social-b {
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateX(-50%);
}

    .a-social-b a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        padding: 0;
        margin: 0;
        line-height: 0px;
        background-color: #ffffff;
        border: 1px solid #cbcbcb;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, .2);
    }

@media(max-width: 1200px) {
    .model { display: none; }

    .services { min-height: 100vh; height: 100%; margin-bottom: 20px; }
        .services-text { display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; }
            .services-text p:nth-child(3) { width: 350px; text-align: center; }

    .box-container { flex-direction: column; display: grid; gap: 2rem; justify-content: center; align-items: center; }

}

@media(max-width: 1000px) {
    .about-container { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; min-height: 100vh; }
    .about-text { display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; }
        .about-text button { margin: 10px; }
}

@media(max-width: 720px) {
    .text-container p:nth-child(2) { font-size: 45px; }
    .about-text { max-width: 90%; }
    nav ul { display: none; }
    footer p:nth-child(2) { max-width: 90%; }
    .contact-me p { max-width: 90%; text-align: center; border-bottom: none;}
}

@media(max-width: 420px) {
    .logo { font-size: 16px;}
    .text-container button { margin: 10px; }
    .services-text p:nth-child(3) { max-width: 300px; }
    .contact-me { height: 550px; }
        .contact-me p { font-size: 20px; }
    footer { height: 500px; }
    /* .a-social-b { display: none; } */
}

  </style>
</head>
<body>
    <section>
        <nav>
            <a href="#" class="logo">ULTRA CODE</a>
            
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Team</a></li>
            </ul>
        </nav>

        <div class="text-container">
            <p>Hello,</p>
            <p>I'M LOUIS DOE_DESKTOP</p>
            <p>I am a Software Engineer & Designer</p>
            <button class="hire-btn">Hire me</button>
            <button class="down-cv">Download CV</button>
        </div>

        <img src="https://i.postimg.cc/j2hRb62x/model.png" alt="model img" class="model">
    </section>

    <div class="about-container">
        <img src="https://i.postimg.cc/vZFtjW9g/about-img.png" alt="image">

        <div class="about-text">
            <p>About me</p>
            <p>Developer & Designer</p>
            <p>Hello, my name is Louis Doe. I'm a developer and also a designer. If you have any project or if you want to make a software for your business, you can contact me! I make it as soon as possible. You'll really like my work, if you don't, I'll make changes until you like the results</p>
            <p>I also can design logos, icons, ilustrations, and other visual assets. For Android and Apple, I can create visually appealing apps interfaces, layouts, menus, buttons and icons that ensures a user-friendly experience</p>

            <button class="hire-btn">Hire me</button>
            <button class="down-cv">Download CV</button>
        </div>
    </div>

    <div class="services">
        <div class="services-text">
            <p>Services</p>
            <p>Have any project in mind?</p>
            <p>I'd love to hear about it! Whether it's a small idea or a grand vision, I'm ready to bring it to life. Reach out today and let's make your project a reality!</p>
        </div>

        <div class="box-container">
            <div class="box1">
                <span>1</span>
                <p class="heading">Web Design</p>
                <p class="details">By understanding your needs and goals, I translate those into wireframes and mockups by blending artistic vision with technical skills to craft user-friendly and visually appealing online experiences</p>

                <button>Read More</button>
            </div>
            
            <div class="box2">
                <span>2</span>
                <p class="heading">Web Development</p>
                <p class="details">By combining creativity and technical skills, I can create and maintain websites by using front-end and back-end development, responsive design for most screens and web performance optimization</p>

                <button>Read More</button>
            </div>

            <div class="box3">
                <span>3</span>
                <p class="heading">Security/<abbr title="Search Engine Optimization">SEO</abbr></p>
                <p class="details">I create secure websites with relevant content that meets the needs of your customers. Also I seek mobile optimization, faster loading pages and keywords that helps search engines and rankings</p>

                <button>Read More</button>
            </div>
        </div>
    </div>

    <div class="contact-me">
        <p>If you have any project in your mind</p>
        <button>Contact me</button>
    </div>

    <footer>
        <p>ULTRA CODE</p>
        <p>Hello, my name is Louis Doe. I'm a developer and also a designer. If you have any project or if you want to make a software for your business, you can contact me!</p>

        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>

        <p>Copyright ULTRA CODE</p>
    </footer>

    <div class="a-social-b">
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
    </div>
</body>
</html>