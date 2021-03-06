<?php
/* T Zhang 2015 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    public $timestamps = true;
    protected $fillable = ['email', 'password', 'confirmed', 'confirmcode', 'attemp', 'password_confirmation' ];
    public $message;
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public static $rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|max:80|confirmed',
        'user-captcha' => 'required|captcha',
    ];

    public function isVAlid()
    {
        $v = Validator::make($this->attributes, static::$rules);
        if ($v->passes())
        {
            return true;
        }
        $this->messages = $v->messages();
        return false;
    }

}
