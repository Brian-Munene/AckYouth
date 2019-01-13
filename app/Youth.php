<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Youth extends Model
{
    protected $table ='youth';
    public $primaryKey='id';
    public function user(){
        return $this->BelongsTo('App\User');
    }
}
