<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\PayMode;
use App\Models\Price;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Payment extends Component
{
    public $payModes;
    public $user;
    public $movie;
    public $calendar;
    public $schedule;
    public $theater;
    public $totalPrice;
    public $amount;
    public $payModeId;
    public $selectedSeat;
    public $tab;
    protected $listeners = ['openPaymentForm' => 'openPaymentForm'];
    public function mount($movie, $calendar)
    {
        $this->tab = "direct";
        $this->payModeId = PayMode::all()->count();
        $this->payModes = PayMode::all();
        $this->user = Auth::user();
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        $this->totalPrice = session("sessionTotalPriceTickets") + session("sessionTotalPriceCombos");
        $this->amount = session('sessionAmount');
    }
    public function openPaymentForm($selectedSeat)
    {
        $this->selectedSeat = $selectedSeat;
        $this->dispatchBrowserEvent('open-payment-form');
    }
    public function book()
    {
        if($this->payModeId!=1){
            $this->callMomo();
        }
        $tickets = Ticket::create(['total_price' => $this->totalPrice, "user_id" => $this->user->id, "calendar_id" => $this->calendar->id, "paymode_id" => $this->payModeId]);
        foreach ($this->amount as $k => $v) {
            if ($v != 0) {
                $price = Price::find($k);
                if (Price::checkIsTicketType($k)) {
                    $seat = array_shift($this->selectedSeat);
                    $tickets->prices()->attach($k, ['name' => $price->name, 'amount' => $v, 'seat' => "$seat"]);
                } else {
                    $tickets->prices()->attach($k, ['name' => $price->name, 'amount' => $v, 'seat' => ""]);
                }
            }
        }
        $this->emit('openInformModal', "Book tickets", "success");
    }

    public function selectPayMode($payModeId)
    {
        $this->payModeId = $payModeId;
    }
    public function render()
    {
        return view('livewire.frontend.modal.payment');
    }

    public function callMomo(){
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
}
