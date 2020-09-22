<?php


namespace App\Filters;


use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function category($id)
    {
        return $this->related('category', 'category_id', '=', $id);
    }

    public function name($name)
    {
        return $this->where(function ($q) use ($name) {
            return $q->where('product_name', 'LIKE', "%$name%")
                ->orWhere('description', 'LIKE', "%$name%");
        });
    }
}
