<?php

    namespace App\Http\Livewire;

    use App\Models\Package;
    use Auth;
    use Carbon\Carbon;
    use Livewire\Component;
    use App\Models\TalentPackage as TalentPackageModel;

    class TalentPackage extends Component {

        /**
         * Get the view / contents that represent the component.
         *
         * @return \Illuminate\View\View|string
         */
        public $modalOpen = false;
        public $packages = [];
        public $currentPackage = "";
        public $confirmModal = false;

        public function mount()
        {
            $this->packages = Package::all();
        }

        public function packageClick(Package $package)
        {
            $this->currentPackage = $package;
            $this->modalOpen      = true;

        }

        public function generateInvoice()
        {

            $curl = curl_init();

            $json = [
                0 => [
                    'MerchantId'       => env('PAYPRO_MERCHANT_ID'),
                    'MerchantPassword' => env('PAYPRO_MERCHANT_PASSWORD'),
                ],
                1 => [
                    'OrderNumber'              => 'Talk-Time' . now()->unix(),
                    'OrderAmount'              => $this->currentPackage->price,
                    'OrderDueDate'             => today()->addDays(3)->format('d/m/Y'),
                    'OrderAmountWithinDueDate' => $this->currentPackage->price,
                    'OrderAmountAfterDueDate'  => $this->currentPackage->price,
                    'OrderTypeId'              => 'Service',
                    'OrderType'                => 'Service',
                    'IssueDate'                => today()->format('d/m/Y'),
                    'TransactionStatus'        => 'UNPAID',
                    'CustomerName'             => urlencode(Auth::user()->name),
                    'CustomerMobile'           => Auth::user()->talent['mobile'],
                    'CustomerEmail'            => Auth::user()->email,
                    'CustomerAddress'          => urlencode('G10 Markaz'),
                    'CustomerBank'             => '',
                ],
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: 0'));

            $finalUrl = json_encode($json);
//            dd($finalUrl);
            curl_setopt_array($curl, array(
                CURLOPT_URL            => 'https://demoapi.paypro.com.pk/cpay/co?oJson=' . $finalUrl . '',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'POST',
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $finalResponse = json_decode($response);
            if($finalResponse[0]->Status == 00) {
                TalentPackageModel::create([
                                               'talent_id'       => Auth::user()->talent['id'],
                                               'package_active'          => 1,
                                               'paid_status'          => "UNPAID",
                                               'order_number'    => $json[1]["OrderNumber"],
                                               'due_date_price'  => $finalResponse[1]->OrderAmount,
                                               'click_to_pay'    => $finalResponse[1]->Click2Pay,
                                               'connect_pay_id'  => $finalResponse[1]->ConnectPayId,
                                               'is_fee_applied'  => $finalResponse[1]->IsFeeApplied,
                                               'connect_pay_fee' => $finalResponse[1]->ConnectPayFee,
                                               'package_id'      => $this->currentPackage->id,
                                               'due_date'        => Carbon::createFromFormat('d/m/Y', $json[1]["OrderDueDate"])->format('Y-m-d'),
                                           ]);
            }
//            dd("Saved Successfully");
$this->modalOpen = false;
$this->confirmModal = true;
        }


        public function render()
        {
            return view('livewire.talent-package');
        }
    }
