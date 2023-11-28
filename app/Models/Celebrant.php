<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebrant extends Model
{
    use HasFactory;

    protected $table = "celebrants";
    
    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthday',
        'phone',
        'relationship_id'
    ];

    public function relationship(){
        return $this->belongsTo(Relationship::class, 'relationship_id');
    }
}
