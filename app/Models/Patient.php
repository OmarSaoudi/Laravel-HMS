<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Patient extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }
}
