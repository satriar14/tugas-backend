<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $animal) {
            echo $animal . PHP_EOL;
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        # gunakan index untuk mengupdate data animals
        $this->animals[$index] = $data;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset($this->animals[$index]);
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['kodok', 'keong', 'kelinci']);

echo "Index - Menampilkan seluruh hewan " . PHP_EOL;
$animal->index();
echo PHP_EOL;

echo "Store - Menambahkan hewan baru " . PHP_EOL;
$animal->store('burung');
$animal->index();
echo PHP_EOL;

echo "Update - Mengupdate hewan " . PHP_EOL;
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo PHP_EOL;

echo "Destroy - Menghapus hewan " . PHP_EOL;
$animal->destroy(1);
$animal->index();
echo PHP_EOL;
