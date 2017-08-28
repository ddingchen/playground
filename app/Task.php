<?php

namespace App;

use App\Event;
use App\FormInput;
use App\Prize;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function formInputs()
    {
        return $this->hasMany(FormInput::class);
    }

    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }
}
