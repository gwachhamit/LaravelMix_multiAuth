<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\OrganizationResetPasswordNotification;
use App\Notifications\OrganizationEmailVerificationNotification;

class Organization extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $guard = 'organization';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','email_verified_at ','password','organization_name','slug','province','district','municipality','ward_no','address','website','facebook','twitter','instagram',
        'description','logo','status','industry_id','is_setup_profile','is_active','is_enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new OrganizationResetPasswordNotification($token, $this->email));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new OrganizationEmailVerificationNotification());
    }
}
