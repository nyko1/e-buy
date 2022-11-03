<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Mail\SendMail;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller
{
    //Accueil
    public function home(){
        $sliders = Slider::where('status',1)->get(); //Récupère les slider dont le status = 1
        $produits = Product::where('status',1)->get(); //Récupère les produits dont le status = 1
        // retour toutes ses informations
        return view('client.home')->with('sliders',$sliders)->with('produits',$produits);
    }
    // Page achat
    public function shop(){
        $categories = Category::get(); //Récupère toutes les categories
        $produits = Product::where('status',1)->get(); //Récupère les produits dont le status = 1
       
        return view('client.shop')->with('categories',$categories)->with('produits',$produits);
    }

    // Sélection par catégorie
    public function select_par_cat($name){
        $categories = Category::get(); //Récupère toutes les categories
        $produits = Product::where('product_category',$name)->where('status',1)->get(); //Récupère les produits dont le status = 1
       
        return view('client.shop')->with('produits',$produits)->with('categories',$categories);
    }

// Panier
    public function cart(){

        if(!Session::has('cart')){//Si le panier est vide
            return view('client.cart');
        }
        // Sinon
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);

    }

    // Ajouter produits au panier
    public function ajouter_au_panier($id){
        $produit = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return redirect('/shop');

    }

    // Modifer les produits du panier
    public function modifier_panier(Request $request, $id){

         //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
         $oldCart = Session::has('cart')? Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart->updateQty($id, $request->quantity);
         Session::put('cart', $cart);
 
         //dd(Session::get('cart'));
         return redirect::to('/panier');
    }

// Retirer produit du panier
    public function retirer_produit($id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/panier');
    }

     // Paiement
     public function checkout(){

        if(!Session::has('client')){//Si le panier est vide
            return view('client.login');
        }

        if(!Session::has('cart')){//Si le panier est vide
            return view('client.cart');
        }
        return view('client.checkout');
    }


    public function payer(Request $request){
        
        if(!Session::has('cart')){//Si le panier est vide
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51LoUNnAeEC6Hw7uGLGnsASBVslvRgbrF03gWhqqtzl1twiIqZcRY0eR1H59ScCHapFAseSyTrQhf82y6py3OW30f00B89he3IC');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order();

            $order->nom = $request -> input('name');
            $order->adresse = $request -> input('adresse');
            $order->panier = serialize($cart);//Récupère toutes les commandes du panier
            $order->payment_id = $charge -> id;

            $order->save();

            $orders = Order::where("payment_id",  $charge -> id)->get();

            $orders -> transform(function($order,$key){
                $order -> panier = unserialize($order -> panier);
    
                return $order;
            });

        $email = Session::get('client')->email;
        Mail::to($email)->send(new SendMail($orders));

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect::to('/paiement');
        }

        Session::forget('cart');
        // Session::put('success', 'Purchase accomplished successfully !');
        return redirect::to('/panier')->with('status','Achat accompli avec succès');

    }

    public function creer_compte(Request $request){

        $this ->validate($request,[ 'email'=>'email|required|unique:clients',
                                    'password'=>'required|min:7']);
        $client = new Client();
        $client->email = $request -> input('email');
        $client->password = bcrypt($request -> input('password'));

        $client->save();
        
        return redirect('/client_login')->with('status','Votre compte à été créé avec succès!');
    }

    public function acceder_compte(Request $request){
        $this ->validate($request,[ 'email'=>'email|required',
                                    'password'=>'required']);

        $client = Client::where('email',$request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                # code...
               Session::put('client',$client);
                return redirect('/shop');
            } else {
                # code...
                return back()->with('statut','Mauvais mot de passe');
            }
            
        }else {
            return back()->with('statut','Désolé vous n\'avez pas de compte');
        }
    }

    // Connexion
    public function client_login(){
        return view('client.login');
    }

    public function logout(){
        // Effacer la session cliente
        Session::forget('client');

        return back();
    }

    // Création de compte
    public function signup(){
        return view('client.signup');
    }
   
   
    
}
