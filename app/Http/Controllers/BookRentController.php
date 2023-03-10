<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request ['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'not available') {
            Session::flash('message', 'Cannot rent, this book not available!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
            ->count();

            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, you have already rented 3 times!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }else {
                try {
                    DB::beginTransaction();
                    //proccess insert to rent_logs table
                    RentLogs::create($request->all());
                    //proccess update book table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'in stock';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Rent book successfully!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-return', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)
        ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        
        if ($countData == 1) {
            //user & buku yg dipilih di return benar maka berhasil return book
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'The Book return successfully!');
            Session::flash('alert-class', 'alert-succes');
            return redirect('book-return');
        }else {
            //user & buku yg dipilih di return salah maka muncul error notice
            Session::flash('message', 'The Book return not match!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
        
    }
}
