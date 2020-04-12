<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Returns only Austria citizens with active accounts
     */
    public function austrians()
    {
        return User::whereHas('country', function ($query) {
            $query->where('iso2', '=', "AT");
        })->where('active', 1)
            ->with('country')
            ->get();
    }

    /**
     * Updates the user details only if they already exist
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function editDetails(Request $request, $id)
    {
        $user = User::where('id', '=', $id)
            ->has('details')
            ->with('details')
            ->first();

        if (!($user instanceof User)) {
            abort(404, 'User with existing details not found');
        }

        $newAttributes = $request->all();

        $details = $user->details;
        $details->update($newAttributes);

        return $user->details;
    }

    /**
     * @param int $id
     * @return string
     */
    public function delete($id)
    {
        $user = User::doesntHave('details')
            ->where([
                ['id', '=', $id],
                ['active', '=', 1]
            ])
            ->first();

        if (!($user instanceof User)) {
            abort(404);
        }

        $user->active = 0;
        $user->save();

        return 'User is deleted successfully';
    }
}
