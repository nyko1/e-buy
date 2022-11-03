<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importer la table categorie pour l'utiliser
use App\Models\Category;


class CategoryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function ajoutercategorie(){
        return view('admin.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){

        $this -> validate($request,['category_name'=>'required|unique:categories']); //Champ obligatoire
        
        $categorie = new Category(); // Création d'une nouvelle instance de categorie

        $categorie -> category_name = $request -> input('category_name');
        $categorie ->save();
        return redirect('/ajoutercategorie')->with('status','La catégorie '.$categorie->category_name.' a bien été ajoutée');
    }

    public function categories(){
        $categories = Category::get(); //Récupère toutes les données de la table catégorie
        return view('admin.categories')->with('categories',$categories);

    }
    public function editcategorie($id){
        $categorie = Category::find($id);//Recherche l'id dand le model Category

        return view('admin.editcategorie')->with('categorie',$categorie);
    }
    public function modifiercategorie(Request $request){
        $categorie = Category::find($request->input('id'));
        $this -> validate($request,['category_name'=>'required|unique:categories']); //Champ obligatoire

        $categorie -> category_name = $request -> input('category_name');
        $categorie ->update();
        return redirect('/categories')->with('status','La catégorie '.$categorie->category_name.' a bien été modifiée');
    }
    public function supprimercategorie($id){
        $categorie = Category::find($id);//Recherche l'id dand le model Category
        $categorie->delete();
        return redirect('/categories')->with('status','La catégorie '.$categorie->category_name.' a bien été supprimée');
    }
}


