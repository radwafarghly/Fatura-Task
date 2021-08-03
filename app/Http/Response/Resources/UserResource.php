<?php

namespace App\Http\Response\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 *
 */
class UserResource extends AbstractJsonResource
{
    /**
     *
     */
       
    public function modelResponse() : array
    {
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            


      
        ];
    }
}