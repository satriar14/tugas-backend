<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $animals = ['kucing', 'ayam', 'ikan'];

    public function index()
    {
        return $this->animals;
    }

    public function store(Request $request)
    {
        array_push($this->animals, $request->nama);
        return $this->animals;
    }

    public function update(Request $request, $id)
    {
        $this->animals[$id] = $request->nama;
        return $this->animals;
    }

    public function destroy($id)
    {
        unset($this->animals[$id]);
        return $this->animals;
    }
}
