<section class=" top-txt ">
    <div class="head container ">
        <div class="head-txt ">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
        <div class="sing_in_up ">
            <a href="# ">SIGN IN</a>
            <a href="# ">SIGN UP</a>
            @if(session('cart') && count((array) session('cart')) > 0)
                <a href="/view-cart">
                    <i class="fa-solid fa-bag-shopping"> <span
                            class="top-0 end-0 bg-danger text-white rounded-pill text-small px-2 py-1">{{ count((array) session('cart')) }}</span></i></a>
            @endif
        </div>
    </div>
</section>
<nav class="navbar">
    <div class="navbar-container container-fluid">
        <input type="checkbox" name="" id="checkbox">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li><a href="#home">Home</a></li>
            <li><a href="#sellers">Shop</a></li>
            <li><a href="#news">Blog</a></li>
            <li><a href="#contact">Contact</a></li>

            @auth('client')
                <li>Welcome, {{ Auth::guard('client')->user()->name }}</li>
            @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
            @endauth
        </ul>
        <div class="logo">
            <img src="https://i.postimg.cc/TP6JjSTt/logo.webp" alt="">
        </div>
    </div>
</nav>

