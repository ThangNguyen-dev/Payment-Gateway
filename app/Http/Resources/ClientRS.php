<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientRS extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'code_bill' => $this->code_bill,
            'number' => $this->number,
            'price' => $this->price,
            'description' => $this->description,
            'created_at' => date('d/m/Y H:i:s',strtotime($this->created_at)),
            'receiver' => new UserRS($this->receiver),
            'sender' => new UserRS($this->send),
        ];
    }
}
