<?php
use Carbon\Carbon;
use Codesleeve\Stapler\Stapler;

class Job extends Eloquent {


  public static $rules = array(
    'title'        => 'required|min:1|max:15',
    'description'  => 'required|min:1|max:200',
    'location'     => 'required|min:1|max:20',
    'salary'       => 'required|min:1|numeric|max:9999999',
    'startingdate' => 'required|min:1|date|max:20',
    'endingdate'   => 'required|min:1|date||max:20',
  );
  
	// each bear climbs many trees
	public function users() {
		return $this->belongsToMany('User');
	}
  
  function getDate()
  {
     return array('created_at',
    'updated_at', 'startingdate',
    'endingdate');
  }

}