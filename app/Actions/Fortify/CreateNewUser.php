<?php

namespace App\Actions\Fortify;

use App\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return Account
     */
    public function create(array $input): Account
    {
        Validator::make($input, [
            'firstName' => ['required', 'string', 'max:255'],
            'email'     => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Account::class),
            ],
            'password'  => $this->passwordRules(),
        ])->validate();

        return Account::create([
            'email'          => $input['email'],
            'password'       => Hash::make($input['password']),
            'fullName'       => $input['lastName'] . ' ' . $input['firstName'],
            'phoneNumber'    => $input['phone'],
            'email_verified' => 'unverified',
            'status'         => 1,
            'city_id'        => $input['city'],
            'sex'            => $input['sex'],
            'birthDate'      => $input['birthDate'],
            'address'        => $input['address']
        ]);
    }
}
