<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);
            static::creating(function ($model) use ($isAdmin) {
// Prevent admin from setting his own id - admin entries are global.

// If required, remove the surrounding IF condition and admins will act as users
                if (!$isAdmin) {
                    //$model->account_id = auth()->account_id();
                    //$model->account_id = auth()->user()->account_id;
                    $model->id = auth()->user()->account_id;
                }
            });
            if (!$isAdmin) {
                static::addGlobalScope('id', function (Builder $builder) {
                    $field = sprintf('%s.%s', $builder->getQuery()->from, 'id');

                    $builder->where($field, auth()->user()->account_id)->orWhereNull($field);
                });
            }
        }
    }
}
