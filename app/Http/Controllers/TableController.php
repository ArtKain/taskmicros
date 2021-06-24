<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WritingRequest;
use App\Models\Recording;
use App\Models\Type;
use App\Http\Controllers\Auth;
use App\Models\Category;

class TableController extends Controller
{
    public function table() {
        
        
        $record = auth()->user()->recording()->get();
        $type = Type::all();
        $sums = [];

        foreach($type as $types) {
            $sum = $types->recording()->where('user_id' , auth()->id())->sum('sum');
            $sums[$types->income] = $sum;
        } 


        return view('pages.index' , [ 
            'record' => $record,
            'sums' => $sums
        ]);
    }

    public function tabUpdate($id) {
        $recording = Recording::where('id' , $id)->first();
        $type = Type::all();

        return view('pages.update', [
            'recording' => $recording,
            'type' => $type,
        ]);
    }

    public function tabUpdateSubmit($id , WritingRequest $req) {

        $recording = Recording::find($id);

        $recording->sum = $req->input('sum');
        $recording->massege = $req->input('massege');
        $recording->category_id = $req->input('category');
        $recording->type_id = Category::find($req->input('category'))->type_id;

        $recording->save();

        return redirect('/home')->with('success' , 'Данные обновлены!');
        
    }
    
    public function tabDelete($id) {
        Recording::find($id)->delete();

        return redirect('/home')->with('success' , 'Данные удалены!');
    }

}
