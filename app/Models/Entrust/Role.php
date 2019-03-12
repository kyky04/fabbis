<?php  
namespace App\Models\Entrust;

use Zizaco\Entrust\EntrustRole;
use App\Models\Entrust\Permission;
// use App\Models\Model;
class Role extends EntrustRole
{
	// use Model;
    protected $fillable 	= ['name', 'display_name', 'description'];

}