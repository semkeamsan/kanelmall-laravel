<?php

namespace App\Models;

use Twilio\Rest\Client;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    public $validation;
    protected static $logFillable = true;
    public function __construct(array $attributes = [])
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
        $this->validation = new UserFormRequest;
        parent::__construct($attributes);
    }

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
        'phone_verified_at' => 'datetime',
        // 'dob' => 'date',
    ];

    public function hasVerifiedPhone()
    {
        return !is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function otp(int $code = null)
    {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        if($code){
            return  $twilio->verify->v2->services(env('TWILIO_VERIFY_SID'))
            ->verificationChecks
            ->create($code, ['to' => '+855' . $this->phone])
            ->valid;
        }else{
            return $twilio->verify->v2->services(env('TWILIO_VERIFY_SID'))
            ->verifications
            ->create('+855' . $this->phone, 'sms');
        }


    }


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->latest('id');
    }

    public function auths()
    {
        return $this->hasMany(SocialAuth::class)->latest('id');
    }
}
