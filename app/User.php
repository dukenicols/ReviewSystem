<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'username',
    ];

    protected $appends = [ 'avatar' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =[
                'email',
                'password',
                'remember_token',
                'id',
                'verified',
                'token',
                'role',
                'img',
                'updated_at',
                'created_at'
    ];


    public function reviews() {
        return $this->hasMany('App\Review', 'created_by', 'id');
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function is($type)
    {
        return $this->role === $type;
    }

    public static function whereToken($token)
    {
      return User::where('token', $token)->first();
    }

    public function getAvatarAttribute($value)
    {
        $default= 0;
        $size = 40;
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/$hash?d=$default&s=$size";
    }

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }
    /**
     * Set the password attribute.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

}
