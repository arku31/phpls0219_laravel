<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Mail\BookCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function publicapi()
    {
        return Book::all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());
        Mail::to(\Auth::user())->send(new BookCreated(['book' => $book]));

        return redirect()->route('books');
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * @param $id
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, BookRequest $request)
    {
        Book::updateBookFromRequest($id, $request);

        return redirect()->route('books');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('books');
    }
}
