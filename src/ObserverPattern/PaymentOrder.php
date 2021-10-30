<?php

namespace Bakle\DesignPatterns\ObserverPattern;

use Bakle\DesignPatterns\ObserverPattern\Constants\Statuses;
use Bakle\DesignPatterns\ObserverPattern\Contracts\Subject;

class PaymentOrder extends Subject
{
    public function __construct()
    {
        $this->changeStatus(Statuses::CREATED);
    }

    public function notifyObservers()
    {
        if ($this->statusHasChanged()) {
            foreach($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }
}