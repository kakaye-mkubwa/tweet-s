<!doctype html>

<html lang="en">
<?php
  require_once ('utils/Config.php');

  $results = array();
  $tweetFunctions = new Config();

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (isset($_POST['search_q']))
    {
      $searchQ = htmlspecialchars($_POST['search_q']);
      $results= $tweetFunctions -> getTweets($searchQ);
    }
  }
  // $resultsArray = $results;
  // $resultsArray = json_decode($results, true);
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search_style.css">
    <!-- <link href="css/fontawesome.css" rel="stylesheet"> -->
    <!-- <link href="css/brands.css" rel="stylesheet">

    <!- Link Swiper's CSS -->
    <link rel="stylesheet" href="plugins/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="css/swiper_design.css">

    <link href="css/solid.css" rel="stylesheet">
    <script src="plugins/jquery-1.8.3/jquery-1.8.3.min.js"></script>
    <title>G-Tweet</title>
    <style>

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
    <div class="container"><a class="navbar-brand">G-Tweet</a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#home-container">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services-container">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#search-container">Search </a></li>
                <li class="nav-item"><a class="nav-link" href="#analytics-container">Analytics </a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">login</a> <a href="#"
                                                                                                       class="btn btn-info my-2 my-sm-0 text-uppercase">sign
                up</a>
            </form> -->
        </div>
    </div>
</nav>
<div id="home-container" class="container-fluid gtco-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Providing the best <span>tweet</span> analysis tool you can have</h1>
                <!-- <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus turpis nisl. </p> -->
                <a href="#contact">Contact Us <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            <div class="col-md-6">
                <div class="card"><img class="card-img-top img-fluid" src="images/banner-img.png" alt=""></div>
            </div>
        </div>
    </div>
</div>
<div id="services-container" class="container-fluid gtco-feature">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="card">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="images/learn-img.jpg" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> Search various tweets </h2>
                <!-- <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus turpis nisl, vitae dictum mi
                    semper convallis. Ut sapien leo, varius ac dapibus a, cursus quis ante. </p> -->
                    <p>We provide the platform for you to
                      search various tweets based on keywords and be able to analyse them.</p>
                <p>
                    <!-- <small>Nunc sodales lobortis arcu, sit amet venenatis erat placerat a. Donec lacinia magna nulla,
                        cursus impediet augue egestas id. Suspendisse dolor lectus, pellentesque quis tincidunt ac,
                        dictum id neque.
                    </small> -->
                    <small>You can try us out by searching a tweet based on keyword(s). It works
                    </small>
                </p>
                <a href="#search-container">Try it out <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>
<div id="analytics-container" class="container-fluid gtco-numbers-block">
    <div class="container">
        <svg width="100%" viewBox="0 0 1600 400">
            <defs>
                <linearGradient id="PSgrad_03" x1="80.279%" x2="0%"  y2="0%">
                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                </linearGradient>

            </defs>
            <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

            <path fill-rule="evenodd"  fill="url(#PSgrad_03)"
                  d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>

            <clipPath id="ctm" fill="none">
                <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>
            </clipPath>

            <!-- xlink:href for modern browsers, src for IE8- -->
            <image  clip-path="url(#ctm)" xlink:href="images/word-map.png" height="800px" width="100%" class="svg__image">

            </image>

        </svg>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">100</h5>
                        <p class="card-text">Searched Tweets</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">200</h5>
                        <p class="card-text">Analysed Tweets</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">530</h5>
                        <p class="card-text">Requests Today</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">941</h5>
                        <p class="card-text">Tweets Analysed Today</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="search-container" class="container-fluid gtco-banner-area">
    <div class="container">
        <center><h2>Click to search.</h2></center>
        <div class="row">
        </div>

        <form id="search_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="search-container">
            <input id="search_input" name ="search_q" type="text" placeholder="Enter keyword...">
            <div id="search_button" class="search"></div>
            <!-- <input id="form_submit" type="submit"> -->
          </div>
        </form>

    </div>
</div>
<div id="tweet-results-div" class="container-fluid gtco-testimonials">
    <div class="container">
        <h2>Tweet Results</h2>
        <div class="swiper-container">
          <div class="swiper-pagination"></div>
           <div class="swiper-wrapper">
             <?php
             foreach ($results as $result)
             {
               // print_r($result);
               ?>
               <!-- // code...
               // echo $result['id']; -->

               <div class="swiper-slide">
                 <div>
                   <!-- <div class="card text-center"><img class="card-img-top" src="images/customer1.jpg"echo $result->profile_background_image_url; alt=""> -->
                   <div class="card text-center"><img class="card-img-top" src="<?php echo $result->profile_image_url?>"; alt="">


                       <div class="card-body">
                           <h5><?php echo $result ->name;?> <br/>
                               <span> <?php echo $result ->screen_name;?></span></h5>
                           <p id="card_text" class="card-text"><?php echo $result ->status->text ;?></p>
                       </div>
                   </div>
                 </div>
               </div>
               <!-- echo $result -> id; profile_image_url-->
               <?php
             }?>
             <!-- <div class="swiper-slide">
                 <div class="card text-center"><img class="card-img-top" src="images/customer2.jpg" alt="">
                     <div class="card-body">
                         <h5>Missy Limana<br/>
                             <span> Project Manager </span></h5>
                         <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                             impedit quo minus id quod maxime placeat ” </p>
                     </div>
                 </div>
             </div>
             <div class="swiper-slide">
                 <div class="card text-center"><img class="card-img-top" src="images/customer3.jpg" alt="">
                     <div class="card-body">
                         <h5>Aana Brown<br/>
                             <span> Project Manager </span></h5>
                         <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                             impedit quo minus id quod maxime placeat ” </p>
                     </div>
                 </div>
             </div>
             <div class="swiper-slide">
                 <div class="card text-center"><img class="card-img-top" src="images/customer3.jpg" alt="">
                     <div class="card-body">
                         <h5>Aana Brown<br/>
                             <span> Project Manager </span></h5>
                         <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                             impedit quo minus id quod maxime placeat ” </p>
                     </div>
                 </div>
             </div> -->
           </div>

             <!-- Add Arrows -->
           <div class="swiper-button-next"></div>
           <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>


<footer class="container-fluid" id="gtco-footer">
    <div  class="container">
        <div class="row">
            <div class="col-lg-6" id="contact">
                <h4> Contact Us </h4>
                <input type="text" class="form-control" placeholder="Full Name">
                <input type="email" class="form-control" placeholder="Email Address">
                <textarea class="form-control" placeholder="Message"></textarea>
                <a href="#" class="submit-button">Send <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-6">
                        <h4>Company</h4>
                        <ul class="nav flex-column company-nav">
                            <li class="nav-item"><a class="nav-link" href="#home-container">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#services-container">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="#search-container">Search</a></li>
                            <li class="nav-item"><a class="nav-link" href="#analytics-container">Analytics</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact-container">Contact</a></li>
                        </ul>
                        <h4 class="mt-5">Follow Us</h4>
                        <ul class="nav follow-us-nav">
                            <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"
                                                                                      aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"
                                                                                 aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google"
                                                                                 aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"
                                                                                 aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- <script src="js/popper.min.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel js-->
<script src="owl-carousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src = "js/user_script.js"></script>


<!-- Swiper JS -->
 <script src="plugins/swiper/js/swiper.min.js"></script>

</body>
</html>
