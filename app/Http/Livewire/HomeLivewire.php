<?php

    namespace App\Http\Livewire;

    use Auth;
    use Livewire\Component;

    class HomeLivewire extends Component {

        /**
         * Get the view / contents that represent the component.
         *
         * @return \Illuminate\View\View|string
         */
        public $packageStatus = "";

        public function mount()
        {
            $this->loadPackages();
        }

        public function loadPackages()
        {
            $talentPackage
                = \App\Models\TalentPackage::where('talent_id', Auth::user()->talent['id'])->where('package_active', 1)->first();
            if(isset($talentPackage)) {
                if($talentPackage->package_status == 0) {
                    $talentPackage = $this->checkPaidStatus($talentPackage);
                }
            }
            $this->packageStatus = $talentPackage;
        }

        public function checkPaidStatus($package)
        {

            $username = env('PAYPRO_MERCHANT_ID');
            $password = env('PAYPRO_MERCHANT_PASSWORD');
            $payproId = $package->connect_pay_id;
            $curl     = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL            => 'https://demoapi.paypro.com.pk/cpay/gos?userName=' . $username . '&password=' . $password . '&cpayId=' . $payproId,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'GET',
            ));

            $response = curl_exec($curl);
            $response = json_decode($response);
            curl_close($curl);
            if($response[0]->Status == 00) {
                if($response[1]->OrderStatus == "PAID") {
                    $talentPackage                 = \App\Models\TalentPackage::find($package->id);
                    $talentPackage->paid_status = "PAID";
                    $talentPackage->save();
//                    TODO Add Date of Paid Status

                    $package->paid_status = "PAID";
                }
            }

            return $package;
        }

        public function render()
        {
            return view('livewire.home-livewire');
        }
    }
