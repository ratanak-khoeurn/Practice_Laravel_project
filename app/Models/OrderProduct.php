<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['student_id', 'total_price'];
    public function students(): HasMany
    {
        return $this->HasMany(Student::class);
    }
    
    public function products(): HasMany
    {
        return $this->HasMany(Product::class);
    }
}
