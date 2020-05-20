<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConfirmUserCheck implements Rule
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
        /*$user = \App\User::where('email',$request->input('email'))->with('confirmdata')->first();
            if (!$user->confirmdata->confirm) {
            return redirect('/login')->with('alert','This user Is Blocked');
            
        }*/
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
