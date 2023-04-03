<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\books;
use App\Models\User;
use Mail;
use Session;
class AdminController extends Controller
{

     public function logout()
    {  
        Session::forget('admin');
        Session::save();
        return redirect('admin/login');
 }

  public function login(){

        return view('admin.login',); 
 }
 
     public function index_admin()
    {          
       
        $admin= DB::table('admin')->where('id',1)->get();
        return view('admin.index_admin', compact( 'admin')); 
 }


    public function books()
    {       
        $location= books::get();   
          //$cat= DB:: table('categories')->get();

        return view('admin.books', compact('location'));       
    }




 // bookss
public function add_books(Request $hos)
    {           
          $book_name=$hos->book_name;
          $category=$hos->category;
          $des=$hos->des;
          $price=$hos->price;

          //SINGLE IMG
          if($hos->image!=''){
          $cover=$hos->file('image');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($cover->getClientOriginalExtension());
          $cover_name=$uniqid.'.'.$ext; 
          $loc='images';
          $cover->move($loc, $cover_name);
          }

          //Content Pdf
          if($hos->content!=''){
          $content=$hos->file('content');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($content->getClientOriginalExtension());
          $pdf_name=$book_name.'.'.$ext; 
          $loc='books';
          $content->move($loc, $pdf_name);
          }

          $books = books::create([
          'book_name' =>  $book_name,
          'des' =>  $des,
          'price' =>  $price,
          'category' =>  $category,
          'image' =>  $cover_name,
          'content' =>  $pdf_name
      ]);
         return back()->with('success', "Added!"); 
    }
      



public function up_books(Request $hos)
    {           
          $id=$hos->id;
          $book_name=$hos->book_name;
          $category=$hos->category;
          $des=$hos->des;
          $price=$hos->price;

          $books = books::where('id',$id)->update([
          'book_name' =>  $book_name,
          'des' =>  $des,
          'price' =>  $price,
          'category' =>  $category    
      ]);

           //SINGLE IMG
          if($hos->image!=''){
          $cover=$hos->file('image');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($cover->getClientOriginalExtension());
          $cover_name=$uniqid.'.'.$ext; 
          $loc='images';
          $cover->move($loc, $cover_name);
          $books = books::where('id',$id)->update([
          'image' =>  $cover_name
        ]);
          unlink('images/'.$hos->old_cover);
       }

          //Content Pdf
          if($hos->content!=''){
          $content=$hos->file('content');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($content->getClientOriginalExtension());
          $pdf_name=$book_name.'.'.$ext; 
          $loc='books';
          $content->move($loc, $pdf_name);
          $books = books::where('id',$id)->update([
          'content' =>  $pdf_name
        ]);
      }

         return back()->with('success', "Added!"); 

}


 public function del_books($id)
    {  
       $book = books::where('id',$id)->first();        
       $deleted = books::where('id', $id)->delete();
       unlink('images/'.$book->image);
       return back()->with('success', "Deleted!"); 
 }

 // books



//** Login attempt Admin

 public function adminLogin(Request $formData)
{       
$email = $formData->email;
$password = $formData->password;
$user= DB::table('admin')->where('email', $email)->get(); 
$check_user=json_decode($user);
//print_r($check_user); echo $check_user[0]->password; exit;

if($user->count() >0 ) {
$db_password=$check_user[0]->password; //opd_admin
if(password_verify($password, $db_password)) { 
    Session::put('admin','Logged!');
    return redirect('admin/index_admin'); }
else{
    echo "Password wrong!";
   

}
    }

       else { echo "user don't exist"; }

}

//** Forgot

public function forgot($remail)
    { 

         return view('admin.forgot_password',compact('remail'));
     
    }


public function send_reset_email(Request $request)
    {

        $remail=$request->email;   
        

        // Send Email

        $info=['Name'=>'Dele', 'email' => $remail];
        $user['to']= $remail;
        Mail::send('admin.mail', $info, function($msg) use ($user){

            $msg->to($user['to']);
            $msg->subject('Test Mail');

        });

        echo "Check your email"; exit;

        // Send Email

    }


public function reset(Request $request, $remail)
    { echo "hello";

       $email=$remail;
       $password_1=$request->password; 
       $password=$request->c_password; 

       if($password_1==$password) {
     $password_1= Hash::make($password_1);
     $update= DB::table('admin')->where('email', $email)
     -> limit(1)->update(['password'=> $password_1]);

     if($update) {Session::put('reset', 'password reset success!');return redirect('admin/login'); }
       }    
          else {
            Session::put('wrong_pwd', 'password do not match! try again');
          return redirect()->back();
      }

    }


//______________________________________________________________________________



    public function adminLogout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('admin/login');
}

    //** Login attempt and Custom Authentication




// Remove special chars
    function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


// update everyday slots


}