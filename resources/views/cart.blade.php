
@extends('layout')

@section('page')
    <div class="content-fluid">
         <h2 class="bg-dark py-1 text-center my-4 text-light">Your Cart </h2>

         

        <div class="content" style="min-height: 600px;">
            <div class="cartoption">
                <div class="row px-4">
                   
                    <table class="tblone text-light text-center" width="62%">
                        <tr>
                            <th width="">Book Name</th>
                            <th width="">Image</th>
                            <th width="">Price</th>
                            
                            <th width="5%">Action</th>
                        </tr>

                     @php $iq_all=''; $c=0;  $sub=0; $vat= 1.10; $t_pro=0; $t_quan=0; @endphp
                       @if(count($cart)>0) 
                       @foreach($cart as $product)  
                        <tr>
                            <td class="font-weight-bold">{{ $product->book_name }}</td>

                            
                            
                            <td><img width="130px" height="70px" src="{{ asset('images/'.$product->image) }}" alt=""/></td> 

                           
                           <!-- <td >
                                <form action="{{url('up_quantity/'.$product->id)}}" method="post" class="form-inline"> @csrf

                                <input class="form-control py-0 rounded w-50" type="number" name="quantity" value="{{$product->quantity}}" min="1" />
                                    <input class="ml-2 rounded" type="submit" name="submit" value="Update"/>
                                </form>
                            </td>  -->
                            @php $t_price= $product->price; @endphp

                           <td class="font-weight-bold">${{$product->price }}</td>
                            <td> <a onclick="return confirm('Remove from cart ?');"
                 href="{{url('removeCart/'.$product->id)}}"><b class="text-danger ml-2 btn btn-dark">X</b></a></td>
                      
          @php $sub=$sub+$t_price; $grand=$sub;  $t_pro++;  
                   $iq_all=$iq_all.$product->book_id.','; @endphp              
  </tr>
  @endforeach
                    </table>
                    

                   
                    <table class="text-light ml-auto" style="float:right;text-align:left;" width="30%">
                        
                        <tr>
                            <th>Grand Total :</th>
                            <td class="font-weight-bold text-success">${{$grand}} </td>
                        </tr>
                    </table>
                </div>

                 

                <div class="shopping float-right">
                    <div class="shopright"> 
                        @php $grand=base64_encode($grand);
                        $t_pro=($t_pro);
                     @endphp

                        <a href="{{url('stripe/'.$grand.'_'.$iq_all)}}"> <img class="rounded" width="150px" src="images/check.jpg" alt="" /></a>
                    </div> 

                     @else

                     <h4 class=" rounded my-5 w-50 m-auto py-2 rounded bg-light text-center text-danger">Cart is Empty!</h4>

                    @endif
                </div>
            </div>

            <div class="py-5 my-5"></div>
            <div class="clear"></div>
        </div>
    </div>
    </div>

@endsection
