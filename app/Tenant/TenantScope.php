<?php
/**
 * Created by PhpStorm.
 * User: argen
 * Date: 05/10/2018
 * Time: 16:35
 */

namespace App\Tenant;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (\Tenant::getTenant()) {
            $userId = \Tenant::getTenant()->id;
            $builder->where('user_id', $userId);
        }
    }
}