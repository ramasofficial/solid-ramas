<?php

declare(strict_types=1);

class PurchaseProcessor
{
    public function __construct(private PaymentProvider $provider) {}

    public function process(PaymentRequest $request): void
    {
        $this->provider->execute($request);
    }

    public function setProvider(PaymentProvider $provider): self
    {
        $this->provider = $provider;
        return $this;
    }
}

interface PaymentProvider
{
    public function execute(PaymentRequest $request): void;
}

// DTO object
class PaymentRequest {}

class ApplePayment implements PaymentProvider
{
    public function execute(PaymentRequest $request): void
    {
        echo 'Executing apple payment logic...';
    }
}

class PaypalPayment implements PaymentProvider
{
    public function execute(PaymentRequest $request): void
    {
        echo 'Executing paypal payment logic...';
    }
}

// Get payment request
$paymentRequest = new PaymentRequest;
// Usage
$paymentProcessor = new PurchaseProcessor(new ApplePayment);
$applePurchase = $paymentProcessor->process($paymentRequest);
$paypalPurchase = $paymentProcessor->setProvider(new PaypalPayment)->process($paymentRequest);
