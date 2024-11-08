<?php

namespace App\Services\General;

use App\Jobs\ExternalApiJob;
use App\Mail\SendingMessage;
use Nexmo\Laravel\Facade\Nexmo;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\General;
use App\Models\Geocode\Country;

class SendingMessagesService
{
    protected string $username;
    protected string $password;
    protected string $api;
    protected string $defaultSender;

    public function __construct()
    {
        $this->username = config('services.msegat.username');
        $this->password = config('services.msegat.password');
        $this->api = 'https://www.msegat.com/gw/sendsms.php';
        $this->defaultSender = 'Template';
    }

    public function sendToEmail(array $data): void
    {
        Mail::to($data['email'])->send(new General($data));
        // dispatch(new SendMessageJob($data)); // Uncomment if needed
    }

    public function sendToPhone(array $data, string $msg): bool
    {
        return $this->sendSms($data['phone_no'], $msg, $this->defaultSender);
    }

    public function reminderSms(string $phoneNumber, int $countryId, $data): bool
    {
        $number = ltrim(Country::whereId($countryId)->value('phone_code'), '+') . $phoneNumber;
        $message = "مرحبا ، موعدك مع {$data->start_time} بتلبينة اليوم {$data->user->full_name}. كن بالوقت.";
        return $this->sendSms($number, $message, 'Talbinah');
    }

    public function sendResetSms(string $phoneNumber, int $countryId, string $code): bool
    {
        $number = ltrim(Country::whereId($countryId)->value('phone_code'), '+') . $phoneNumber;
        $message = "رمز تغيير كلمة المرور: $code";
        return $this->sendSms($number, $message, 'Talbinah');
    }

    public function sendMessage(array $data, string $msg = null): bool
    {
        if (isset($data['email']))  $this->sendToEmail($data);
        if (isset($data['phone_no']) && $msg)  return $this->sendToPhone($data, $msg);
        return true;
    }
    public function sendingMessage(array $data, string $msg = null)
    {
        $resultSending = $this->sendMessage($data, $msg);
        if (!$resultSending)  return serverError(0);
        return $resultSending;
    }

    protected function sendSms(string $phoneNumber, string $message, string $sender): bool
    {
        $response = Http::post($this->api, [
            'userName' => $this->username,
            'apiKey' => $this->password,
            'numbers' => $phoneNumber,
            'userSender' => $sender,
            'msg' => $message,
        ]);
        return $response->ok();
    }

    // This method is currently empty, consider implementing or removing it.
    public function sendToPhoneWattsapp(string $phone_no, string $message)
    {
        // Implementation for WhatsApp message sending can go here
    }
}
