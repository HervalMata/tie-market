<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;

    const BASE_PATH = 'app/public';
    const DIR_PRODUCTS = 'product_photos';
    const PRODUCTS_PATH = self::BASE_PATH . '/' . self::DIR_PRODUCTS;

    protected $fillable = ['file_name', 'product_id'];

    /**
     * @param $productid
     * @return string
     */
    public static function photosPath($productid)
    {
        $path = self::PRODUCTS_PATH;
        return storage_path("{$path}/{$productid}");
    }

    /**
     * @param $product_id
     * @param array $files
     */
    public static function uploadFiles($product_id, array $files)
    {
        $dir = self::photosDir($product_id);
        foreach ($files as $file) {
            $file->store($dir, ['disk' => 'public']);
        }
    }

    /**
     * @param $product_id
     * @return string
     */
    public static function photosDir($product_id)
    {
        $dir = self::DIR_PRODUCTS;
        return "{$dir}/{$product_id}";
    }
}
