<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['payment_id', 'product_id', 'store_id'];

    protected $searchableFields = ['*'];

    protected $table = 'payment_details';

    public function paymentDetail()
    {
        return $this->belongsTo(Payment::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
