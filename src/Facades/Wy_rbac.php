<?php
namespace Wenyu\Wy_rbac\Facades;
use Illuminate\Support\Facades\Facade;
class Wy_rbac extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'wy_rbac';
    }
}