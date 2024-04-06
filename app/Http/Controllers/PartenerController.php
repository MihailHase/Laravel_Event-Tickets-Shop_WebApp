<?php

namespace App\Http\Controllers;

use App\Models\Partener;
use Illuminate\Http\Request;

class PartenerController extends Controller
{
    public function index()
    {
        $parteners = Partener::all();
        return view('admin.parteners.index', compact('parteners'));
    }

    public function create()
    {
        return view('admin.parteners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $partener = Partener::create($request->all());

        view()->file(resource_path("views/parteners/{$partener->id}.blade.php"), [
            'partener' => $partener,
        ]);

        return redirect()->route('admin.parteners.index')->with('success', 'Partener created successfully!');
    }

    public function show(Partener $partener)
    {
        return view('parteners.partener_page', compact('partener'));
    }
}
