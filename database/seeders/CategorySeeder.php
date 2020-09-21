<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    private $allFakerPhotos;
    private $fakerPhotosPath = 'app/faker/product_photos';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->allFakerPhotos = $this->getFakerPhotos();
        $this->deleteAllPhotosCategoriesPath();
        DB::table('categories')->insert([
            'category_name' => 'Laços',
            'description' => 'Os mais lindos e fofos laços para enfeitar sua criança',
            'photo' => $this->getUploadedFile()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Tiaras',
            'description' => 'As mais lindas e fofas tiaras para enfeitar sua cabeça',
            'photo' => $this->getUploadedFile()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Viseiras',
            'description' => 'As mais lindas e fofas viseiras para enfeitar sua cabeça',
            'photo' => $this->getUploadedFile()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Faixas Para Bebe',
            'description' => 'As mais lindas e fofas faixas para enfeitar a cabeça de seu bebe',
            'photo' => $this->getUploadedFile()
        ]);
        Category::factory()->times(20)->make()->each([
            'photo' => $this->getUploadedFile()
        ]);
    }

    /**
     * @return Collection
     */
    private function getFakerPhotos(): Collection
    {
        $path = storage_path($this->fakerPhotosPath);
        return collect(\File::allFiles($path));
    }

    /**
     *
     */
    private function deleteAllPhotosCategoriesPath()
    {
        $path = Category::PRODUCTS_PATH;
        \File::deleteDirectory(storage_path($path), true);
    }

    /**
     * @return UploadedFile
     */
    private function getUploadedFile(): UploadedFile
    {
        $photoFile = $this->allFakerPhotos->random();
        $uploadFile = new UploadedFile($photoFile->getRealPath(), Str::random(16) . '.' . $photoFile->getExtension());
        return $uploadFile;
    }
}
