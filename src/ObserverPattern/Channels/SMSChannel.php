<?php

namespace Bakle\DesignPatterns\ObserverPattern\Channels;

use Bakle\DesignPatterns\ObserverPattern\Contracts\Observer;
use Bakle\DesignPatterns\ObserverPattern\Contracts\Subject;

class SMSChannel implements Observer
{
    public function update(Subject $subject)
    {
        $this->sendNotification($subject->getStatus());
    }

    private function sendNotification(string $status)
    {
        $file = fopen('observer_pattern.txt', "a");
        fwrite($file, sprintf("Send SMS with payment order status: %s\n", $status));
        fclose($file);
    }
}