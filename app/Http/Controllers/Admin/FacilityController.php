<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $barber = Barber::query()
            ->with('facilities')
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.admin.facilities.index', compact('barber'));
    }

    public function create()
    {
        return view('pages.admin.facilities.create');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $barber->facilities()->create($validator->validated());

        return redirect()->route('admin.facilities.index')->with('status', 'Sukses menambah fasilitias');
    }

    public function edit(Facility $facility)
    {
        return view('pages.admin.facilities.edit', compact('facility'));
    }

    public function update(Facility $facility)
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $facility->update($validator->validated());

        return redirect()->route('admin.facilities.index')->with('status', "Sukses mengubah fasilitias {$facility->name}");
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('status', "Sukses menghapus fasilitias {$facility->name}");
    }
}
