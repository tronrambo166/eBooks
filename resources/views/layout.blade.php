@php use App\Models\books;
$user_id = Auth::id();
$cart= DB::table('cart')->where('user_id',$user_id)->get();
@endphp

<!DOCTYPE HTML>
<head>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <title>Boldtadvice | Buy Ebooks now!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
    <link rel="stylesheet" type="text/css" href="style.css">
   
{{-- Vue component files --}}
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/http-vue-loader"></script>
  {{-- Vue component files --}} 
  
</head>
<body>
<div class="container-fluid" style="background:black;">
    
     @if(Session::has('success'))<div class="row text-center font-weight-bold card bg-success text-light px-3">
                 {{Session::get('success') }} @php Session::forget('success'); @endphp
            </div> @endif
       
<div class="row bg-dark ">

  <div class="col-md-6">
    <div><img src="logo.png" width="200px" height="80px"></div>
  </div>
<div class="col-md-5">
<nav class=" navbar float-right navbar-expand-lg navbar-light w-100">
  
  <div class=" collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav links">
      
      <li class="nav-item ">
        <a class="font-weight-bold text-light" href="home">Home </a>
      </li>
      <li class="nav-item">
        <a class="font-weight-bold  text-light" href="shop">Shop</a>
      </li>

      <li class="nav-item">
        <a class="font-weight-bold text-light" href="about">About</a>
      </li>

      <li class="nav-item">
        <a class="font-weight-bold  text-light" href="cart">Cart <span class="btn btn-danger py-0 font-weight-bold">{{count($cart)}}</span></a>
      </li>

    </ul>


  </div>
</nav>
</div>

<div class="col-md-1"> 
@if(Auth::check())   <ul class="ml-auto mt-5">
       
                                    <a style="text-decoration: none;font-size: 12px" class="text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
      </ul>
      @endif 
      </div>

</div>


    @yield('page')


<div class="container-fluid px-0 ">
       
        
        <footer>
            <div class="row  bg-dark fixed-bottom">
                <p class="m-auto font-weight-bold text-light py-3">&copy; Copyright 2023. Boldtadvice, All Rights Reserved</p>
            </div>
        </footer>
        
    </div>
    </div>
    
    
    


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

{{-- Vue files --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.23.0/axios.min.js"></script>

<script type="text/javascript" src="js/vue-router.js"></script>
<script type="module" src="js/routerCode.js"></script>
{{-- Vue files --}}


<script>


</script>



</body>
</html>
