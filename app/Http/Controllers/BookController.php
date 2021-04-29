<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Book;

class BookController extends Controller
{
    public function index() {
        // DBから全て取得
        $books = Book::all();
        return view('book/index', compact('books'));
    }
    public function edit($id) {
        // DBからURIパラメータと同じIDを持つBookの情報
        $book = Book::findOrFail($id);
        return view ('book/edit', compact('book'));
    }
    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();
        return redirect("/book");
    }
    public function destory($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect("/book");
    }
    public function create() {
        $book = new Book();
        return view('book/create', compact('book'));
    }
    public function store() {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();
        return redirect("/book");
    }
}
