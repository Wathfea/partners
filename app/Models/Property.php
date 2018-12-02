<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'text_value', 'number_value', 'boolean_value'
    ];

    /*
     * -----------------------------------------------------------------------------------------------------------------
     * Relations
     * -----------------------------------------------------------------------------------------------------------------
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'partners_properties');
    }

    /*
     * -----------------------------------------------------------------------------------------------------------------
     * Methods
     * -----------------------------------------------------------------------------------------------------------------
     */

    /**
     * Return the used characters in the given text
     *
     * @return string
     */
    public function getUsedChars()
    {
        if ($this->type != 'TEXT') return;

        return count_chars($this->text_value, 3);
    }


    /**
     * Return the length of the used characters in the given text
     *
     * @return int
     */
    public function numberOfUsedChars()
    {
        return strlen($this->getUsedChars());
    }


    /**
     * Determinate is a number palindrome or not
     *
     * @return bool
     */
    public function isPalindrome()
    {
        if ($this->type != 'NUMBER') return;

        $temp = $this->number_value;
        $newNumber = 0;

        while (floor($temp)) {
            $digit = $temp % 10;
            $newNumber = $newNumber * 10 + $digit;
            $temp = $temp / 10;
        }

        if ($newNumber == $this->number_value)
            return true;
        else
            return false;
    }


    /**
     * Returns number raised to the power of exp.
     *
     * @param int $exp
     * @return float|int
     */
    public function raiseNumberTo(int $exp)
    {
        return pow($this->number_value, $exp);
    }

}
