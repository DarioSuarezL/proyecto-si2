<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'type_id',
        'client_id',
        'status',
    ];

    public function service_type()
    {
        return $this->hasOne(Service_type::class,'id','type_id');
    }

    public function client()
    {
        return $this->hasOne(User::class,'id','client_id');
    }

}
