<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Category extends Model
{
    use HasFactory;

    public function Articles(){
        return $this->hasMany(Article::class, 'category_id');
    }
}
