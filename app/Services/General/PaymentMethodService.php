<?php

namespace App\Services\General;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Wallet\Entities\Traits\User\WalletMethods;
use Modules\Movement\Traits\MovementTrait;
use Modules\Payment\Entities\Traits\GeneralPaymentTrait;
use Modules\Wallet\Traits\User\WalletTrait;

class PaymentMethodService{
    use GeneralPaymentTrait,MovementTrait,WalletMethods,WalletTrait;
    protected string $moyasarBaseUrl = 'https://api.moyasar.com/v1';
    protected string $tapBaseUrl = 'https://api.tap.company/v2';
    protected string $moyasarAuthKey;
    protected string $tapAuthSecret;

    public function __construct()
    {
        $this->moyasarAuthKey = config("services.moyasar.key_live");
        $this->tapAuthSecret = config('services.tap.secret');
    }

    public function getDataPayment(string $id): array
    {
        $response = Http::baseUrl($this->moyasarBaseUrl)
            ->withBasicAuth($this->moyasarAuthKey, '')
            ->get("payments/{$id}")
            ->json();
        return $response;
    }

    public function getCapturePayment(string $id, string $token): array
    {
        $response = Http::baseUrl($this->moyasarBaseUrl)
            ->withHeaders([
                'Authorization' => "Basic {$token}",
            ])
            ->post("payments/{$id}/capture")
            ->json();
        return $response;
    }

    public function getStatusTap(string $tapId): \Illuminate\Http\JsonResponse
    {
        $url = "{$this->tapBaseUrl}/charges/{$tapId}";
        $headers = [
            "Authorization: Basic {$this->tapAuthSecret}",
            'Accept: application/json',
        ];
        $data = $this->curl($url, 'GET', $headers);
        $status = json_decode($data)->status;
        return response()->json(['status' => $status === 'CAPTURED']);
    }

    public function dataPaymentCallback(): object
    {
        $headers = [
            "Content-Type: application/json",
            "Authorization: Basic {$this->tapAuthSecret}",
        ];
        $url = "{$this->tapBaseUrl}/charges/" . $this->getTapId();
        $output = $this->curl($url, 'GET', $headers);
        $response = json_decode($output);
        if ($response && isset($response->errors)) {
            return $response->errors;
        }
        return $response;
    }

    public function callback(): \Illuminate\Http\JsonResponse //type=1 : reservation , type=2 : wallet
    {
        $response = $this->dataPaymentCallback();
        if (isset($response->errors)) return response()->json($response->errors);
        if ($response->status === 'CAPTURED') {
            // Handle successful payment
            $capture = $this->getCapturePayment($response->id, $this->getTokenPayment());
            // Add additional logic for handling payment capture, such as notifications and movements
            // $this->handlePaymentCapture($response);
        } else  return response()->json(['status' => $response->status]);
    }

    public function callbackWallet(): \Illuminate\Http\JsonResponse
    {
        $response = $this->dataPaymentCallback();
        if (isset($response->errors))  return response()->json($response->errors);
        if ($response->status === 'CAPTURED') {
            // Handle wallet callback
            // $this->handleWalletCapture($response);
            $capture = $this->getCapturePayment($response->id, $this->getTokenPayment());
        } else {
            return response()->json(['status' => $response->status]);
        }
    }

    protected function getTokenPayment(): string
    {
        // Logic to retrieve payment token
    }

    protected function getTapId(): string
    {
        // Logic to retrieve Tap ID
    }

    protected function curl(string $url, string $method, array $headers, $postdata = null, int $timeout = 60): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        if ($method === 'POST' && $postdata) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}


