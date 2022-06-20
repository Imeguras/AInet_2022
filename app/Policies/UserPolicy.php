<?php

namespace App\Policies;

use App\Models\User;
use App\Models\users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
	public function before($user, $ability){
		if ($user->admin) {
            return true;
        }
	}
    
    public function viewAny(users $user)
    {
        return ($user->tipo == 'A') || ($user->tipo == 'F');
    }

    public function view(User $user, users $cliente)
    {
        return ($user->tipo == 'F') || ($user->id == $cliente->user_id);
    }

    public function update(User $user, users $cliente){
        return $user->id == $cliente->user_id;
    }

    public function delete(User $user, users $cliente)
    {
        return false;
    }

    public function restore(User $user, users $cliente){
        //
    }

    public function forceDelete(User $user, users $cliente)
    {
        //
    }
	public function cru(User $user){
		
        return $user->tipo == "A";
    }

}
