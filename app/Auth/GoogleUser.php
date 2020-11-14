<?php

namespace App\Auth;

use App\Support\SimpleModel;
use Session;

class GoogleUser extends SimpleModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'token',
        'name',
        'email',
        'avatar',
    ];

    /**
     * Check user is valid
     *
     * @return boolean
     */
    public function isValid()
    {
        return ! empty($this->token);
    }

    /**
     * Save User to Session
     *
     * @return Session::put
     */
    public function save()
    {
        return Session::put('google_user', $this->toArray());
        return Session::save();
    }

    /**
     * Remove User from Session
     *
     * @return Session::forget
     */
    public static function delete()
    {
        return Session::forget('google_user');
    }

    /**
     * Retrieve User from Session
     *
     * @return Session::put
     */
    public static function retrieve()
    {
        $attributes = Session::get('google_user', []);
        return new self($attributes);
    }
}
