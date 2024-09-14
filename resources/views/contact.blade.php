@extends('layout.main')
@section('content')
    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>

        <form action="https://formspree.io/f/moqggdlg" method="POST">
            <div class="input-box">
                <input name="name"="name" placeholder="Full Name" required autocomplete="off">
                <input type="email" name="email" placeholder="Email Address" required autocomplete="off">
            </div>
            <div class="input-box">
                <input type="number" name="number" placeholder="Mobile Number" required autocomplete="off">
                <input type="text" name="text" placeholder="Email Subjeck" required autocomplete="off">
            </div>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required autocomplete="off"></textarea>
            <button type="submit" value="Send Message" class="btn"> Send Message</button>
        </form>
    </section>
@endsection
