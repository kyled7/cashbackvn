<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    public $initAccountBalanceReward = 50000;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'is_admin', 'provider', 'social_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * An user has one account balance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account_balance()
    {
        return $this->hasOne('App\Models\AccountBalance');
    }

    /**
     * An user has one (bank) account setting
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account_setting()
    {
        return $this->hasOne('App\Models\AccountSetting');
    }

    /**
     * An user has many transactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    /**
     * An user has many redeem requests
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redeem_request()
    {
        return $this->hasMany('App\Models\RedeemRequest');
    }

    /**
     * Get available account balance amount
     * @return mixed
     */
    public function getAvailableAmountAttribute()
    {
        return $this->account_balance->amount;
    }

    /**
     * Get pending account balance amount
     * @return mixed
     */
    public function getPendingAmountAttribute()
    {
        return $this->transactions->where('status', 'pending')->sum('cashback_amount');
    }

    /**
     * Get rejected transaction amount
     * @return mixed
     */
    public function getRejectedAmountAttribute()
    {
        return $this->transactions->where('status', 'rejected')->sum('cashback_amount');
    }

    /**
     * Get total account balance amount
     * @return mixed
     */
    public function getTotalAmountAttribute()
    {
        return $this->available_amount + $this->pending_amount;
    }

    public function getPendingRedeemRequestAttribute()
    {
        return $this->redeem_request()->where('status', '<>', 'closed')->first();
    }

    /**
     * Implement new user created events
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->account_balance()->create([
                'user_id' => $user->id
            ]);
            if ($user->initAccountBalanceReward > 0) {
                DB::beginTransaction();
                $user->account_balance->history()->create([
                    'account_balance_id' => $user->account_balance->id,
                    'amount_change' => $user->initAccountBalanceReward,
                    'description' => trans('message.init-account-reward')
                ]);
                $user->account_balance->fill(['amount' => $user->initAccountBalanceReward])->save();
                DB::commit();
            }

            Mail::queue('email.welcome', compact('user'), function($message) use ($user) {
                $message->from('info@hoantien.vn', 'HoànTiền.VN');
                $message->to($user->email, $user->name)->subject(trans('message.welcome-email-title'));
            });
        });
    }
}
