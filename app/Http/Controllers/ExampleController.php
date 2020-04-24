<?php

namespace App\Http\Controllers;
use App\Bibliotheque;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){

        $data = DB::select("SELECT * FROM `bibliotheques` ");

        return response($data);
    }

public function show($id){

        $data = DB::select("SELECT * FROM `bibliotheques`  where id = $id");

        return response($data);
    }
    public function create (Request $request){
        $titre = $request->input('titre');
        $auteur = $request->input('auteur');
        $editeur = $request->input('editeur');
      
        DB::table('bibliotheques')->insert(
            ['titre' => $titre, 'auteur' =>$auteur,
            'editeur' =>$editeur
            ]
        );

        return response('les donnes sont enregistrer');
    }
    public function edit(Request $request, $id){
// verificatio si le livre existe 

        $verification = DB::select("select * from bibliotheques where id =  $id ");
        if ($verification){

        $titre = $request->input('titre');
        $auteur = $request->input('auteur');
        $editeur = $request->input('editeur');
        DB::table('bibliotheques')
              ->where('id', $id)
              ->update(['titre' => $titre,'auteur' => $auteur, 'editeur' =>  $editeur  ]);
    
        return response('les donnees sont modifier');
    } else 
    return response('ce livre nexiste pas ');
    }
    
    //
}
