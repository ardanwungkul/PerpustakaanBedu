<?php

namespace App\Http\Controllers;

use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = History::all();
        return view('master.history.index', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function userStore(Request $request, $book)
    {
        $history = new History();
        $history->date = Carbon::now();
        $history->date_received = $request->date_received;
        $history->book_id = $book;
        $history->user_id = Auth::user()->id;
        $history->save();

        return redirect()->back()->with(['success' => 'Berhasil Mengajukan Peminjaman Buku']);
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        $history->status = $request->status;
        if ($request->status !== 'dikembalikan') {
            $history->return_date = null;
        } else {
            if ($request->has('return_date') &&  $request->return_date !== null) {
                $history->return_date = $request->return_date;
            }
        }
        $history->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        $history->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Data']);
    }
}
