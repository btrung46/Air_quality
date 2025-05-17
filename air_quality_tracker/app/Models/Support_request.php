<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support_request extends Model
{
    use HasFactory;
    public function user()  {
        return $this->belongsTo(User::class);
    }

}
