<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //

    public function dashboard(){

        $users_count = db::table('users')
            ->count();
        $timein_count = db::table('timein')
            ->whereNotNull('timein')
            ->whereNull('timeout')
            ->count();
        $borrowed_books = db::table('borrowings')
            ->where('type', 2)
            ->where('status', 1)
            ->count();
        $issued_books = db::table('borrowings')
            ->where('type', 1)
            ->where('status', 1)
            ->count();

        $book_count = db::table('materials')
            ->where('status', 1)
            ->count();

        $ebook_count = db::table('materials')
            ->where('status', 1)
            ->where('type', 3)
            ->count();

        $role_id = db::table('user_role')
            ->where('role_name', 'like', '%student%')
            ->orWhere('role_name', 'like', '%STUDENT')
            ->get();

        foreach($role_id as $role_data){
            $id = $role_data->role_id;
        }

        $students = db::table('users')
            ->where('status', 1)
            ->where('role_id', $id)
            ->count();

        $professors = db::table('users')
            ->where('status', 1)
            ->where('role_id', '=' , 2)
            ->count();

        $borrowctr = db::table('borrowings')
            ->select(DB::raw('count(materials.materials_id) as borrowcount'),'materials.title')
            ->join('materials_copies', 'borrowings.material_copy_id', '=', 'materials_copies.material_copy_id')
            ->join('materials', 'materials_copies.materials_id', '=', 'materials.materials_id')
            ->groupBy('materials.materials_id')
            ->orderBY('borrowcount', 'DESC')
            ->limit(5)
            ->get();

        $dailyctr = db::table('timein')
            ->select(DB::raw('count(users.id) as timectr'),'user_details.firstname')
            ->join('users', 'timein.users_id', '=', 'users.id')
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderBY('timectr', 'DESC')
            ->limit(5)
            ->get();
        

        return view('Dashboard')
            ->with('users_count', $users_count)
            ->with('timein_count', $timein_count)
            ->with('borrowed_books', $borrowed_books)
            ->with('issued_books', $issued_books)
            ->with('books', $book_count)
            ->with('ebook', $ebook_count)
            ->with('students', $students)
            ->with('professor', $professors)
            ->with('Borrowctr', $borrowctr)
            ->with('Dailyctr', $dailyctr);
    }

    public function student_dashboard(){
        $extension = db::table('book_extension')
            ->where('users_id', auth::user()->id)
            ->get();

        return view('Student_Dashboard')
            ->with('extension', $extension);

    }

}
