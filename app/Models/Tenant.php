<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Laravel\Sanctum\HasApiTokens;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasApiTokens, HasDatabase, HasDomains;
}