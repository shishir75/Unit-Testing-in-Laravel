<?php

namespace App;

use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    public function buy()
    {
        if(auth()->user()->isMinor())
        {
            throw new MinorCannotBuyAlcoholicBeverageException();
        }    

        return true;
    }
    
}
