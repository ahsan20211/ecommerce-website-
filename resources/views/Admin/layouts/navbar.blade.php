<input type="checkbox" name="MenuToggle" id="MenuToggle">
<aside class="sidebar">
<nav>
    <a href="#" class="logo">Logo</a>
    <div class="nav_items">
        <a href="/admin/product" class="active">Product</a>
        <a href="/admin/order">Orders</a>
        <a href="/admin/brand">Brand</a>
        <a href="/admin/category">Categories</a>
    </div>
</nav>
</aside>
<main class="right">
    <label for="MenuToggle" class="toggle__icon">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </label>

    <style>

        /*sidebar*/
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,600&display=swap');
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            position: relative;
            width: 100%;
            height: 100vh;
            font-family: 'Raleway', sans-serif;
            background: #f2f2f2;
            overflow-x: hidden;
            z-index: 1;
            display: flex;
        }

        a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
        }

        #MenuToggle {
            display: none;
        }


        /* Left */

        .sidebar {
            position: relative;
            width: 250px;
            height: 100%;
            background: #020321;
            opacity: 1;
            transform: translateX(0);
            transition: all .8s ease;
        }


        /* For Navbar */

        .logo {
            display: block;
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            letter-spacing: .3px;
            padding: 20px 0px;
            background: #000831;
        }

        .nav_items {
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .nav_items a {
            display: block;
            padding: 20px 0px;
            font-size: 18px;
            font-weight: 400;
            text-align: center;
            transition: all .4s ease;
            text-decoration: none;
            color: #fff;
        }

        .nav_items a:hover,
        .nav_items a.active {
            background: #000831;
        }


        /* Right */

        .right {
            position: relative;
            width: calc(100% - 250px);
            height: 100%;
            padding: 30px 30px;
            overflow-x: hidden;
            display: flex;
            align-items: center;
            transition: all .8s ease;
        }

        .content {
            width: 100%;
        }



        /* Toggle bar */

        .toggle__icon {
            position: absolute;
            top: 24px;
            left: 30px;
            cursor: pointer;
        }

        .toggle__icon .line {
            width: 24px;
            height: 3px;
            background-color: #000831;
            margin: 6px 0;
            display: block;
            border-radius: 8px;
        }


        /* If Checked */

        #MenuToggle:checked~.sidebar {
            width: 0;
            transform: translateX(-250px);
        }

        #MenuToggle:checked~.right {
            width: 100%;
        }
        /*sidebar end*/

    </style>
