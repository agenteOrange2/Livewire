<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactGeneral extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message', 'type'];

    public function person()
    {
        return $this->hasOne(ContactPerson::class);
    }

    public function company()
    {
        return $this->hasOne(ContactCompany::class);
    }

    public function detail()
    {
        return $this->hasOne(ContactDetail::class);
    }
    
}
