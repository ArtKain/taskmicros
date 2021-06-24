<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'type_id'
      ];
    public function type() {
        return $this->belongsTo(Type::class);    
    }

    public function recording() {
        return $this->HasMany(Recording::class);
    }

    public function users() {
        return $this->belongsTo(User::class);     
    }
}
