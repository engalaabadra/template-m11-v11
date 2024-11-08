<?php
namespace Modules\Payment\Services\PaymentGateways\Tap;

class TapService{
    
    protected function client(){
        if(!$this->client()){
            $client = new TapHttpClient(
                    new SandboxEnvironment(
                        $this->paymentMethod->options['client_id'],
                        $this->paymentMethod->options['client_secert'],
                        
                    )
                );   
        }
        return $this->client;
        
    }
     /////////////////CREATE PAYMENT///////////////////
     protected function setDataPayment($order,$user){
        $data['amount']= $order->price;
        $data['currency']= systemCurrency();
        $data['customer']['first_name']= $user ? $user->full_name : null;
        $email = $user ? $user->email : null;
        if(!$email) $email = $user ? $user->full_name.' '.'#'.$order->id.'@template.net' : null;
        $data['customer']['email']= $email;
        $data['customer']['phone']['number']= $user ? $user->phone_no : null;
        $data['source']['id']= "src_all";
        return $data;
    }
    //for tap payment gateway
    protected function setCurl(){
        $headers= [
            "Content-Type:application/json",
            config('services.tap.secret_test'), 
        ];
        $ch=curl_init();
        $url="https://api.tap.company/v2/charges";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        curl_close($ch);
        $response=json_decode($output);
        return $response;
    }

    
    ///////////////////VERIFY PAYMENT (CALLBACK)///////////////////
    
    protected function checkDataPaymentCallback(): object
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
  //ANOTHER METH
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
    public function curl($url, $method = 'get', $header = null, $postdata = null, $timeout = 60)
	{
        $s = curl_init();
        // initialize curl handler 
        curl_setopt($s,CURLOPT_URL, $url);
        //set option  URL of the location 
        if ($header) 
            curl_setopt($s,CURLOPT_HTTPHEADER, $header);
            //set headers if presents
        	curl_setopt($s,CURLOPT_TIMEOUT, $timeout);
            //time out of the curl handler  		
            curl_setopt($s,CURLOPT_CONNECTTIMEOUT, $timeout);
            //time out of the curl socket connection closing 
            curl_setopt($s,CURLOPT_MAXREDIRS, 3);
            //set maximum URL redirections to 3 
            curl_setopt($s,CURLOPT_RETURNTRANSFER, true);
            // set option curl to return as string ,don't output directly
            curl_setopt($s,CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($s,CURLOPT_COOKIEJAR, 'cookie.txt');
            curl_setopt($s,CURLOPT_COOKIEFILE, 'cookie.txt'); 
            //set a cookie text file, make sure it is writable chmod 777 permission to cookie.txt
        if(strtolower($method) == 'post')
        {
            curl_setopt($s,CURLOPT_POST, true);
            //set curl option to post method
            curl_setopt($s,CURLOPT_POSTFIELDS, $postdata);
            //if post data present send them.
        }
        else if(strtolower($method) == 'delete')
        {
            curl_setopt($s,CURLOPT_CUSTOMREQUEST, 'DELETE');
            //file transfer time delete
        }
        else if(strtolower($method) == 'put')
        {
            curl_setopt($s,CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($s,CURLOPT_POSTFIELDS, $postdata);
            //file transfer to post ,put method and set data
        }
            curl_setopt($s,CURLOPT_HEADER, 0);			 
            // curl send header 
            curl_setopt($s,CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1');
            //proxy as Mozilla browser 
            curl_setopt($s, CURLOPT_SSL_VERIFYPEER, false);
            // don't need to SSL verify ,if present it need openSSL PHP extension
            $html = curl_exec($s);
            //run handler
            $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
            // get the response status
            curl_close($s);
            //close handler
            return $html;
            //return output
    }

    //moyasar
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
}