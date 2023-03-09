<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Str;
use App\Models\Type;

class Project extends Model
{
    protected $fillable = ['title', 'data_progetto', 'difficoltà', 'descrizione', 'slug', 'types_id', 'technology_id', 'cover_image'];
    use HasFactory;

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'types_id'); // Serve aggiungere types_id sennò non mi rileva il nome
    }

    public function technology(){
        return $this->belongsToMany(Technology::class,'project_technology', 'project_id', 'technology_id');
    }
}
