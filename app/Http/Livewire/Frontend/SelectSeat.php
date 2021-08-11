<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SelectSeat extends Component
{
    public $user;
    public $movie;
    public $calendar;
    public $schedule;
    public $theater;
    public $seats;
    public $stringSeat = "ABCDEFGHIJ";
    public $totalTicket;
    public $selectedSeat;
    public $isFullSelected;
    public function mount($movie, $calendar)
    {
        $this->selectedSeat = [];
        $this->isFullSelected = false;
        $this->user = Auth::user();
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        $this->totalTicket = session('sessionTickets');
        $this->seats = array_fill(1, 40, 0);
    }

    public function selectSeat($slot)
    {
        if (!in_array($slot, $this->selectedSeat)) {
            $this->selectedSeat[] = $slot;
        } else {
            $this->selectedSeat = array_diff($this->selectedSeat, array($slot));
        }

        if ($this->totalTicket == count($this->selectedSeat)) {
            $this->isFullSelected = true;
        } else {
            $this->isFullSelected = false;
        }
    }

    public function openPaymentForm()
    {
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $returnUrl = route('momo');
        $notifyurl = "http://localhost:8000/php/PayMoMo/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $extraData = "merchantName=Baka Movie";
        $orderInfo = "";
        $requestId = time() . "";
        $requestType = "captureMoMoWallet";
        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;

        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there

        return redirect($jsonResult['payUrl']);

    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function render()
    {
        return view('livewire.frontend.select-seat');
    }
}
