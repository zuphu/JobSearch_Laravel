<?php

use Codesleeve\Stapler\Stapler;

class Application extends Eloquent {

  public static $rules = array(
    'applicationletter'        => 'required|min:1|',
  );

  function user()
  {
    return $this->belongsTo('User', 'user_id');
  }

 function job()
 {
   return $this->belongsTo('Job', 'job_id');
 }

}