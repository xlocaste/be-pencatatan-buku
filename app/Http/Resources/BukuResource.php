<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'nama' => $this -> nama,
            'kategori_id' => $this -> kategori_id,
            'author' => $this -> author,
            'tanggal_rilis' => $this -> tanggal_rilis,
            'publisher' => $this -> publisher,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,

            'kategori' => new KategoriResource($this->whenLoaded('kategori'))
        ];
    }
}
