<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use DB;
use Stripe;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Models\orders;
use Mail;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

public function login() {
    return view('auth.login');
}

public function register() {
    return view('auth.register');
}

    public function home() {
    $product =books::latest()->limit(4)->get();
    return view('home',compact('product'));
    }


  public function checkout() {
    return view('checkout');
}


  public function shop() {
    $product =books::get();
    return view('shop',compact('product'));
}



  public function about() {
    return view('about');
}


public function addToCart($id)

    {
      $user_id = Auth::id();
         $row=DB::table('cart')->where('book_id',$id)->where('user_id',$user_id)->get();
         if(count($row) !=0){ return redirect()->back()
            ->with('success', "Item already in the cart!");
            } else {

        $row=books::where('id',$id)->first();
            
        $data= array();
        $data['user_id'] = Auth::id();
        $data['book_name'] = $row->book_name;
        $data['category'] = $row->category;
        $data['price'] = $row->price;
        $data['image'] = $row->image;
        $data['content'] = $row->content;
        $data['des'] = $row->des;
        $data['book_id'] = $id;

        DB::table('cart')->insert($data);
        return redirect('cart')->with('success', "Added to cart!");
       }
    }

    public function delete_cart($id){
         DB::table('cart')->where('id', $id)->delete();
        return redirect('cart')->with('success', "Item removed from cart!");
    }

    public function up_quantity(Request $req, $id){
        $data= array();
        $data['quantity'] = $req->quantity;
         books::where('id', $id)->update($data);
        return redirect('cart')->with('success', "Quantity Updated!");
    }


     public function cart(){
      $user_id = Auth::id();
      $cart= DB::table('cart')->where('user_id',$user_id)->get();
      return view('cart', compact('cart'));
    }


// PAYMENT
     public function goCheckout($amount,$ids)
    {
      $amount=base64_decode($amount);
      //$ids=Crypt::decryptString($ids);
      
        return view('checkout.stripe',compact('amount','ids'));
    }

   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
    $ids = $request->ids;// 

    $name = $request->name;
    $email = $request->email;
    

        //STRIPE
         $curr='USD'; //$request->currency; 
         $amount=round($request->price);

        Stripe\Stripe::setApiKey('sk_test_51JFWrpJkjwNxIm6zcIxSq9meJlasHB3MpxJYepYx1RuQnVYpk0zmoXSXz22qS62PK5pryX4ptYGCHaudKePMfGyH00sO7Jwion');

        Stripe\Charge::create ([ 

                //"billing_address_collection": null,
                "amount" => $amount*100, //100 * 100,
                "currency" => $curr,
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose only!"
        ]);
   

        //DB INSERT
        $order = orders::create([
            'customer_name'       => $name,
            'method' => 'Stripe',
            'email'  => $email,
            'book_ids' => $ids,
            'total'    => $amount
        ]);

        $this->sendMails($ids,$email);
        $user_id = Auth::id();
        DB::table('cart')->where('user_id', $user_id)->delete();

       Session::put('Stripe_pay','Order Success!');
       return redirect("cart");

    }


     public function sendMails($ids,$email) {

        $id = explode(',',$ids); $files = array();
        foreach($id as $i)
          if($i !=''){
            $book = books::where('id',$i)->first();
            $pdf_name = $book->content;
             $files[] = public_path('books/'.$pdf_name.'.pdf');
          }

        $data["email"] = $email;
        $data["title"] = "Test";
        $data["body"] = "This is test mail with pdf attachment";
 
       
  
        Mail::send('mail', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });

    }


}
