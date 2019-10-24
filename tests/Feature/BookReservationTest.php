<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/book', [
            'title' => 'Cool Book Title',
            'author' => 'Victor',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/book', [
            'title' => '',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_author_is_required()
    {
        $response = $this->post('/book', [
            'title' => 'Cool Book Name',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post('/book', [
            'title' => 'Cool Book Title',
            'author' => 'Victor',
        ]);

        $book = Book::first();

        $response = $this->patch('/book/' . $book->id, [
            'title' => 'New Title',
            'author' => 'New Author',
        ]);

        $this->assertEquals('New Title', $book->fresh()->title);
        $this->assertEquals('New Author', $book->fresh()->author);

        $response->assertOk();
    }
}
