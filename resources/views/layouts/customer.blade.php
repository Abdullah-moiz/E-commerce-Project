<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>@yield('title')</title>
     <script src="https://kit.fontawesome.com/3babc5211c.js" crossorigin="anonymous"></script>
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous"/>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

 
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
    <style>
      *{
        font-family: 'Poppins', sans-serif;
    }
    .cartblack i
    {
      color: black !important;
    }
  

      .carousel-item{
    height: 30rem;
    color: white;
} 
.carousel-item img{
    height: 100%;
    color: white;
}
a
    {
        text-decoration: none !important;
        color: black;

    }
    
    .video
    {
      filter: brightness(40%) !important;
      object-fit: fill !important;
      background-size: cover !important;
    }
 


 .fixed-top 
{
  height: 4.5rem !important;
  z-index: 5000 !important;
}
.navbar>.container-fluid a
{
  color: rgba(234,88,11,255) !important;
  font-size:1.2rem !important;
}

.zoom:hover
{
  cursor: pointer;
  transform: scale(1.05);
  transition: all 0.3s linear;
}
.zoom img
{
  filter: brightness(40%) !important;
}
.notbtn
{
  width: 150px !important;
  height: 50px !important;
  padding: 10px !important;
  transition: all 0.5s;
  outline: none; 
  border-style: none;
}
.notbtn:hover
{
  background: transparent !important;
  color: white !important;
  border: 2px solid white;

}
.hello-card
{
  cursor: pointer;
  transition: all 0.5s;
}
.hello-card:hover{
  transform: scale(1.04);
}
*
{
  scroll-behavior: smooth;
}

.backgroundfooter
{
  background:rgba(234,88,11,255) !important;
}
.backgroundofroutes
{
  background:rgba(234,88,11,255) !important;
  color: white !important;
}
.backgroundofroutes a
{
  color: white !important;
}
 .hello 
{
 width: 200px !important; 
}
.hello input
{
  color:rgba(234,88,11,255) !important;
}
.btn:focus,.btn:active {
   outline: none !important;
   box-shadow: none;
}
.hello input::placeholder
{
  color:rgba(234,88,11,255)  !important;
} 
#loginblack
    {
      color: black !important;
    }

/*   
    .loaders 
    {
      position: fixed;
      top: 0%;
      left: 0%;
      height: 100vh;
      width:100vw ;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10000000000000;
      background:rgba(234,88,11,255);
    }
    .loader--hidden
    {
      opacity: 0;
      visibility: hidden;
    }
    .loader::after
    {
      content:"";
      width: 75px;
      height: 75px;
      border: 15px solid white;
      border-top-color: black;
      border-radius: 50%;
      animation: loading  0.75s ease infinite;

    }
    @keyframes loading
    {
      from {transform : rotate(0turn)}
      from {transform : rotate(1turn)}
    }
    

    .wrapper{
    width:200px;
    height:60px;
    position: absolute;
    left:50%;
    top:50%;
    transform: translate(-50%, -50%);
}
.circle{
    width:20px;
    height:20px;
    position: absolute;
    border-radius: 50%;
    background-color: #fff;
    left:15%;
    transform-origin: 50%;
    animation: circle .5s alternate infinite ease;
}

@keyframes circle{
    0%{
        top:60px;
        height:5px;
        border-radius: 50px 50px 25px 25px;
        transform: scaleX(1.7);
    }
    40%{
        height:20px;
        border-radius: 50%;
        transform: scaleX(1);
    }
    100%{
        top:0%;
    }
}
.circle:nth-child(2){
    left:45%;
    animation-delay: .2s;
}
.circle:nth-child(3){
    left:auto;
    right:15%;
    animation-delay: .3s;
}
.shadow{
    width:20px;
    height:4px;
    border-radius: 50%;
    background-color: rgba(0,0,0,.5);
    position: absolute;
    top:62px;
    transform-origin: 50%;
    z-index: -1;
    left:15%;
    filter: blur(1px);
    animation: shadow .5s alternate infinite ease;
}

@keyframes shadow{
    0%{
        transform: scaleX(1.5);
    }
    40%{
        transform: scaleX(1);
        opacity: .7;
    }
    100%{
        transform: scaleX(.2);
        opacity: .4;
    }
}
.shadow:nth-child(4){
    left: 45%;
    animation-delay: .2s
}
.shadow:nth-child(5){
    left:auto;
    right:15%;
    animation-delay: .3s;
}
.wrapper span{
    position: absolute;
    top:75px;
    font-family: 'Lato';
    font-size: 20px;
    letter-spacing: 12px;
    color: #fff;
    left:15%;
} */

    </style>
 

    @yield('css')
</head>
<body >
 
    @include('layouts.inc.frontNavBar')
  
  <div class="content">
    @yield('content')
  </div>
  @include('layouts.inc.frontFooter')

  {{-- <div class="loaders">
    <div class="wrapper">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
      <span>Loading</span>
  </div>
  </div> --}}


  @if (session('status'))
  <script>
    swal("Done!", "{{session('status')}}", "success");
  </script>
  @endif
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @yield('scripts')
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




<script>
  

</script>
     <script>
        $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll < 50){
            $('.fixed-top').css('background', 'transparent');
        } else{
            $('.fixed-top').css('background', 'white');
            $('.navbar>.container-fluid a').css('color', 'rgba(37,33,34,255)');
        }
    });
      
       </script>
   <script>
    $( function() {
      var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
      ];
      $( "#search_product" ).autocomplete({
        source: availableTags
      });
    } );
    </script>

{{-- <script>
  window.addEventListener("load" , () => {
    document.querySelector('.loaders').classList.add("loader--hidden")
    document.querySelector('.loaders').addEventListener("transitioned", () => {
      document.body.removeChild(document.querySelector('.loaders'));
    })
  })
</script> --}}

</html>
