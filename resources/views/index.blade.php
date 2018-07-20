<!DOCTYPE html>
<html lang="en">
    <head>
        <title>home-blog</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        
        <!-- css -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg nav_custom">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="images/logo.png" alt="logo">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="ion-android-menu"></span>
            </button>
            
            
          
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> -->

                        @foreach($populars as $popular)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-down" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$popular->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="menu_item">
                                    <div class="menu_heading">
                                        <h5>Latest {{$popular->name}} post</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="menu_image">
                                                <a href="{{$popular->name.'/'.$popular->posts[0]->slug}}"><img src="{{asset('storage/'.$popular->posts[0]->image)}}" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="menu_text">
                                                <a href="{{$popular->name.'/'.$popular->posts[0]->slug}}">
                                                    <p>{!! substr(strip_tags($popular->posts[0]->body),0,100) !!} &rarr;</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <div class="menu_item">
                                    <div class="menu_link">
                                        <div class="menu_heading">
                                            <h5>Popular {{$popular->name}} post</h5>
                                        </div>
                                        <a href="{{$popular->name.'/'.$popular->posts[1]->slug}}">
                                            <p> &diams; {{ substr($popular->posts[1]->title,0,60)}} &rarr;</p>
                                        </a>
                                        <a href="{{$popular->name.'/'.$popular->posts[2]->slug}}">
                                            <p> &diams; {{ substr($popular->posts[2]->title,0,60)}}  &rarr;</p>
                                        </a>
                                    </div>
                                </div>

                                    
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{$popular->name}}">show more</a>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <!-- search box -->
                    <form action="{{route('search')}}">
                        <div class="search_box">
                            <input class="form-control" type="search" placeholder="Search" name="q">
                            <button class="search_button ion-android-search" type="submit"></button>
                        </div>
                    </form>
                </div>
                <!-- search box for responsive -->
                <form action="#">
                    <div class="search_box_2">
                        <input class="form-control" type="search" placeholder="Search">
                        <button class="search_button ion-android-search" type="submit"></button>
                    </div>
                </form>
            </div>
            
        </nav>


        

        <!-- header section start here -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header_text">
                            <h1> The forerunner on web Hosting </h1>
                            <p>Get best, reliable advice on hosting from our experts. Our expert team analyse for giving you the best result.
                            get coupon codes from us and purchase your favourite hosting.</p>
                            <a href=""><button class="btn"> See blog posts </button></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header_image">
                            <img src="images/header.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end here -->




         <!-- slider section start here -->
         <section class="slider">
            <div class="container">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        
                            <div class="row">
                                @for($i=0;$i<4;$i++)
                                    <?php
                                        $post = $populars[0]->posts[$i];
                                    ?>
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset('storage/'.$post->image)}}" alt="images">
                                        <p>{{$populars[0]->name}}</p>
                                        <figcaption>
                                            <a href="{{$populars[0]->name.'/'.$post->slug}}"><h6>{{substr($post->title,30)}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                            </div>
                            
                        </div>
                        <div class="carousel-item">
                        
                            <div class="row">
                                @for($i=0;$i<4;$i++)
                                    <?php
                                        $post = $populars[1]->posts[$i];
                                    ?>
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset('storage/'.$post->image)}}" alt="images">
                                        <p>{{$populars[1]->name}}</p>
                                        <figcaption>
                                            <a href="{{$populars[1]->name.'/'.$post->slug}}"><h6>{{substr($post->title,30)}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                            </div>
                            
                        </div>
                        <div class="carousel-item">
                        
                            <div class="row">
                                @for($i=0;$i<4;$i++)
                                    <?php
                                        $post = $populars[2]->posts[$i];
                                    ?>
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset('storage/'.$post->image)}}" alt="images">
                                        <p>{{$populars[2]->name}}</p>
                                        <figcaption>
                                            <a href="{{$populars[2]->name.'/'.$post->slug}}"><h6>{{substr($post->title,30)}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul> 
                        
                </div>
            </div>
         </section>
        <!-- slider section end here -->

        

            

        


        <!-- latest post section start here -->
        <section class="latest">
            <div class="container">
                <div class="row">
                @foreach($latests as $latest)
                    <div class="col-lg-4">
                        <div class="latest_post">
                            <div class="heading">
                                <h5>Latest {{$latest->name}}</h5>
                            </div>
                            @for($i=0;$i<4;$i++)
                            <?php
                                $post = $latest->posts[$i]; 
                            ?>
                            <div class="latest_post_all">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="{{$latest->name.'/'.$post->slug}}"><img src="{{asset('storage/'.$post->image)}}" alt="images"></a>
                                    </div>
                                    <div class="col-9">
                                        <a href="{{$latest->name.'/'.$post->slug}}"><h6>{{substr($post->title,0,65)}}</h6></a>
                                        <i>Admin • {{$post->created_at}}</i>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <a href="{{$latest->name}}"><button>BROWSE MORE</button></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
        <!-- latest blog section end here -->



        <!-- about section start-->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About Us</h2>
                        <p> <strong>Lorem ipsum dolor sit amet consectetur:</strong> adipisicing elit. Blanditiis cupiditate exercitationem at aut quia. Est recusandae aperiam doloribus ullam magnam eligendi voluptates earum, commodi iusto hic quas blanditiis, harum aspernatur!</p>
                        <p style="margin-bottom: 30px;"> <strong>Lorem ipsum dolor sit amet:</strong> consectetur adipisicing elit. Quibusdam alias eligendi quidem? Cumque facilis sed nemo corrupti assumenda porro consequuntur? Optio non voluptates itaque rerum eaque doloribus facilis nostrum adipisci?</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="documentary">
                            <div class="container">
                                <iframe src="https://www.youtube.com/embed/ewrBalT_eBM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end-->



        <!-- counterup section start here -->
                <!-- Numbers -->
                <div class="numbers text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">258</h5>
                                    <h6>Review Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">735</h5>
                                    <h6>Coupon Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">3910</h5>
                                    <h6>Blog Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">600000</h5>
                                    <h6>User Hit</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Numbers -->
            <!-- counterup section end here -->



        <!-- footer section start here -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="images/logo.png" alt="logo">
                        <p><strong>Our Mission:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint aspernatur, id dicta nulla tempora enim expedita praesentium reiciendis? Quibusdam nemo a voluptate eos repudiandae maiores reprehenderit illum mollitia at ratione.</p>
                    </div>
                    <div class="col-lg-3">
                        <div class="heading">
                            <h6>Latest Advice</h6>
                        </div>
                        <div class="footer_select_option">
                            <select>
                                <option value="0">---Reviews---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
    
                            <select>
                                <option value="0">---Coupon---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
    
                            <select>
                                <option value="0">---Blog---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="social">
                            <div class="heading">
                                <h6>Follow Us</h6>
                            </div>
                            <ul>
                                <li><a href="#" class="ion-social-facebook"></a></li>
                                <li><a href="#" class="ion-social-twitter"></a></li>
                                <li><a href="#" class="ion-social-googleplus-outline"></a></li>
                                <li><a href="#" class="ion-social-linkedin-outline"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <span>© 2018 a2zhosting.com | Digital Brands | All Rights Reserved</span>
            </div>
        </footer>
        <!-- footer section end here -->
    
    
        
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- js for nav -->
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
        
    </body>
</html>