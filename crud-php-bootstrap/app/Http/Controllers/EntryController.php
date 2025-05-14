<?php

namespace App\Http\Controllers;

use App\Exports\EntryExport;
use App\Http\Requests\EntryRequest;
use App\Models\Entry;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }

    public function store(EntryRequest $request)
    {
        $data = $request->validated();
        Entry::create($data);
        return redirect()->route('entries.index');
    }

    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    public function update(EntryRequest $request, Entry $entry)
    {
        $data = $request->validated();
        $entry->update($data);
        return redirect()->route('entries.index');
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entries.index');
    }

    public function trash()
    {
        $entries = Entry::onlyTrashed()->get();
        return view('entries.trash', compact('entries'));
    }

    public function restore($id)
    {
        $entry = Entry::onlyTrashed()->findOrFail($id);
        $entry->restore();

        return redirect()->route('entries.trash')->with('success', 'Registro restaurado com sucesso!');
    }

    public function show($id)
    {
        $entry = Entry::findOrFail($id);
        return view('entries.show', compact('entry'));
    }

    public function exportExcel()
    {
        return Excel::download(new EntryExport(), 'entries.xlsx');
    }
}
