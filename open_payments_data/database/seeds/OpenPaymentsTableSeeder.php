<?php

use Illuminate\Database\Seeder;

class OpenPaymentsTableSeeder extends Seeder
{

    const SERVICE_URL = 'https://openpaymentsdata.cms.gov/resource/v3nw-usd7.json?';
    const LIMIT_COUNT = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $offsetCount = 0;

        // Fetch total count of entries in data set
        $decoded = $this->APIRequest(self::SERVICE_URL . '$select=count(*)');

        if (isset($decoded[0])) {
        	$countOfEntries = $decoded[0]->count;
        } else {
        	throw new Exception("Request did not return what we were looking for");
        }

        for ($i=0; $i < $countOfEntries; $i+= self::LIMIT_COUNT) { 
        	$this->fetchDataFromAPIAndInsert($offsetCount, self::SERVICE_URL . '$limit=' . self::LIMIT_COUNT . '&$offset=' . $offsetCount);
        }

    }

    private function fetchDataFromAPIAndInsert(&$offsetCount, $request) 
    {
    	$decoded = $this->APIRequest($request);
        $this->insertToOpenPaymentsTable($decoded);
        $offsetCount += self::LIMIT_COUNT;
    }

    private function APIRequest($request) 
    {
        $service_url = $request;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additional info: ' . var_export($info));
        }
        curl_close($curl);
        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }
        echo 'Response Ok!';

        return $decoded;
    }

    private function insertToOpenPaymentsTable($openPayments)
	{
		foreach ($openPayments as $openPayment) {
			$record =  (array) $openPayment; //Convert object to associative array

			// Name needed to be changed because it was too long, which requires an unset
			// to then set under the other name
			if (isset($record['name_of_third_party_entity_receiving_payment_or_transfer_of_value'])) {
				$temp = $record['name_of_third_party_entity_receiving_payment_or_transfer_of_value'];
				unset($record['name_of_third_party_entity_receiving_payment_or_transfer_of_value']);
				$record['name_of_third_party_receiving_payment_or_transfer_of_value'] = $temp;
			}

			if (!DB::table('open_payments')->insert($record)) {
				echo "Failure";
			}

		}
	}
}
