<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    const ROLE_NORMAL = 2; // 一般會員身份
    const ROLE_ADMIN= 1; //管理者身份
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'github_id', // 使用者通過 GitHub OAuth 認證時，Laravel 可以將 github_id 儲存在使用者模型
        'facebook_id', 
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        // jwt套件
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // jwt套件
        return [];
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    public function isNormalUser()
    {
        return $this->role === self::ROLE_NORMAL;
    }
    public function hasPermissionToCreateBook()
    {
        //...登入角色符合權限
        return $this->isAdmin() || $this->isNormalUser();
    }
    public function hasPermissionToViewAnyBooks()
    {
        //...登入角色符合權限
        return $this->isAdmin() || $this->isNormalUser();
    }
//    public function permissions() {
//        return $this->belongsToMany(Permission::class)->withTimestamps();// 加入時間
//        // 多對多要小心是會重複增加的，可以改用syn(1,2,3)，$user->permissions()->sync([1,2,3])
//        // 可研究一下 attatch() 和 detach()
//    }
}
