<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Http\Resources\Book as BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBookNotification;

class BookController extends Controller
{

    public function index()
    {
        return BookResource::collection(Book::with('author')->orderBy('id', 'desc')->paginate());
    }

    public function show(Book $book)
    {
        return \App\Http\Resources\Book::make($book->load('author'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'exists:users,id',
        ]);

        return \App\Http\Resources\Book::make(Book::create($data));
    }

    public function destroy(Book $book)
    {
        return response()->json([
            'status' => $book->delete()
        ], 200);
    }

    public function publish(Request $request)
    {
        
        $data = $request->all();
        $validator = $this->validatorPublishBook($data);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $uploadedFile = $request->file('cover');
            if ($uploadedFile) {
                $filename = time() . $uploadedFile->getClientOriginalName();

                Storage::disk('public')->putFileAs(
                        'files', $uploadedFile, $filename
                );
                $data['cover'] = 'files/' . $filename;
                $book = auth()->user()->books()->create($data);
                $this->sendMailOnPublish($book);
                return $book;
            }

    }
    
    protected function sendMailOnPublish($book){
        $readers = User::where('is_subscribed', TRUE)->get(['name', 'email'])->toArray();
        foreach ($readers as $reader){
            Mail::to($reader['email'])->send(new NewBookNotification($book, $reader['name']));
        }
    }
    
    protected function validatorPublishBook(array $data) {
        return Validator::make($data, [
                    'title' => 'required|max:255',
                    'description' => 'required',
                    'cover' => 'nullable|sometimes|image|mimes:jpeg,png'
        ]);
    }
}
