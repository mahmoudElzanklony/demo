<?php

namespace App\Http\Patterns\ChainOfReponsablities;

class OrderReponsablitiesManager
{
    public $next = null;
    public function setNext($next)
    {
        $this->next = $next;
    }
    public function getNext(){
        return $this->next;
    }
    public function handle($data)
    {
        if($this->next){
            $this->next->handle($data);
        }
    }


}
