<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        $categories = Category::all();
        return view('master.book.index', compact('book', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->release = $request->release;
        $book->publisher = $request->publisher;
        $book->copy = $request->copy;
        $book->description = $request->description;

        $category_ids = [];
        foreach ($request->category_id as $category_name) {
            $category = Category::firstOrCreate(['category_name' => $category_name]);
            $category_ids[] = $category->id;
        }

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = date('y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('storage/images/book/'), $filename);
            $book->picture = $filename;
        }

        $book->save();
        $book->category()->syncWithoutDetaching($category_ids);

        return redirect()->back()->with(['success' => 'Successfully Adding Book']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->author = $request->author;
        $book->release = $request->release;
        $book->publisher = $request->publisher;
        $book->copy = $request->copy;
        $book->description = $request->description;
        $file = $request->file('picture');
        if ($request->hasFile('picture')) {
            $path = public_path('storage/images/book' . $book->picture);
            if ($book->picture !== null) {
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $nama_logo = date('y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('storage/images/book/'), $nama_logo);
            $book->picture = $nama_logo;
        }
        $book->save();

        return redirect()->back()->with(['success' => 'Successfully Edit Books']);
    }

    public function userShow(Book $book)
    {
        return view('master.book.user.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with(['success' => 'Successfully Delete Books']);
    }
}
