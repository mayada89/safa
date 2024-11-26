<?php

namespace App\Pitche\Domain\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PitcheResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'created_at' => Carbon::parse($this->created_at)->translatedFormat('d M Y'),
        ];
    }
}
