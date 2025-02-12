<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookList extends Component
{
    public $title,$author,$isbn,$status;
    public $books;
    public  $edit_book;
    public $error_message;

    public function render()
    {
        return view('livewire.book-list');
    }
    public function mount()
    {
        $this->books=Book::all();
    }
     // Reset form fields after adding or editing a book
     public function resetInputFields()
     {
         $this->title = '';
         $this->author = '';
         $this->isbn = '';
         $this->status = '';
         $this->resetErrorBag();
     }
        // Save a new book to the database
    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'status' => 'required|in:available,issued,not available',
        ]);

        $book = new Book();  // Create a new book instance
        $book->title = $this->title;
        $book->author = $this->author;
        $book->isbn = $this->isbn;
        $book->status = $this->status;

        $book->save();  // Save the new book to the database

        $this->resetInputFields();  // Reset form fields after saving
        $this->dispatch('closemodal');  // Dispatch a JavaScript event to close the modal

        // Reload books after adding a new one
        $this->books = Book::all();  // Fetch the updated list of books
    }

    // Edit an existing book
    public function editBook($id)
    {
        $book = Book::where('id', $id)->first();  // Find the book to edit
        if (!$book) {
            return;  // Exit if no book is found
        }

        $this->resetInputFields();  // Reset the form fields

        $this->title = $book->title;
        $this->author = $book->author;
        $this->isbn = $book->isbn;
        $this->status = $book->status;
        $this->edit_book = $book;
    }

    // Save the updated book data
    public function saveUpdate()
    {
        $book = Book::where('id', $this->edit_book->id)->first();  // Get the book instance
        $book->title = $this->title;
        $book->author = $this->author;
        $book->isbn = $this->isbn;
        $book->status = $this->status;

        $book->save();  // Save the updated book data to the database

        $this->resetInputFields();  // Reset form fields after saving
        $this->dispatch('closemodal');  // Dispatch a JavaScript event to close the modal

        // Reload books after updating
        $this->books = Book::all();  // Fetch the updated list of books
    }

    // Delete a book
    public function deleteBook($id)
    {
        $book = Book::where('id', $id)->first();  // Find the book to delete
        if ($book) {
            $book->delete();  // Delete the book
            session()->flash('message', 'Book successfully deleted!');
            $this->books = Book::all();  // Reload books after deletion
        } else {
            $this->error_message = "Book not found.";
        }
    }
}

