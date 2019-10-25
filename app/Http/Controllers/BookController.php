<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
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
