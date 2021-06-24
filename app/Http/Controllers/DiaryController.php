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
    public function create() {

        $user = auth()->user();
        $type = Type::all();

        return view('pages.create' , [
            'type' => $type,
        ]);
    }

    public function submit(WritingRequest $req) {

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

    public function createType() {

        $type = Type::all();

        return view('pages.type' , compact('type'));
    }

    public function createCategorySubmit(Request $request) {

        $request->validate([
            'type' => 'required',
            'category' => 'required|array',
            'category.*' => 'required|string',
        ]);

        $user = auth()->user();
        
        if ($user->category()->where('title', $request->input('category'))->exists()) {
            return redirect()->route('create.category')->withErrors(['category' => 'Category already exists']);
        } else {
        foreach($request->get('category') as $categories) {
                $category = new Category();
                $category->title = $categories;
                $category->type_id = $request->input('type');
                $category->user_id = $request->user()->id;
                $category->save();
        }
    }

        return redirect('/create')->with('success' , 'Добавлена категория!');
    }

}
