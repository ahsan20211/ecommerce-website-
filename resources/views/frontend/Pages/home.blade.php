@extends('frontend.layout.master')
@section('content')
    <section id="home">
        <div class="home_page ">
            <div class="home_img ">
                <img src="https://i.postimg.cc/t403yfn9/home2.jpg" alt="img ">
            </div>
            <div class="home_txt ">
                <p class="collectio ">SUMMER COLLECTION</p>
                <h2>FALL - WINTER<br>Collection 2023</h2>
                <div class="home_label ">
                    <p>A specialist label creating luxury essentials. Ethically crafted<br>with an unwavering commitment
                        to
                        exceptional quality.</p>
                </div>
                <button><a href="#sellers">SHOP NOW</a><i class='bx bx-right-arrow-alt'></i></button>
                <div class="home_social_icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="collection">
        <div class="collections container">
            <div class="content">
                <img src="https://i.postimg.cc/Xqmwr12c/clothing.webp" alt="img"/>
                <div class="img-content">
                    <p>Clothing Collections</p>
                    <button><a href="#sellers">SHOP NOW</a></button>
                </div>
            </div>
            <div class="content2">
                <img src="https://i.postimg.cc/8CmBZH5N/shoes.webp" alt="img"/>
                <div class="img-content2">
                    <p>Shoes Spring</p>
                    <button><a href="#sellers">SHOP NOW</a></button>
                </div>
            </div>
            <div class="content3">
                <img src="https://i.postimg.cc/MHv7KJYp/access.webp" alt="img"/>
                <div class="img-content3">
                    <p>Accessories</p>
                    <button><a href="#sellers">SHOP NOW</a></button>
                </div>
            </div>
        </div>
    </section>
    <section id="sellers">

        <div class="seller container">
            <h2>Hot Sales</h2>
            <div class="best-seller">
                @foreach($productData as $data)
                    <a href="/product/detail/{{$data->id}}">
                        <div class="best-p1">
                            <img src="{{Storage::url($data->image)}}" alt="img" class="object-fit-contain">
                            <div class="best-p1-txt">
                                <div class="name-of-p">
                                    <h4 class="text-black">{{$data->title}}  </h4>
                                    <h5 class="text-danger">{{$data->category->title}}</h5>
                                </div>
                                <div class="price text-black">{{$data->price }}</div>
                                <div class="buy-now">
                                    <button><a href="">Buy Now</a></button>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section id="news">
        <div class="news-heading">
            <p>LATEST NEWS</p>
            <h2>Fashion New Trends</h2>
        </div>
        <div class="l-news container">
            <div class="l-news1">
                <div class="news1-img">
                    <img src="https://i.postimg.cc/2y6wbZCm/news1.jpg" alt="img">
                </div>
                <div class="news1-conte">
                    <div class="date-news1">
                        <p><i class='bx bxs-calendar'></i> 12 February 2022</p>
                        <h4>What Curling Irons Are The Best Ones</h4>
                        <a href="https://www.vogue.com/article/best-curling-irons" target="_blank">read more</a>
                    </div>
                </div>
            </div>
            <div class="l-news2">
                <div class="news2-img">
                    <img src="https://i.postimg.cc/9MXPK7RT/news2.jpg" alt="img">
                </div>
                <div class="news2-conte">
                    <div class="date-news2">
                        <p><i class='bx bxs-calendar'></i> 17 February 2022</p>
                        <h4>The Health Benefits Of Sunglasses</h4>
                        <a href="https://www.rivieraopticare.com/blog/314864-the-health-benefits-of-wearing-sunglasses_2/"
                           target="_blank">read more</a>
                    </div>
                </div>
            </div>
            <div class="l-news3">
                <div class="news3-img">
                    <img src="https://i.postimg.cc/x1KKdRLM/news3.jpg" alt="img">
                </div>
                <div class="news3-conte">
                    <div class="date-news3">
                        <p><i class='bx bxs-calendar'></i> 26 February 202</p>
                        <h4>Eternity Bands Do Last Forever</h4>
                        <a href="https://www.briangavindiamonds.com/news/eternity-bands-symbolize-love-that-lasts-forever/"
                           target="_blank">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact container">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.121169986175!2d73.90618951442687!3d18.568575172551647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c131ed5b54a7%3A0xad718b8b2c93d36d!2sSky%20Vista!5e0!3m2!1sen!2sin!4v1654257749399!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <form action="https://formspree.io/f/xzbowpjq" method="POST">
                <div class="form">
                    <div class="form-txt">
                        <h4>INFORMATION</h4>
                        <h1>Contact Us</h1>
                        <span>As you might expect of a company that began as a high-end interiors contractor, we pay strict
                        attention.</span>
                        <h3>USA</h3>
                        <p>195 E Parker Square Dr, Parker, CO 801<br>+43 982-314-0958</p>
                        <h3>India</h3>
                        <p>HW95+C9C, Lorem ipsum dolor sit.<br>411014</p>
                    </div>
                    <div class="form-details">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <textarea name="message" id="message" cols="52" rows="7" placeholder="Message"
                                  required></textarea>
                        <button>SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
