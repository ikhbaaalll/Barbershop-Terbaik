<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $barber = Barber::query()
            ->with('services')
            ->whereBelongsTo(auth()->user())
            ->first();

        return view('pages.admin.services.index', compact('barber'));
    }

    public function create()
    {
        return view('pages.admin.services.create');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->first();

        $barber->services()->create($validator->validated());

        return redirect()->route('admin.services.index')->with('status', 'Sukses menambah fasilitias');
    }

    public function edit(Service $service)
    {
        return view('pages.admin.services.edit', compact('service'));
    }

    public function update(Service $service)
    {
        $validator = validator(request()->all(), [
            'name' => ['required']
        ]);

        $service->update($validator->validated());

        return redirect()->route('admin.services.index')->with('status', "Sukses mengubah fasilitias {$service->name}");
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', "Sukses menghapus fasilitias {$service->name}");
    }
}
