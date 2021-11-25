<?php 
 
class Tripay{
 
	function all_channel(){
        $apiKey = 'DEV-kpFLzIM2kFaNbraQPzRIO2hqYzrRpFrPy087gug9';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://tripay.co.id/api-sandbox/merchant/payment-channel",
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer ".$apiKey
            ),
            CURLOPT_FAILONERROR       => false
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //echo !empty($err) ? $err : $response;

        $array_response = json_decode($response);

        return $array_response->data;
	}
 
	function detail_channel($code){
        $apiKey = 'DEV-kpFLzIM2kFaNbraQPzRIO2hqYzrRpFrPy087gug9';

        $curl = curl_init();
        
        $payload = [
            'code'	=> $code
        ];  

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://tripay.co.id/api-sandbox/merchant/payment-channel?".http_build_query($payload),
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer ".$apiKey
            ),
            CURLOPT_FAILONERROR       => false
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //echo !empty($err) ? $err : $response;

        $array_response = json_decode($response);

        return $response;
	}
    function create_signature($e_merchant_ref, $e_amount)
    {
        $privateKey = 'BaHlP-ByNEZ-klKNn-bkn45-0jeIL';
        $merchantCode = 'T7694';
        $merchantRef = $e_merchant_ref;
        $amount = $e_amount;

        $signature = hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey);

        // result
        // 9f167eba844d1fcb369404e2bda53702e2f78f7aa12e91da6715414e65b8c86a

    }
    function create_transaksi($ref, $e_method, $nama_penerima, $phone_penerima, $id_produk, $nama_produk, $qty, $harga_produk, $sub_harga)
    {
        $i = 0;
        $order_item = array();
        foreach ($id_produk as $a) {
            $order_item[$i] = [
                'sku'         => $id_produk[$i],
                'name'        => $nama_produk[$i],
                'price'       => $harga_produk[$i],
                'quantity'    => $qty[$i],
            ];
            $i++;
        }

        $apiKey = 'DEV-kpFLzIM2kFaNbraQPzRIO2hqYzrRpFrPy087gug9';
        $privateKey = 'BaHlP-ByNEZ-klKNn-bkn45-0jeIL';
        $merchantCode = 'T7694';
        $merchantRef = $ref;
        $amount = $sub_harga;

        $data = [
            'method'            => $e_method,
            'merchant_ref'      => $merchantRef,
            'amount'            => $amount,
            'customer_name'     => $nama_penerima,
            'customer_email'    => 'admin@gmail.com',
            'customer_phone'    => $phone_penerima,
            'order_items'       => $order_item,
            'expired_time'      => (time()+(24*60*60)), // 24 jam
            'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT     => true,
        CURLOPT_URL               => "https://tripay.co.id/api-sandbox/transaction/create",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HEADER            => false,
        CURLOPT_HTTPHEADER        => array(
            "Authorization: Bearer ".$apiKey
        ),
        CURLOPT_FAILONERROR       => false,
        CURLOPT_POST              => true,
        CURLOPT_POSTFIELDS        => http_build_query($data)
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $array_response = json_decode($response);

        return $array_response;

    }
    function detail_transaksi($reference)
    {
        $apiKey = 'DEV-kpFLzIM2kFaNbraQPzRIO2hqYzrRpFrPy087gug9';

        $payload = [
            'reference'	=> $reference
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT     => true,
        CURLOPT_URL               => "https://tripay.co.id/api-sandbox/transaction/detail?".http_build_query($payload),
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HEADER            => false,
        CURLOPT_HTTPHEADER        => array(
            "Authorization: Bearer ".$apiKey
        ),
        CURLOPT_FAILONERROR       => false,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $array_response = json_decode($response);

        return $array_response;
    }
}