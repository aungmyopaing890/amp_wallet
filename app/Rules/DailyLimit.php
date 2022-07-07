<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;
use phpDocumentor\Reflection\Types\Float_;
use phpDocumentor\Reflection\Types\Integer;

class DailyLimit implements Rule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    public $userDailyAmount;
    public $DailyAmount;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Float_ $userDailyAmount,Float_ $DailyAmount)
    {
        $this->userDailyAmount = $userDailyAmount;
        $this->DailyAmount = $DailyAmount;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \App\Models\Wallet  $wallet
     * @param  mixed  $limit
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->userDailyAmount+$value > $this->DailyAmount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Daily limit!';
    }
}
