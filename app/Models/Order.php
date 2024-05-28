<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['student_id', 'total_price'];
    public function students(): HasMany
    {
        return $this->HasMany(Student::class);
    }
    public static function list(){
        return self::all();
    }
    public static function store($request, $id = null){
        $data = $request->only('student_id', 'total_price');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
        
    }
}
