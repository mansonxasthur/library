<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        Book::create($this->validateRequest());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
    }

    /**
     * @return mixed
     */
    protected function validateRequest()
    {
        $data = request()->validate([
            'title'  => 'required',
            'author' => 'required',
        ]);
        return $data;
    }
}
