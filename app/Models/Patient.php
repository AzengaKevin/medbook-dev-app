<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'tbl_patient';

    protected $fillable = ['name', 'date_of_birth', 'gender_id', 'service_id', 'comments'];
    
    protected $casts = [
        'date_of_birth' => 'date'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }    
}
