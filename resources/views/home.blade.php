@extends('layout') 
@section('page') 

<div class="container" >
<div class="row py-5" style="background: black; color: white;">
  
<div class="col-sm-6 wp-block-column is-vertically-aligned-center is-layout-flow" style="flex-basis:50%">




<h3 class="text-justify has-large-font-size wp-block-heading">Are you tired of feeling stressed and overwhelmed by your finances? Do you want to take control of your money but don’t know where to start?</h3>



<p class="my-3">Introducing “Mastering Your Finances”, the ultimate guide to achieving financial freedom. </p>



<p class="my-3">With this book, you’ll learn how to set specific, measurable, and achievable goals, track your income and expenses, create a budget that works for you, and much more.</p>



<p class="my-3">Don’t wait, get your copy of “Mastering Your Finances” today, and say goodbye to financial stress and hello to financial freedom.</p>



<div class="wp-block-buttons has-custom-font-size has-normal-font-size is-layout-flex">
<div class="wp-block-button has-custom-font-size is-style-fill has-normal-font-size"><a class="wp-block-button__link wp-element-button">Buy Now</a></div>
</div>



<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
</div>



<div class="col-sm-6  wp-block-column is-layout-flow">
<div class="wp-block-group has-ti-bg-alt-background-color has-background has-global-padding is-layout-constrained" style="border-top-left-radius:160px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:160px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><img decoding="async" src="https://boldtadvice.com/wp-content/themes/jaxon/assets/img/jaxon-main-image-9.png" alt="" width="466" height="675"></figure>
</div>
</div>


</div>


<div class="row py-5" style="background:black;">
  <div class="col-md-12 py-4"><h3 class="text-light">Latest</h3></div>
  @foreach($product as $product)
                <div class="col-sm-3 my-5 ">
                    <a href="#"><img style="height:220px;width: 175px; " src="{{ asset('images/'.$product->image) }}" class="border border-dark p-2 img-fluid" alt="" /> </a>

                    <h3 style="color: ghostwhite;font-family: monospace;">{{ $product->book_name }} </h3>
                    <p class="mt-4 text-light font-weight-bold">Price: <span class="ml-3 bg-success mt-3  px-3 py-1 text-light font-weight-bold rounded ">${{$product->price }} </span></p>

                  <p class="mb-1 text-secondary font-weight-bold">Category: <span class="ml-3  py-0 text-secondary font-weight-bold rounded ">{{$product->category }} </span></p>

                    <p style="min-height: 65px; font-family: monospace; color: grey;" class="w-75"><span class="small my-3 text-center py-2 rounded ">{{$product->des }} </span></p>

                    <div class="mt-3"><span><a href="{{url('addToCart/'.$product->id)}}" class="font-weight-bold btn btn-warning py-1 w-75">Add to cart</a>
                    </span>
                  </div>
                </div>
                @endforeach
</div>

<div class="row py-5" style="background:black;"></div>

</div>


          @endsection
        
       

