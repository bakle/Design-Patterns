<?php

namespace Bakle\DesignPatterns\Test;

use Bakle\DesignPatterns\ObserverPattern\Channels\EmailChannel;
use Bakle\DesignPatterns\ObserverPattern\Channels\PhoneCallChannel;
use Bakle\DesignPatterns\ObserverPattern\Channels\SMSChannel;
use Bakle\DesignPatterns\ObserverPattern\Constants\Statuses;
use Bakle\DesignPatterns\ObserverPattern\PaymentOrder;
use PHPUnit\Framework\TestCase;

class ObserverPatternTest extends TestCase
{

    private string $filename = 'observer_pattern.txt';

    protected function setUp(): void
    {
        parent::setUp();
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function testObserverPattern(): void
    {
        $paymentOrder = new PaymentOrder();
        $paymentOrder->registerObserver(new SMSChannel());
        $paymentOrder->registerObserver(new EmailChannel());
        $paymentOrder->registerObserver(new PhoneCallChannel());

        $paymentOrder->changeStatus(Statuses::PAID);

        $expectedSMSMessage = sprintf("Send SMS with payment order status: %s\n", Statuses::PAID);
        $expectedEmailMessage = sprintf("Send Email with payment order status: %s\n", Statuses::PAID);
        $expectedPhoneCallMessage = sprintf("Make phone call with payment order status: %s\n", Statuses::PAID);

        $file = fopen($this->filename, 'r');
        $this->assertEquals(
            $expectedSMSMessage . $expectedEmailMessage . $expectedPhoneCallMessage,
            fread($file, filesize($this->filename))
        );
    }
}