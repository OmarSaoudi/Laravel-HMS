<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nurse extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    public $table = 'nurses';
    protected $guarded =[];

    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class);
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

}
