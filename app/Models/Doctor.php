<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Doctor extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class);
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    public function day()
    {
        return $this->belongsToMany(Day::class,'day_doctor');
    }
}
