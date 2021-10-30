<?php

namespace Bakle\DesignPatterns\ObserverPattern\Contracts;

interface Observer
{

    public function update(Subject $subject);

}