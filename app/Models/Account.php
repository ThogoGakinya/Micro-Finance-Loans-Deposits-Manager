<?php

namespace App\Models;

use App\Http\Controllers\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Account extends Model
{
    use SoftDeletes,MultiTenantModelTrait, HasFactory;

    public $table = 'accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function accountUsers()
    {
        return $this->hasMany(User::class, 'account_id', 'id');
    }

    public function accountPayments()
    {
        return $this->hasMany(Payment::class, 'account_id', 'id');
    }
}
