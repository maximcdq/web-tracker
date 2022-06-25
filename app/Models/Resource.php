<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'url', 'response_code'];

    const CODE_200 = '200';
    const CODE_404 = '404';
    const CODE_500 = '500';
    const CODE_301 = '301';

    public const responseCodes = [
        200 => self::CODE_200,
        404 => self::CODE_404,
        301 => self::CODE_301,
        500 => self::CODE_500
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function store(object $resource): void
    {
        if (self::checkResponseCode($resource->response_code)) {
            Resource::create([
                'name' => $resource->name,
                'url' => $resource->url,
                'response_code' => self::responseCodes[$resource->response_code],
                'user_id' => Auth::id()
            ]);
        }
    }

    public static function checkResponseCode(int $code): bool
    {
        if (isset(self::responseCodes[$code])) {
            return true;
        }
        return false;
    }

    public static function getUserResourcesWithPaginate()
    {
        return self::where('user_id', '=', Auth::id())->paginate(12);
    }


}
