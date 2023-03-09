<?php

namespace App\Models;

Use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
