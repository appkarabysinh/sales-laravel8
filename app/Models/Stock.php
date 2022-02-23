<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['payment_detail_id', 'product_count_remaining'];

    protected $searchableFields = ['*'];

    public function paymentDetail()
    {
        return $this->belongsTo(PaymentDetail::class);
    }
}
