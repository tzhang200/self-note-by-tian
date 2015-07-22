<?php
/* T Zhang 2015 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Note extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = true;
    protected $fillable = ['email', 'notes', 'tbd', 'hlinks', 'img1', 'img2', 'img3', 'img4' ];
    public $message;
    protected $table = 'notes';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');


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
