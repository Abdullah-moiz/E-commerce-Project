<nav class="navbar navbar-expand-lg navbar-default navbar-dark fixed-top">
  <div class="container-fluid  navbar-default ">
     <a class="navbar-brand" href="{{url('/')}}">Pain &  Gain</a>
   
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
           <a class="nav-link px-3 active" aria-current="page" href="/">Home</a>
           <a class="nav-link  px-3 " href="{{url('category')}}">Categories</a>
           <a class="nav-link  px-3 " href="{{url('contact')}}">Contact</a>
           <a class="nav-link  px-3 " href="{{url('about')}}">About</a>
        </div>
        <div class="navbar-nav ms-auto justify-content-center">
         

           @guest
           @if (Route::has('login'))
           <li class="nav-item">
              <a class="nav-link cartblack" id="loginblack" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
               <a class="nav-link cartblack" id="loginblack"  href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else

            <div class="input-group hello">
               <form class="d-flex bg-transparent w-100" action="{{url('searchProduct')}}" class="form-control" method="POST">
                  @csrf
                  <div class="input-group">
                     <input name="product_name" required type="search" id="search_product" class="form-control bg-dark rounded-pill outline-none shadow-none border-0 "  placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                     <button class="btn" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
               </form>
             </div>
            <a class="cartblack nav-link" href="{{url('cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               <img
            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
            class="rounded-circle"
            height="22"
            alt="Portrait of a Woman"
            loading="lazy"
          />
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

               <a class="dropdown-item"> {{ Auth::user()->name }}</a>
              
                  <a class="dropdown-item" href="{{url('my-order')}}">
                     My Orders
                  </a>
                
                 <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                 </a>
               
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                 </form>
              </div>
           </li>
          
           @endguest
        </div>
     </div>
  </div>
</nav>