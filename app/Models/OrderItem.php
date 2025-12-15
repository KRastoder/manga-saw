<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'manga_id',
        'chapter',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function manga()
    {
        return $this->belongsTo(Mangas::class);
    }
}
