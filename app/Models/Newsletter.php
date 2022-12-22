<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    
    // can be mass-assigned when creating or updating a newsletter.
    protected $fillable = ['title', 'content', 'published']; 
    
}
