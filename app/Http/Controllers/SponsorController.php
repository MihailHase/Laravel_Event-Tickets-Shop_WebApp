<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $sponsor = Sponsor::create($request->all());

        view()->file(resource_path("views/sponsors/{$sponsor->id}.blade.php"), [
            'sponsor' => $sponsor,
        ]);

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor created successfully!');
    }
}
