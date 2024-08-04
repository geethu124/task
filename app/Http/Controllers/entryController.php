<?php

namespace App\Http\Controllers;

use App\Models\Entries;
use Illuminate\Http\Request;


class entryController extends Controller
{
    //
    public function Addnewform(){
        $entries=Entries::all();
        return view('entries.form',$entries);
    }
    public function create(Request $request){

        $request->validate([
        'name'=>'required|max:255',
        'description'=>'required|max:255',
        'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'


        ]);

        $imagePath = null;
     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
     }

    Entries::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $imagePath,
    ]);

    return redirect()->route('home')->with('success', 'Entry created successfully.');
  }
  public function edit($id){
    $entries=Entries::findOrFail($id);
    return view('entries.edit',['entries' => $entries]);
  }
  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $entry = Entries::findOrFail($id);

    $entry->name = $request->input('name');
    $entry->description = $request->input('description');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $entry->image = $image->store('images', 'public');
    }

    $entry->save();

    return redirect()->route('home')->with('success', 'Entry updated successfully.');
}
public function delete($id)
{
    $entry = Entries::findOrFail($id);
    $entry->delete();

    return redirect()->route('home')->with('success', 'Entry deleted successfully.');
}

 }

