<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
    protected $fillable = ['name', 'price'];

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public static function updateBookFromRequest($id, Request $request)
    {
        $book = Book::find($id);
        $book->name = strip_tags($request->get('name'));
        $book->price = (int)$request->get('price');
        $book->save();
        return $book;
    }
}
