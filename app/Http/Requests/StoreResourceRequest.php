<?php

namespace App\Http\Requests;

use App\Models\Resource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['required', 'string', 'min:3', 'url', 'active_url'],
            'response_code' => ['required', 'numeric', 'max:599', 'min:100'],
        ];
    }

    public static function store($resource)
    {
        Resource::create([
            'name' => $resource->name,
            'url' => $resource->url,
            'response_code' => $resource->response_code,
            'user_id' => Auth::id()
        ]);
    }

}
