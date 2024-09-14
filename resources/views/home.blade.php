@extends('layout.main')
@section('content')
    <section class="home" id="home">
        <div class="home-content">
            <h3>Hello, It's Me</h3>
            <h1><span>Khoyum Masalik</span></h1>
            <h3>And I'm a <span class="multiple-text"></span></h3>
            <p>I am a student at SMK Wikrama Bogor who chose the Software and Games Development (PPLG) major, because I believe that this is the right foundation to start my future career.</p>
            <div class="social-media">
                <a href="https://wa.me/+6282246108750" target="_blank"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://www.instagram.com/khoyum_28/" target="_blank"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.linkedin.com/in/khoyum-masalik-3899482a0/" target="_blank"><i
                        class='bx bxl-linkedin'></i></a>
                <a href="https://github.com/KhoyumMasalik" target="_blank"><i class='bx bxl-github'></i></a>
            </div>
            <a href="./images/cv.pdf"class="btn">Download CV</a>
        </div>
        <div class="home-img">
            <img src="./images/gg.png" alt="home logo">
        </div>
    </section>
@endsection
