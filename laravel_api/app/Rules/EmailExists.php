<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value){
        return DB::table('admins')->where('email', $value)->exists() ||
               DB::table('users')->where('email', $value)->exists();
    }

    public function message(){
        // return 'The email does not exist in either the admins or users table.';
        return 'The email doesn\'t found in our database !.';
    }

    public function submit_forgot_password(Request $request){
        $request->validate([
            'email' => ['required', 'email', new EmailExists]
        ]);

        // Continue with password reset logic
    }
}
