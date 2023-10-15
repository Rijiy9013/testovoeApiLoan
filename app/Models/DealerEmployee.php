<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealerEmployee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'dealer_employees';
    protected $fillable = [
      'dealer_id',
      'name',
    ];
}
