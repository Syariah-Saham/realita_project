<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ListReportResource extends JsonResource
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
            'id'      => $this->id,
            'code'    => $this->stock->code_issuers,
            'name'    => $this->stock->name,
            'periode' => $this->periode->year,
        ];
    }
}
