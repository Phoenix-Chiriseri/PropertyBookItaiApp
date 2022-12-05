<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Neil Properties</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<body>
<header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
const spinner = document.getElementById("spinner");
spinner.removeAttribute("hidden");
jQuery(function($){
  $(document).ajaxSend(function() {
    $("#overlay").fadeIn(300);　
  });
    //make an ajax request to the server and fetch the data from the api    
    $.ajax({
      type: 'GET',
      crossDomain:'true',
       url:'https://api.openweathermap.org/data/2.5/weather?lat=-17.824858&lon=31.053028&appid=a2755480e2c07f45b35fe4669c73ec53&units=metric',
      success: function(response){
        //console.log(data);
        spinner.setAttribute("hidden", "");
        var weatherData = response;
        //var locationName = response.name;
        var weatherDescription = weatherData.weather[0].description;
        var temperature = weatherData.main.temp;
        $("#showHarareWeather").html(`<div class="card" style='color:black;'>
            Current Weather For Harare (Open Weather Map Api)
        <div class="card-body" style='color:black;'>Description ${weatherDescription}<br>
            Temperature ${temperature}
        </div>
        </div>`);
      }
     }).done(function() {
        setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
  });   
});
});
// Add remove loading class on body element based on Ajax request status
$(document).on({
    ajaxStart: function(){
        $(".myBody").addClass("loading"); 
    },
    ajaxStop: function(){ 
        $(".myBody").removeClass("loading"); 
    }    
});
</script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script>
$(document).ready(function(){
    $("#calculateMortgage").on("click",function(e){
        //("#result").hide();
        var receivedLoanAmount = $("#loanAmount").val();
        var receivedInterestRate = $("#interestRate").val()/100;
        var receivedNumberOfPayment = $("#numberOfPayments").val();
        e.preventDefault();
        //transition interest rate
        var transitionInterestRate = Math.pow(receivedInterestRate+1,receivedNumberOfPayment);
        //principal
        var mortgage = receivedLoanAmount*receivedInterestRate*transitionInterestRate/(transitionInterestRate-1);
        var roundedMortgage = mortgage.toFixed(2)
        $("#result").show();
        //show the resultant mortgage on the screen
        $("#result").html('Mortgage is'+ '' + ''+  roundedMortgage);
    });
});
</script>
<!-- Intro settings -->
<style>

    #button{
  display:block;
  margin:20px auto;
  padding:10px 30px;
  background-color:#eee;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{   
  position: fixed;
  top: 0;
  z-index: 100;
  width: 20%;
  height:20%;
  display: none;
  background: rgba(0,0,0,0.0);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 100px;
  height: 100px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
    .card-custom {
  overflow: hidden;
  min-height: 450px;
  border: 0;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
}

.card-custom-img {
  height: 200px;
  min-height: 200px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-color: inherit;
}
.overlay{
    display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    background: rgba(255,255,255,0.8) url("loader.gif") center no-repeat;
}
/* Turn off scrollbar when body element has the loading class */
body.loading{
    overflow: hidden;   
}
/* Make spinner image visible when body element has the loading class */
body.loading .overlay{
    display: block;
}
/* First border-left-width setting is a fallback */
.card-custom-img::after {
  position: absolute;
  content: '';
  top: 161px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-top-width: 40px;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 545px;
  border-left-width: calc(575px - 5vw);
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  border-left-color: inherit;
}

.card-custom-avatar img {
  border-radius: 50%;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
  position: absolute;
  top: 100px;
  left: 1.25rem;
  width: 100px;
  height: 100px;
}
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }

    section {
  height:100vh;
}
.pricing-table .card {
  -webkit-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  -webkit-border-radius: 15px;
  border-radius: 15px; }
  .pricing-table .card .card-title {
    font-size: 1rem;
    letter-spacing: .2rem;
    font-weight: 500; }
  .pricing-table .card .card-price {
    font-size: 2.7rem; }
    .pricing-table .card .card-price .term {
      font-size: .875rem; }
  .pricing-table .card .fa-ul li:not(:last-child) {
    margin-bottom: 1rem; }

    #spinner:not([hidden]) {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

#spinner::after {
  content: "";
  width: 80px;
  height: 80px;
  border: 2px solid #f3f3f3;
  border-top: 3px solid #f25a41;
  border-radius: 100%;
  will-change: transform;
  animation: spin 1s infinite linear;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@media (min-width: 992px) {
  .pricing-table .card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    -webkit-box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
    box-shadow: 0 0.5rem 1rem 0 rgba(0,
  </style>

  <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light"style="background-color:#0F17CB;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
<a class="nav-link" href="/" style="color:white;"><i class = "fa fa-home"> </i> Home</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="#services" style="color:white;"><i class = "fa fa-cogs"></i>Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pricing" style="color:white;"><i class = "fa fa-dollar"></i> Pricing</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="me-3" href="/login" style="color:white;">Login
        <i class="fas fa-lock-open" style="color:white;"></i>
      </a>
       <a class="me-3" href="/register" style="color:white;">Register
        <i class="fas fa-keyboard" style="color:white"></i>
      </a>

      <!-- Notifications -->
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="25"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
  <!-- Navbar -->

  <!-- Background image -->
  <div
    id="intro-example"
    class="p-6 bg-image"
    
  >
    <div class="mask" style="background-color:#0F17CB;padding: 100px;">
       <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(!empty($record[0]->name))
                <h1 style="color:white;" class="animate__animated animate__slideInRight">{{$record[0]->name}}</h1>
                @else
                <h1 style="color:white;" class="animate__animated animate__slideInRight">Please Add Into Text Into The Database</h1>
                @endif
                <br>
                @if(!empty($record[0]->description))
                <h5 style="color:white;margin-left" class="animate__animated animate__slideInLeft"><small>{{$record[0]->description}}</small></h5>
                <hr>
                @else
                <h5 style="color:white;margin-left" class="animate__animated animate__slideInLeft"><small>Please Add The Description</small></h5>
                @endif
                <hr>
        <button type="button" class="btn btn-primary" style="background-color:white;color:black;">Get Started</button>
        <button type="button" class="btn btn-primary" style="background-color:#0F17CB;color:white;"><i class = "fa fa-play"></i> Watch Video</button>
        <hr>
        </div>  
        <div class="col-md-6">
            <img src="{{ asset('images/' . $record[0]->path) }}" class = "img-thumbnail .shadow-5 animate__animated animate__fadeInUp">
        </div> 
        </div>
        </div>
        </div>
</header>
<body>
<hr>
<div class = "container">
<p  style="color:black;">Calculate your mortgage using our mortgage calculator<a href="#" class="text-reset"></a></p>
<form class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Enter Loan Amount</label>
    <div class="input-group">
      <div class="input-group-text">$</div>
      <input type="text" class="form-control" placeholder="Enter Loan Amount" id = "loanAmount" required />
    </div>
  </div>
   <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Enter Interest Rate</label>
    <div class="input-group">
      <div class="input-group-text">%</div>
      <input type="text" class="form-control" id="interestRate" placeholder="Enter Interest Rate" required />
    </div>
  </div>
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Enter Number Of Payments</label>
    <div class="input-group">
      <div class="input-group-text">+</div>
      <input type="text" class="form-control" id="numberOfPayments" placeholder="Enter Num Of Payments" required />
    </div>
  </div>
  <div class="col-12">
    <button type="btn btn-primary" class="btn btn-primary" id = "calculateMortgage"><i class = "fa fa-add"></i> Calculate</button>
  </div>
  <div class="col-12">
   <small><h5 id = "result"></h5></small>
  </div>
</form>
</div>
<div class="row g-0 bg-light position-relative" style="padding: 100px;">
  <div class="col-md-6 mb-md-4 p-md-4">
    <img
      src="{{ asset('images/' . $story[0]->path) }}" style="height: ;"
      class="w-100 .shadow-5 img-thumbnail animate__animated animate__fadeInLeft"
      alt="hollywood sign"
    />
  </div>
  <div class="col-md-6 p-4 ps-md-0">
    <figure>
  <figcaption class="blockquote-footer" style="color:black;">
    Our Story<cite title="Source Title"></cite>
  </figcaption>
</figure>
    @if(!empty($story[0]->story_who))
    <p class = "animate__animated animate__fadeInDown" style="color:black;">
     {{$story[0]->story_who}}
    </p>
    @else
    <p class = "animate__animated animate__fadeInDown" style="color:black;">
     Please Add The Story
    </p>
    @endif
    
    <!-- Pills navs -->
<!-- Pills navs -->
<ul class="nav nav-pills mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active bg-primary"
      id="ex1-tab-1"
      data-mdb-toggle="pill"
      href="#ex1-pills-1"
      role="tab"
      aria-controls="ex1-pills-1"
      aria-selected="true" style="color:white;"
      >Who we are</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-2"
      data-mdb-toggle="pill"
      href="#ex1-pills-2"
      role="tab"
      aria-controls="ex1-pills-2"
      aria-selected="false"
      >Our Vision</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-3"
      data-mdb-toggle="pill"
      href="#ex1-pills-3"
      role="tab"
      aria-controls="ex1-pills-3"
      aria-selected="false"
      >Our Mission</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content" id="ex1-content">
  <div
    class="tab-pane fade show active"
    id="ex1-pills-1"
    role="tabpanel"
    aria-labelledby="ex1-tab-1"
  >
   {{$story[0]->story_description}}
     <div id = "showHarareWeather" class = "row"></div>
     <div hidden id="spinner"></div>
     <div id="overlay">
     <div class="cv-spinner">
  </div>
</div>
  </div>
  <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
     @if(!empty($story[0]->story_vision))
     {{$story[0]->story_vision}}
     @else
     Please Add A Vision
     @endif
     <div id = "showHarareWeather" class = "row"></div>
  </div>
  <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    @if(!empty($story[0]->story_mission))
    {{$story[0]->story_mission}}
    @else
    Please Add A Mission
    @endif
     <div id = "showHarareWeather" class = "row"></div>
     <div class="overlay"></div>
  </div>
</div>
<!-- Pills content -->
</div>

<div class="container">
  <div class="row">
    <div class="col text-center">
      <button class="btn btn-outline-primary btn-rounded text-center">Services</button>
    </div>
  </div>
</div>
<!--Services Section!-->
<!--<button type="button" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">Services</button>!-->
<!--<div class="container">
    <div class="card mb-5" id = "services" style="margin-top: 50px;">
      <div class="card-body">
        <a class=" btn btn-outline-primary btn-rounded text-center">Services<i class="fas fa-cogs"></i></a>
      </div>
    </div>
  <div class = "container">
        <div class = "row">
            <div class= "col-md-4">
                <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/house-icon.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Houses For Sale</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
</div>
            </div>

             <div class = "col-md-4">

                 <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/apartment.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Apartments For Rent</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
                 
</div>

            </div>

             <div class = "col-md-4">

                 <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/housetrailer.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Trailers For Rent</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
</div>
            </div>

        </div>

  </div>

  <br>
  <div class = "container">

        <div class = "row">

            <div class = "col-md-4">
  <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/containerHome.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Container homes for sell</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
</div>

            </div>

             <div class = "col-md-4">
                 <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/houseBoat.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Houseboat for sell</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
</div>

            </div>

             <div class = "col-md-4">

                 <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/cabin.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Cabin for sell</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
            </div>

        </div>

  </div>!-->

<!--<div class = "row">
 @foreach($services as $service)
<div class = "col-md-4">
  <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/containerHome.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">{{$service->name}}</h4>
    <p class="card-text">{{$service->description}}<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
</div>
 @endforeach
</div>  
!-->
@if($services>0)
<div class="row" id = "services">
   @foreach($services as $service)
   <div class="col-md-4 portfolio-item">
    <img class="rounded" src="images/containerHome.png" alt="Avatar" style="width:100px;height: 100px;" />
      <h4>
         {{$service->name}}
      </h4>
      <h5>
         {{$service->description}}
      </h5>
   </div>
   @endforeach
</div>
@else
<h1>No Content In Database
@endif
<!--<div class = "col-md-4">
  <div class="card card-custom bg-white border-white">
  <div class="card-custom-img"></div>
  <div class="card-custom-avatar">
    <img class="img-fluid .shadow-5" src="images/containerHome.png" alt="Avatar" />
  </div>
  <div class="card-body" style="overflow-y: auto">
    <h4 class="card-title">Container homes for sell</h4>
    <p class="card-text">We sell houses at cheap prices<a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks"></a></p>
  </div>
  <div class="card-footer" style="background: inherit; border-color: inherit;">
  </div>
    </div>!-->
  </div>
 
 <div class="container">
  <div class="row">
<div class="col text-center" style="margin-top:145px;">
      <button class="btn btn-outline-primary btn-rounded text-center">Pricing</button>
    </div>
  </div>
</div>
  <!--pricing section!-->
    <section id="pricing" class="pricing-table d-flex align-items-center blue-gradient">
   <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
             <div class="container">
  <div class="row">
    <div class="col text-center">
      <button class="btn btn-outline-primary btn-rounded text-center">Beginner Package</button>
    </div>
  </div>
</div>    
            <h6 class="card-price text-center">{{$prices[0]->price}}<span class="term">/month</span></h6>
            <div class = "container">
             <div class="container">
  <div class="row">
    <div class="col text-center">
      <button class="btn btn-outline-primary text-center">Start Free Trial</button>
    </div>
  </div>
</div>
            </div>
            <hr class="my-4">
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Two Bedroom House</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>One Bathroom and Toilet</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>One Jaccuzzi</li>
              <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>No Garage</li>
              <div class="col text-center">
              </div>
            </ul>
            </div>
        </div>
      </div>
      <div class="col-lg-4 ">
        <div class="card mb-5 mb-lg-0 .shadow-5">
          <div class="card-body">
             <div class="container">
  <div class="row">
    <div class="col text-center">
      <button class="btn btn-primary btn-rounded text-center">Medium Package</button>
    </div>
  </div>
</div>
            <h6 class="card-price text-center">{{$prices[1]->price}}<span class="term">/month</span></h6>
             <div class="col text-center">
      <button class="btn btn-primary  text-center">Start Free Trial</button>
    </div>
            <hr class="my-4">
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Three Bedroom House</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Two Bathrooms And Toilets</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>One Garage</li>
              <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>No Built In Cabinets</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
           <div class="col text-center">
      <button class="btn btn-outline-primary text-center">Professional Package</button>
    </div>
            <h6 class="card-price text-center">{{$prices[2]->price}}<span class="term">/month</span></h6>
             <div class="col text-center">
      <button class="btn btn-primary btn-outline text-center">Start Free Trial</button>
    </div>
            <hr class="my-4">
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Seven Bedroom House</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Three bathrooms and one Shower</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>One Jaccuzzi</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<!-- Pills content -->
</div>
</div>
<div id="carouselExampleCaptions" style="margin-top: 250px;height: 20px;"class="carousel slide" data-mdb-ride="carousel">
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselExampleCaptions"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleCaptions"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleCaptions"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/soup.png" class="d-block w-100" alt="Wild Landscape"/>
      <div class="carousel-caption d-none d-md-block">
        <!--<h5>Quality Properties</h5>
        <p>We sell quality properties in amazing locations</p>!-->
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/soup.png" class="d-block w-100" alt="Camera"/>
      <div class="carousel-caption d-none d-md-block">
        <!--<h5>Affordable prices</h5>
        <p>Our properties are very affordable</p>!-->
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/soup.png" class="d-block w-100" alt="Exotic Fruits"/>
      <div class="carousel-caption d-none d-md-block">
        <!--<h5>Affordable Rentals</h5>
        <p>We also rent out homes at amazing prices</p>!-->
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</body>
</html>
