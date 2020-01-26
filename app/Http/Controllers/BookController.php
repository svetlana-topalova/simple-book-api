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

/**
 * @group Books management
 *
 * APIs for managing books
 */
class BookController extends Controller {

    /**
     * Get books 
     * 
     * @responseFile responses/books.json
     * 
     */
    public function index() {
        return BookResource::collection(Book::with('author')->orderBy('id', 'desc')->paginate());
    }

    /**
     * Get book by id
     * 
     * @urlParam book required The ID of the book.
     * 
     * @apiResourceCollection \App\Http\Resources\Book
     * @apiResourceModel \App\Book 
     * 
     */
    public function show(Book $book) {
        return \App\Http\Resources\Book::make($book->load('author'));
    }

    /**
     * Store book
     * 
     * @bodyParam title string required The title of the book.
     * @bodyParam description string required The description of the book.
     * @bodyParam author_id int required The id of the author.
     * 
     * @apiResourceCollection \App\Http\Resources\Book
     * @apiResourceModel \App\Book 
     * 
     */
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'exists:users,id',
        ]);

        return \App\Http\Resources\Book::make(Book::create($data));
    }

    /**
     * Delete book 
     * 
     * @urlParam book required The ID of the book.
     * 
     * @response 200 { 
     * "status": true
     * }
     * 
     * @response 404 { 
     * "status": false,
     * "message": "No query results for model [App\\Book] {book}"
     * }
     * 
     */
    public function destroy(Book $book) {
        return response()->json([
                    'status' => $book->delete()
                        ], 200);
    }

    /**
     * Publish book 
     * 
     * Allowed only for authors 
     * 
     * @authenticated
     * 
     * @bodyParam title string required The title of the book.
     * @bodyParam description string required The description of the book.
     * @bodyParam cover file nullable image mimes:jpeg,png The cover of the book.
     * 
     * @response 201 { 
     * "message":  "Successful book publish"
     * }
     * @response 400 {
     * "title": ["The title field is required."]
     * }
     * 
     * @response 403 {
     *  "error": "Unauthorized"
     * }
     * 
     */
    public function publish(Request $request) {

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
        }

        $book = auth()->user()->books()->create($data);
        $this->sendMailOnPublish($book);
        return response()->json(['message' => "Successful book publish"], 201);
    }

    protected function sendMailOnPublish($book) {
        $readers = User::where('is_subscribed', TRUE)->get(['name', 'email'])->toArray();
        foreach ($readers as $reader) {
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
