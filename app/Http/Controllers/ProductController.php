<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{

    // Middleware
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Ajouter produit
    public function ajouterproduit(){
        $categories = Category::All()->pluck('category_name','category_name');//Récupèrer juste les noms des catégories

        return view('admin.ajouterproduit')->with('categories',$categories);
    }


    // Sauvegarde de produits
    public function sauverproduit(Request $request){
        $this -> validate($request,['product_name'=>'required|unique:products',
                                    'product_price'=>'required',
                                    'product_category'=>'required',
                                    'product_image'=>'image|nullable|max:1999']);

        if($request->hasFile('product_image')){
            // 1: get filename with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            
            //2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just file extension
            $extension  = $request->file('product_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // 5: upload image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $product = new Product();
        $product -> product_name = $request->input('product_name');
        $product -> product_price = $request->input('product_price');
        $product -> product_category = $request->input('product_category');
        $product -> product_image = $fileNameToStore;
        $product -> status = 1;

        $product ->save(); //Sauvegarde dans la base de données

        return redirect('/ajouterproduit')->with('status', 'Le produit '.$product -> product_name.' a été ajouter avec succès !');

    }

    // Afficher produits
    public function produits(){
       $produits = Product::get();
        return view('admin.produits')->with('produits',$produits);
    }

    // Editer Produit
    public function edit_produit($id){
        $product = Product::find($id);
        $categories = Category::All()->pluck('category_name','category_name');//Récupèrer juste les noms des catégories
        return view('admin.editproduit')->with('product',$product)->with('categories',$categories);
    }

    // Modifier produit
    public function modifierproduit(Request $request){

        $this -> validate($request,['product_name'=>'required',
                                    'product_price'=>'required',
                                    'product_category'=>'required',
                                    'product_image'=>'image|nullable|max:1999']);

            
        $product = Product::find($request->input('id'));
        $product -> product_name = $request->input('product_name');
        $product -> product_price = $request->input('product_price');
        $product -> product_category = $request->input('product_category');
        

        if($request->hasFile('product_image')){
            // 1: get filename with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

            //2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just file extension
            $extension  = $request->file('product_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // 5: upload image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
            
            if($product -> product_image != 'noimage.jpg'){
                Storage::delete('/public/product_images/'.$product ->product_image);
            }

            $product -> product_image = $fileNameToStore;
        }

        $product -> update(); //Mise à jour

        return redirect('/produits')->with('status', 'Le produit '.$product -> product_name.' a été modifié avec succès !');

    }

    // Supprimer produit
    public function supprimerproduit($id){
        $product = Product::find($id);//Recherche l'id dand le model Category

        // Si l'image du produit n'est pas l'image par defaut on le supprime
        if($product -> product_image != 'noimage.jpg'){
            Storage::delete('/public/product_images/'.$product ->product_image);
        }

        $product->delete();//Supprime le produit
        return redirect('/produits')->with('status','La catégorie '.$product->product_name.' a bien été supprimée');
    }

    // Désactiver Produit
    public function desactiverproduit($id){
        $product = Product::find($id);

        $product->status = 0;
        $product -> update();
        return redirect('/produits')->with('status','Le status du '.$product->product_name.' a bien été désactivé !');
    }

    // Activer produit
    public function activerproduit($id){
        $product = Product::find($id);

        $product->status = 1;
        $product -> update();
        return redirect('/produits')->with('status','Le status du '.$product->product_name.' a bien été activé !');
    }

}
