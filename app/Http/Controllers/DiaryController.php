<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WritingRequest;
use App\Models\Recording;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;



class DiaryController extends Controller
{
    public function Create() {

        $type = Type::all();
        $categories = Category::all();

        return view('pages.create' , [
            'type' => $type,
            'categories' => $categories,
        ]);
    }

    public function Submit(WritingRequest $req) {

        $recording = new Recording();

        $recording->sum = $req->input('sum');
        $recording->massege = $req->input('massege');
        $recording->category_id = $req->input('category');
        $recording->type_id = Category::find($req->input('category'))->type_id;
        $recording->user_id = $req->user()->id;

        if($req->input('created_at') == null) {
            //
        } else {
            $recording->created_at = $req->input('created_at');
        }

        $recording->save();

        return redirect('/home')->with('success' , 'Данные добавлены');
    }

    public function CreateType() {

        return view('pages.type');
    }

    public function CreateTypeSubmit(Request $request) {

        $request->validate([
            'type' => 'required|unique:types,income',
            'category' => 'required|array',
            'category.*' => 'required|string|unique:categories,title',
        ]);

        $type = new Type([
            'income' => $request->get('type'), 
        ]);
        
        $type->save();
        
        foreach($request->get('category') as $category) {
            $type->category()->createMany([
                ['title' => $category],
            ]);
        }
        return redirect('/create')->with('success' , 'Данные типы');
    }

}
