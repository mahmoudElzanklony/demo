<?php

namespace App\Http\Patterns\ChainOfReponsablities;

use App\Services\Messages;

class CheckQuantityHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
       dd($this->next,parent::getNext());
       $err = 0;
       foreach ($data['data'] as $item) {
           if($item['quantity'] == 0){
               abort(Messages::error('quantity is empty'));
           }
       }
       dump('Check quantity handler');
       parent::handle($data);
    }


}
