@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
   body {
    background: #ececec;
}
/*Hidden class for adding and removing*/
.display-none {
    display: none !important;
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
        body.loading{
            overflow: hidden;   
        }
        body.loading .overlay{
            display: block;
        }

/*Add an overlay to the entire page blocking any further presses to buttons or other elements.*
/*Spinner Styles*/
.lds-dual-ring {
    display: inline-block;
}
.lds-dual-ring:after {
    content: " ";
    display: block;
    width: 64px;
    height: 64px;
    margin: 5% auto;
    border-radius: 50%;
    border: 6px solid #fff;
    border-color: #fff transparent #fff transparent;
    animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
#getDataBtn{
    background: #e2e222;
    border: 1px solid #e2e222;
    padding:  10px 20px;
}
.text-center{
    text-align: center;
}
#data-table table{
    margin: 20px auto;
}
    </style>
    <script>
    jQuery(function($){
   $(document).ajaxSend(function() {
    $("#overlay").fadeIn(300);　
   });       
    $.ajax({
      type: 'GET',
       url:'https://www.reddit.com/search.json?q=realestate',
      success: function(response){
        //console.log(data);
        var results = response.data.children;
         $.each(results, function(index, singlesRedditItem){
          //jQuery("#overlay").fadeIn(300);
          $('#repos').append(`
            <div class="card">
              <div class="row">
                <div class="col-md-12">
                  <strong style='color:black;'>${singlesRedditItem.data.selftext}</strong></div>
                  <hr>
              </div>
            </div>
          `);
          }).error(function(response){
          });
      }
     }).done(function() {
      setTimeout(function(){
      },500);
  });   
});    
    </script>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Welcome</p>
                                    <h5 class="font-weight-bolder">
                                        {{$user->username}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{$user->email}}</span>
                                       
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Loading Latest Posts About Real Estate Data From Reddit Api</h6>
                        <span class="sr-only">Fetching Data From Api</span>
                        </div>
                        <div class="row" id = "repos"></div>
                        <div class="overlay"></div>
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>   
         </div>
            </div>
        </div>
       
    </div>
@endsection
@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
