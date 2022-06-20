<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Sessao;
class FilmePolicy{
	use HandlesAuthorization;
	public function cru($user){
		
        return $user->tipo == "A";
    }

    public function delete($user, Sessao $sessoes){
		return $user->tipo == "A";
      
    }

}