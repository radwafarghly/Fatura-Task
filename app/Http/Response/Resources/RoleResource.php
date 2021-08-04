<?php

namespace App\Http\Response\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 *
 */
class RoleResource extends AbstractJsonResource
{
    /**
     *
     */
    public function modelResponse() : array
    {

        return [
            'id' => $this->id,
            'name_arabic' => $this->name_arabic,
            'name_english' => $this->name_english,
            'description_arabic' => $this->description_arabic,
            'description_english' => $this->description_english,
            'permissions' => PermissionResource::collection($this->permissions),

        ];
    }
}