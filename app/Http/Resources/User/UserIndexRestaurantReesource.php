<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexRestaurantReesource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=>$this->name,
            'type'=>$this->restaurant_category_id,
            'address'=>'',
            'is_open'=>'',
            'image'=>'',
            'score'=>'',
            'comments_count'=>'',
            'schedule'=>'',

        ];
    }
}