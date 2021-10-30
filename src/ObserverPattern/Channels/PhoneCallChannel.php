<?php

namespace Bakle\DesignPatterns\ObserverPattern\Channels;

use Bakle\DesignPatterns\ObserverPattern\Contracts\Subject;
use Bakle\DesignPatterns\ObserverPattern\Contracts\Observer;

class PhoneCallChannel implements Observer
{
    public function update(Subject $subject)
    {
        $this->sendNotification($subject->getStatus());
    }

    private function sendNotification(string $status)
    {
        $file = fopen('observer_pattern.txt', "a");
        fwrite($file, sprintf("Make phone call with payment order status: %s\n", $status));
        fclose($file);
    }
}