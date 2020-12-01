<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'exp_name,exp_one_price,exp_number,exp_total_price,paid,amount,exp_detail,date',
    ];
}
