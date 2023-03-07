<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['judul', 'category_id', 'content', 'gambar', 'slug'];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tags::class)->withTimestamps();
    }
}
