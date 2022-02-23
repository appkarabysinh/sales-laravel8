<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductStore extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['price_store', 'product_id', 'store_id'];

    protected $searchableFields = ['*'];

    protected $table = 'product_stores';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
