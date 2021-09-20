<?php
namespace App\Filter;

use Laratrust;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class GateFilter implements FilterInterface
{
    public function transform($item)
    {
        if ((isset($item['can']) && !Laratrust::isAbleTo($item['can']))) {
            return false;
        }
        if ((isset($item['roles']) && !Laratrust::hasRole($item['roles']))) {
            return false;
        }

        return $item;
    }
}
?>