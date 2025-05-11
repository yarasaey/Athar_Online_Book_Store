<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Authors;

class AuthorsController extends Controller
{
    public function index(Request $request) {
        $authors = Authors::latest('id')->paginate(10);
        if($request->get('keyword')){
            $authors=$authors->where('name','like','%'.$request->keyword.'%');
        }

        return view('admin.authors.list', compact('authors'));
    }
    public function create() {
        return view('admin.authors.create');
    }

  public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'pio' => 'required|string|max:1000',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $author = new Authors();
    $author->name = $request->name;
    $author->pio = $request->pio;
    $author->save();

    $request->session()->flash('success', 'Author added successfully.');

    return redirect()->route('authors.index');
}  public function edit($id, Request $request) {
    // البحث عن الفئة باستخدام الـ ID
    $author =  Authors::find($id);

    // إذا لم يتم العثور على الفئة، يتم إعادة التوجيه إلى صفحة القائمة
    if (empty($author)) {
        $request->session()->flash('error', 'Record not Found');
        return redirect()->route('authors.index');
    }
   // $request->session()->flash('success', 'Author Edited successfully.');
$data['author']=$author;
    return view('admin.authors.edit', compact('author'));
}
public function update($id, Request $request)
{
    $author = Authors::find($id);
    if (empty($author)) {
        $request->session()->flash('error', 'Record not Found');
        return redirect()->route('authors.index');
    }
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'pio' => 'required|string|max:1000',
    ]);
    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }
    $author->name = $request->name;
    $author->pio = $request->pio;
    $author->save();
    $request->session()->flash('success', 'Author Updated successfully.');

    return redirect()->route('authors.index');
}
public function destroy(Request $request, $id)
{
    $author = Authors::find($id);
    if (!$author) {
        return redirect()->route('authors.index')->with('error', 'Author not found');
    }

    $author->delete();

    return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
}


}


   
    



    

