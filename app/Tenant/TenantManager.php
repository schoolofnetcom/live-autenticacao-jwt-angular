<?php
declare(strict_types=1);

namespace App\Tenant;


use App\Models\User;

class TenantManager
{
    private $tenant;

    public function getTenant(): ?User
    {
        return $this->tenant;
    }

    public function setTenant($tenant)
    {
        $this->tenant = $tenant;
    }


}

//Facade::getTenant()