<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'admin_menus';

    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }

    public function roleaccess()
    {
        return $this->hasMany(UserAccessMenu::class);
    }

    public function punyaRole()
    {
        return $this->hasOne(UserAccessMenu::class, 'menu_id');
    }
}
