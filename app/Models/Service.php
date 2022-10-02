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
        return $this->belongsTo(Service_type::class,'type_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }

}
