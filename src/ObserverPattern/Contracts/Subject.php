<?php

namespace Bakle\DesignPatterns\ObserverPattern\Contracts;

use Bakle\DesignPatterns\ObserverPattern\Constants\Statuses;

abstract class Subject
{
    protected array $observers = [];

    private string $status = '';

    private bool $statusChanged = false;

    public function registerObserver(Observer $observer): void
    {
        array_push($this->observers, $observer);
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function statusHasChanged(): bool
    {
        return $this->statusChanged;
    }

    public function removeObserver(Observer $observer): void
    {
        $index = array_search($observer, $this->observers);
        if ($index >= 0) {
            unset($this->observers[$index]);
        }
    }

    public function changeStatus(string $status): void
    {
        if(Statuses::isValidStatus($status)) {

            if ($this->status !== $status) {
                $this->statusChanged = true;
            }

            $this->status = $status;
            $this->notifyObservers();

            $this->statusChanged = false;
        }
    }

    abstract public function notifyObservers();

}