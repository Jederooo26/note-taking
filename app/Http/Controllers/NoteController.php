<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    public function index(){
        // $notes = Note::paginate(2);
        $notes = Note::all();
        return view("note")->with("notes", $notes);
    }

    public function store(Request $request){
        Note::create([
            'title' => $request->title,
            "content" => $request->content
        ]);
        echo "Successfully Added!";

    }

    public function edit($id){
        $note = Note::find($id);

        return view('note')->with('note', $note);
    

    }

    public function update(Request $request, $id){
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        echo "Successfully Updated!";

    }

    public function destroy($id){
        // Note::destroy($id);

        $note = Note::find($id);
        $note->delete();
        echo "Successfully Deleted!";

    }

   

    // public function store(Request $request){
    //     $note = new Note;
    //     $note->title = $request->input('title');
    //     $note->content = $request->input('content');
    //     $note->save();

    //     echo "Successfully Added!";

    //     $request->validate([
    //         "title" => "required|min:3|max:20|unique:notes",
    //         "content" => "required|min:5|max:200"
    

    //     ]);


    //     Note::create([
    //         'title' => $request->title,
    //         "content" => $request->content
    //     ]);

    //     echo "Successfully Added!";

    // }
    
    // public function create(){
    //     return view("addform");
    // }

    // public function show($id){
    //     $note = Note::find($id);

    //     return view('show')->with('note', $note);
    // }

}

