<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifs extends Model
{
    protected $table = 'Gifs'; // Specify the table name if different from the model name

    protected $fillable = ['title', 'url']; // Fields that can be mass-assigned

}
