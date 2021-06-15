<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'income',
      ];

    public function recording() {

        return $this->HasMany(Recording::class);
        
    }

    
    public function category() {

        return $this->HasMany(Category::class);
        
    }

}
