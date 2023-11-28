<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Relationship extends Model
{
    use HasFactory;

    protected $table = "relationships";

    protected $fillable = [
        'name'
    ];

    /*
    * Get all of the celebrants for the Relationship
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function celebrants():HasMany
    {
        return $this->hasMany(Celebrant::class, 'relationship_id');
    }

    /*
     * Get the validation rules that apply to the model's input.
     *
     * @param  array  $data
     * @return array
     */
    public static function rules(array $data)
    {
        return [
            'name' => 'required|unique:relationships,name|max:255',
        ];
    }
}
