<?php

namespace App\Http\Response\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 *
 */
class PermissionResource extends AbstractJsonResource
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
            'slug' => $this->slug,

        ];
    }
}