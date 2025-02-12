<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Livewire\HomePage::class)->name('home');
Route::get('/booklist',\App\Livewire\BookList::class)->name('book.list');
// Route::get('/addbook',\App\Livewire\AddBook::class)->name('add.book');
Route::get('/memberlist',\App\Livewire\MemberList::class)->name('member.list');
// Route::get('/membershiptype',\App\Livewire\MembershipType::class)->name('membership.type');
// Route::get('/addmember',\App\Livewire\AddMember::class)->name('add.member');
Route::get('/transactionlist',\App\Livewire\TransactionList::class)->name('transaction.list');
Route::get('/issuebook',\App\Livewire\IssueBook::class)->name('issue.book');




