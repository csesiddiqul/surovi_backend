<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(self::class, 'prantsId', 'id');
    }

    public function getMenusAll($onlyActive = false, $sortBy = 'Priority', $sortOrder = 'asc')
    {
        if ($onlyActive) {
            $listFullMenu = $this->getMenuActive($sortBy, $sortOrder = 'asc');
        } else {
            $listFullMenu = $this->getMenuFull($sortBy, $sortOrder = 'asc');
        }
        return $listFullMenu;
    }

    public function getMenuActive($sortBy = 'Priority', $sortOrder = 'asc')
    {
        $listFullMenu = $this->where('status', 1)
            ->orderBY($sortBy, $sortOrder)
            ->get()
            ->groupBy('prantsId');
        return $listFullMenu;
    }

    public function getMenuFull($sortBy = 'Priority', $sortOrder = 'asc')
    {
        $listFullMenu = $this->orderBY($sortBy, $sortOrder)
            ->get()
            ->groupBy('prantsId');
        return $listFullMenu;
    }
}
