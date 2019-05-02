<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Task;

class Validation implements Rule
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
        $title = Task::where('title', $value)->count();
        if($title < 1){
            return true;
        }
        else{
            false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Same Title Not Allow';
    }
}
