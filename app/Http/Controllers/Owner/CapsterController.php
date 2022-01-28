<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\CapsterRequest;
use App\Models\Barber;
use App\Models\Capster;

class CapsterController extends Controller
{
    public function index()
    {
        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $capsters = Capster::query()
            ->whereBelongsTo($barber)
            ->get();

        return view('pages.owner.capster.index', compact('capsters', 'barber'));
    }

    public function create()
    {
        return view('pages.owner.capster.create');
    }

    public function store(CapsterRequest $capsterRequest)
    {
        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $barber->capsters()->create(array_merge($capsterRequest->validated(), [
            'photo' => url($capsterRequest->file('photo')->move('capster/' . $barber->id, now()->timestamp . '.' . $capsterRequest->file('photo')->getClientOriginalExtension()))
        ]));

        return redirect()->route('owner.capsters.index')->with('status', 'Sukses menambah capster');
    }

    public function edit(Capster $capster)
    {
        return view('pages.owner.capster.edit', compact('capster'));
    }

    public function update(CapsterRequest $capsterRequest, Capster $capster)
    {
        $capster->update([
            'name' => $capsterRequest->name,
            'age' => $capsterRequest->age,
        ]);

        if ($capsterRequest->hasFile('photo')) {
            $capster->update([
                'photo' => url($capsterRequest->file('photo')->move('capster/' . $capster->barber_id, now()->timestamp . '.' . $capsterRequest->file('photo')->getClientOriginalExtension()))
            ]);
        }

        return redirect()->route('owner.capsters.index')->with('status', "Sukses mengubah capster {$capster->name}");
    }

    public function destroy(Capster $capster)
    {
        $capster->delete();

        return redirect()->route('owner.capsters.index')->with('status', "Sukses menghapus capster {$capster->name}");
    }
}
