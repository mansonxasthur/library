<?php

namespace Tests\Unit;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function path_method_returns_book_path()
    {
        $book = Book::create([
            'title' => 'Cool Title',
            'Author' => 'Manson',
        ]);

        $this->assertEquals('/books/1', $book->path());
    }

}
