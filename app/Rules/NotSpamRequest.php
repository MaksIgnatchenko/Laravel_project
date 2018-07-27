<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\RoleRequest;

class NotSpamRequest implements Rule
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
        $roleRequest = RoleRequest::where('sender_id', $value)
                                    ->whereNull('processed')
                                    ->first();
        return !(bool)$roleRequest;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have already sent a request for a role change and it is waiting for processing';
    }
}
