<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'company_name',
        'vat_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

}
