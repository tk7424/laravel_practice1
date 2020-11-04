<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    // 一覧を表示
    public function index()
  {
      // DBよりBookテーブルの値を全て取得
      $books = Book::all();

      // 取得した値をビュー「book/index」に渡す
      return view('book/index', compact('books'));
  }

    // 編集画面を表示
    public function edit($id) {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $book = Book::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('book/edit', compact('book'));
    }


    // 新規作成画面を表示
    public function create() {
        $book = new Book();
        return view ('book/create', compact('book'));
    }

    // 新規作成処理
    public function store(BookRequest $request) {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect('/book');
    }
    

    // 更新処理
    public function update(BookRequest $request, $id) {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect('/book');
    }


    // 削除処理
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/book');
    }
}
