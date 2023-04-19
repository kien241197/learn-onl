<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách tư vấn";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $contacts = Contact::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('email', 'LIKE', "%".$search."%");
            }
          })
        ->orderBy('created_at', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.contact.index', [
            'title' => $title,
            'contacts' => $contacts,
        ]);
    }
}
