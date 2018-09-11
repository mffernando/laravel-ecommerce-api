<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
          'name' => $this->name,
          'description' => $this->detail,
          'price' => $this->price,
          'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
          'discount' => $this->discount,
          //price with discount
          //example:
          //17/100 = .17 ($this->discount/100)
          //1 - .17 = .83 ((1 - ($this->discount/100))
          //.83 * 404 = 335,32 ((1 - ($this->discount/100)) * $this->price, 2)
          'totalPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
          //star sum rating divided by number of reviews
          //round a number to the nearest integer
          //remove / 0
          'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/
                      $this->reviews->count(), 1) : 'No rating yet',
          //get reviews by id
          'href' => [
            'reviews' => route('reviews.index', $this->id),
          ]
        ];
    }
}
