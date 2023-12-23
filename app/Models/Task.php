<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // if you want to use factories for the model it must have
    //  use HasFactory;

    public function getRouteKeyName()
    {
        return 'id';
    }

    // fillable => allowed mass assignment
    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    // If you don't want to specify fillable you can also specify guarded
    // => all the properties except guarded will be mass assignable. 
}
