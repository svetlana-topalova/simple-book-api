<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Book;
use Illuminate\Support\Facades\Storage;

class NewBookNotification extends Mailable {

    use Queueable,
        SerializesModels;

    public $book;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book, $name) {
        $this->book = $book;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('example@example.com')
                        ->subject('New Book Published')
                        ->view('mails.newbook')
                        ->with('name', $this->name)
                        ->with('book', $this->book)
                        ->with('image', $this->book->cover ? Storage::disk('public')->path('/'.$this->book->cover) : '');
        ;
    }

}
