<?php

namespace App\Http\Controllers;

use App\Book;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class BookController extends Controller
{
    public function welcome()
    {
        $writers = Writer::all();
        return view('welcome')
            ->with('writers', $writers);
    }

    public function add()
    {
        return view('add');
    }

    public function add_save()
    {
        $data = Input::all();
        $validator = Validator::make($data, [
            'writer' => 'required|between:3,50',
            'book' => 'required|between:2,50',
            'year' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $writer = Writer::where('name', $data['writer'])->first();
        if ($writer == null) {
            $writer = new Writer();
            $writer->name = $data['writer'];
            $writer->save();
        }
        $book = new Book();
        $book->name = $data['book'];
        $book->writer_id = $writer->id;
        $book->publish_year = $data['year'];
        $book->save();
        return Redirect::back()->with('success', 'The Book Is Saved.');
    }

    public function ajax($writer_id)
    {
        $writer = Writer::where('id', $writer_id)->first();
        if(!$writer)
            return [];
        $books = $writer->books;
        return [
            'writer' => $writer,
            'books' => $books
        ];
    }

}
