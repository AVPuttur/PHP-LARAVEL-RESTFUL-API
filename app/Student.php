<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //Insert data to table
    protected $table = 'students';

    protected $fillable = ['FNAME', 'LNAME', 'EMAIL', 'TELEPHONE'];

}
