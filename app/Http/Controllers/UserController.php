<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Returns only Austria citizens with active accounts
     */
    public function austrians()
    {
        $activeAustrians = User::whereHas('country', function ($query) {
                $query->where('iso2', '=',"AT");
            })->where('active', 1)
            ->with('country')
            ->get();

        return $activeAustrians;
    }

    /**
     * Updates the user details only if they already exist
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function editDetails(Request $request, $id)
    {
        $user = User::where('id', '=', $id)
            ->has('details')
            ->with('details')
            ->first();

        if(!($user instanceof User)) {
            abort(404, 'User with existing details not found');
        }

        $newAttributes = $request->all();

        $details = $user->details;
        $details->update($newAttributes);

        return $user->details;
    }
}
