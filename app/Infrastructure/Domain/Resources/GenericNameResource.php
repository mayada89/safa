<?php

namespace App\Infrastructure\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenericNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'name' => $this->name,
        ];

        if ($this->key) {
            $response['key'] = $this->key;
        }

        return $response;
    }
}
