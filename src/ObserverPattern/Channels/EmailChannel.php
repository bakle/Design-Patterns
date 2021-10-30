<?php

namespace Bakle\DesignPatterns\ObserverPattern\Channels;

use Bakle\DesignPatterns\ObserverPattern\Contracts\Subject;
use Bakle\DesignPatterns\ObserverPattern\Contracts\Observer;

class EmailChannel implements Observer
{
    public function update(Subject $subject): void
    {
        $this->sendNotification($subject->getStatus());
    }

    private function sendNotification(string $status): void
    {
        $file = fopen('observer_pattern.txt', "a");
        fwrite($file, sprintf("Send Email with payment order status: %s\n", $status));
        fclose($file);
    }
}