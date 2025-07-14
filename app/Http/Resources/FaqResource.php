<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    public $status;
    public $message;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    /**
     * toArray
     *
     * @param  mixed $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        // Transform the resource into the desired format
        return [
            'intents' => $this->transformResource($this->resource),
        ];
    }

    /**
     * Transform the resource into the desired format
     *
     * @param  mixed $resource
     * @return array
     */
    protected function transformResource($resource): array
    {
        return collect($resource)->map(function ($item) {
            return [
                'tag' => $item['tag'],
                'patterns' => json_decode($item['patterns']), // Decode JSON string to array
                'responses' => json_decode($item['responses']), // Decode JSON string to array
            ];
        })->values()->toArray(); // Return as an array
    }
}
