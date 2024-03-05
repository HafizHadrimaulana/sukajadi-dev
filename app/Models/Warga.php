<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\WargaEmailVerificationNotification;

class Warga extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    public function guardName()
    {
      return 'warga';
    }

    protected $table = 'warga';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Custom password reset notification.
     * 
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notification($token));
    }

    /**
     * Send email verification notice.
     * 
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new WargaEmailVerificationNotification);
    }

    
    public function daerah()
    {
        return $this->belongsTo(Wilayah\Kota::class, 'daerah_id');
    }

}
