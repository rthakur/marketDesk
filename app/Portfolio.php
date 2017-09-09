<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{


   protected $gurared = [];


   public function getCompany()
   {

     return $this->hasOne('App\Company', 'id', 'company_id');

   }

}
