@extends('layout') 
@section('page')

<div class="main">
        <div class="container">
            <div class="content_top">
                <div class="heading">
                    <h3 class="my-5 bg-dark text-light py-2 text-center">All Books</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row mt-4">

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


           
            
              
            </div>
        </div>
    <div class="py-4 my-5"></div>
          @endsection
        
       

