<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    // Middlexare
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Ajouter Slider
    public function ajouterslider(){
        return view('admin.ajouterslider');
    }

// Sauvegarder Slider
    public function sauverslider(Request $request){
        $this -> validate($request,['description1'=>'required',
                                    'description2'=>'required',
                                    'slider_image'=>'image|nullable|max:1999']);

        if($request->hasFile('slider_image')){
            // 1: get filename with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            
            //2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just file extension
            $extension  = $request->file('slider_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // 5: upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $slider = new Slider();
        $slider -> description1 = $request->input('description1');
        $slider -> description2 = $request->input('description2');
        $slider -> slider_image = $fileNameToStore;
        $slider -> status = 1;

        $slider ->save(); //Sauvegarde dans la base de données

        return redirect('/ajouterslider')->with('status', 'Le slider a été ajouter avec succès !');
    }

    // Afficher Slider
    public function sliders(){
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    
    }

    // Editer Produit
    public function edit_slider($id){
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider',$slider);
    }


    // Modifier Slider
    public function modifierslider(Request $request){

        $this -> validate($request,['description1'=>'required',
                                    'description2'=>'required',
                                    'slider_image'=>'image|nullable|max:1999']);
            
        $slider = Slider::find($request->input('id'));
        $slider -> description1 = $request->input('description1');
        $slider -> description2 = $request->input('description2'); 
        

        if($request->hasFile('slider_image')){
            // 1: get filename with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            //2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just file extension
            $extension  = $request->file('slider_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // 5: upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
            
            if($slider -> slider_image != 'noimage.jpg'){
                Storage::delete('/public/slider_images/'.$slider ->slider_image);
            }

            $slider -> slider_image = $fileNameToStore;
        }

        $slider -> update(); //Mise à jour

        return redirect('/sliders')->with('status', 'Le slider a été modifié avec succès !');

    }
    // Supprimer Slider
    public function supprimerslider($id){
        $slider = slider::find($id);//Recherche l'id dand le model Category

        // Si l'image du produit n'est pas l'image par defaut on le supprime
        if($slider -> slider_image != 'noimage.jpg'){
            Storage::delete('/public/slider_images/'.$slider ->slider_image);
        }

        $slider->delete();//Supprime le produit
        return redirect('/sliders')->with('status','Le slider a bien été supprimée');
    }

        // Désactiver Slider
    public function desactiverslider($id){
        $slider = Slider::find($id);

        $slider->status = 0;
        $slider -> update();
        return redirect('/sliders')->with('status','Le status du slider a bien été désactivé !');
    }

    // Activer Slider
    public function activerslider($id){
        $slider = slider::find($id);

        $slider->status = 1;
        $slider -> update();
        return redirect('/sliders')->with('status','Le status du slider a bien été activé !');
    }
}
