<?php

namespace App\Http\Resources;

use App\Models\DefaultMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class DefaultMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $parent_name = DefaultMessage::find($this->parent_id) ?? ' - ';
        $parent_id = $this->parent_id ?? ' - ';
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'body' => $this->body,
            'parent_name' => $parent_name,
            'parent_id' => $parent_id,
            'user_id' => Auth::id() ?? '',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
