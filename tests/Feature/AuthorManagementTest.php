<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', [
            'name' => 'Manson Xasthur',
            'dob' => '09/22/1985'
        ]);

        $authors = Author::all();
        $this->assertCount(1, $authors);
        $this->assertInstanceOf(Carbon::class, $authors->first()->dob);
        $this->assertEquals('1985/22/09', $authors->first()->dob->format('Y/d/m'));
    }

}
