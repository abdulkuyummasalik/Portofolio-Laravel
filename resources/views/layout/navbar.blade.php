<nav class="navbar">
    <a href="/home" class={{ request()->is('home') ? 'active' : '' }}>Home</a>
    <a href="/about" class={{ request()->is('about') ? 'active' : '' }}>About</a>
    <a href="/service" class={{ request()->is('service') ? 'active' : '' }}>Services</a>
    <a href="/education" class={{ request()->is('education') ? 'active' : '' }}>Education</a>
    <a href="/certificates" class={{ request()->is('certificates') ? 'active' : '' }}>Certificate</a>
    <a href="/projects" class={{ request()->is('projects') ? 'active' : '' }}>Project</a>
    <a href="/contact" class={{ request()->is('contact') ? 'active' : '' }}>Contact</a>
</nav>
