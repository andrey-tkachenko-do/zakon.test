<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Document extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = [
      'title',
      'body'
    ];
}
