<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, Serializable {
use Codesleeve\Stapler\Stapler;
  
     public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
  public static $rules = array(
    'email'       => 'required|min:1|email|unique:users|max:20',
    'password'    => 'required|min:1|max:20',
    'firstname'   => 'required|min:1|max:20',
    'category'    => 'required|min:1|max:20',
    'lastname'    => 'required|min:1|max:20',
    'phonenumber' => 'required|min:1|max:20',
    'image'       => 'image|mimes:jpg'
  );

  protected $fillable = array('email', 'password', 'firstname', 'lastname', 'category', 'phonenumber', 'remember_token');
  /* // CREATE TABLE "users" ("id" integer not null primary key autoincrement, "email" varchar not null, "password" varchar not null, "firstname" varchar not null, "lastname" varcha      
// null, "category" varchar not null, "phonenumber" varchar not null, "pictureURL" varchar not null, "remember_token" varchar not null, "created_at" datetime not null, "updated      
// atetime not null);  */

  public function __construct(array $attributes = array())
  {
    $this->hasAttachedFile('image', ['styles' =>
      [
        'medium' => '300x300',
        'thumb' => '100x100'
      ]
    ]);

    parent::__construct($attributes);
  }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

  public function jobs()
  {
      return $this->hasMany('Job');
  }

  public function applications()
  {
      return $this->hasMany('Application');
  }
}
