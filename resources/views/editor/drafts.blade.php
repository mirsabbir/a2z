<!DOCTYPE html>
<html lang="en">
    <head>
        <title>search-result</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        <!-- css -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg nav_custom">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
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
        <!-- nav section end -->




        <!-- main body -->
         <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <section class="blog">
                        <div class="content_heading">
                            <h2>Drafts</h2>
                        </div>
                        <div class="search_blog">
                            @foreach($drafts as $draft)
                            <div class="blog_content">
                                <div class="latest_post_all">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{'/editor/drafts/'.$draft->slug}}"><img src="{{asset($draft->image)}}" alt="images"></a>
                                        </div>
                                        <div class="col-9">
                                            <a href="{{'/editor/drafts/'.$draft->slug}}"><h5>{{$draft->title}}</h5></a>
                                            <p>{{substr(strip_tags($draft->body),0,100)}}<a href="{{'/editor/drafts/'.$draft->slug}}"><span>read more &rarr;</span></a> </p>
                                            <i>Admin • {{ $draft->created_at }}</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </section>
                </div>

                <div class="col-lg-4">
                    <section class="blog_single">
                        <div class="content_heading">
                            <a href="/editor/drafts/create" style="text-decoration:none;color:white;"><h4>New</h4></a>
                        </div>
                        
                    </section>
                </div>

            </div>
                       
        </div>
        <!-- footer section start here -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('images/logo.png')}}" alt="logo">
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