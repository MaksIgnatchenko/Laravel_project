<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class IsRoleUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::find($value);
        if ($user->role === 'user') {
            return true;
        } else {
            return false;
            }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'It is available only for user role';
    }
}
