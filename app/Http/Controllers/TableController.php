<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WritingRequest;
use App\Models\Recording;
use App\Models\Type;
use App\Models\Category;

class TableController extends Controller
{
    public function Table() {
        $record = Recording::all();
        $type = Type::all();
        $sums = [];

        foreach($type as $types) {
            $sum = $types->recording()->sum('sum');
            $sums[$types->income] = $sum;
        } 


        return view('pages.index' , [ 
            'record' => $record,
            'sums' => $sums
        ]);
    }

    public function TabUpdate($id) {
        $recording = Recording::where('id' , $id)->first();
        $type = Type::all();

        return view('pages.update', [
            'recording' => $recording,
            'type' => $type,
        ]);
    }

    public function TabUpdateSubmit($id , WritingRequest $req) {

        $recording = Recording::find($id);

        $recording->sum = $req->input('sum');
        $recording->massege = $req->input('massege');
        $recording->category_id = $req->input('category');
        $recording->type_id = Category::find($req->input('category'))->type_id;

        if($req->input('created_at') == null) {
            //
        } else {
            $recording->created_at = $req->input('created_at');
        }

        $recording->save();

        return redirect('/')->with('success' , 'Данные обновлены!');
        
    }
    
    public function TabDelete($id) {
        Recording::find($id)->delete();

        return redirect('/')->with('success' , 'Данные удалены!');
    }

}
