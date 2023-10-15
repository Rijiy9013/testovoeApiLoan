<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'applications';
    protected $fillable = [
      'dealer_id',
      'bank_id',
      'dealer_employee_id',
      'loan_amount',
      'loan_term',
      'interest_rate',
      'reason_description',
      'application_status_id',
    ];


    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function dealer_employee()
    {
        return $this->belongsTo(DealerEmployee::class, 'dealer_employee_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'application_status_id');
    }

}
