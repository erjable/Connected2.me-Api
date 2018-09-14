<?php
class connected2 {
	
	private function connectServer($dataParameters){
		$dataChannel = curl_init();
		$dataOptions = array(CURLOPT_URL => $dataParameters['url'], CURLOPT_HEADER => FALSE, CURLOPT_FOLLOWLOCATION => FALSE, CURLOPT_RETURNTRANSFER => TRUE, CURLOPT_SSL_VERIFYHOST => FALSE, CURLOPT_SSL_VERIFYPEER => FALSE);
		if(is_array($dataParameters['options'])){
			foreach($dataParameters['options'] as $option => $value){
				$options[$option] = $value;
			}
		}
		curl_setopt_array($dataChannel, $dataOptions);
		$dataResponse = curl_exec($dataChannel);
		$dataHttpCode = curl_getinfo($dataChannel, CURLINFO_HTTP_CODE);
		curl_close($dataChannel);
		return $dataResponse;
	}
	
	private function getApiUrl(){
		$dataApiUrl = 'http://api.c2me.cc/b/';
		return $dataApiUrl;
	}
	
	private function getUserAgent(){
		$dataUserAgent = 'Connected2/1.105.1 (iPhone; iOS 11.2; Scale/2.00)';
		return $dataUserAgent;
	}
	
	private function getFakeIP(){
		$dataFakeIP = rand(40,200);
		$dataRandom = $dataFakeIP ."." . rand(0, 255) . "." . rand(0, 255) . "." . rand(0, 255) . "";
		return $dataRandom;
	}
	
	private function getGuid(){
		$dataGuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',mt_rand(0,65535),mt_rand(0,65535),mt_rand(0,65535),mt_rand(16384,20479),mt_rand(32768,49151),mt_rand(0,65535),mt_rand(0,65535),mt_rand(0,65535));
		return $dataGuid;
	}
	
	private function getProxy(){
		$dataProxy = '78.189.10.14:80';
		return $dataProxy;
	}
	
	private function getHeader(){
		$dataHeader = ['Accept: */*','Accept-Encoding: gzip, deflate','Content-Type: application/x-www-form-urlencoded; charset=UTF-8','User-Agent: '.$this->getUserAgent(),'X_FORWARDED_FOR: '.$this->getFakeIP(),'REMOTE_ADDR: '.$this->getFakeIP(),'HTTP_CLIENT_IP:'.$this->getFakeIP(),'HTTP_FORWARDED:'.$this->getFakeIP(),'HTTP_PRAGMA:'.$this->getFakeIP(),'HTTP_XONNECTION:'.$this->getFakeIP(),'HTTP_CACHE_INFO:'.$this->getFakeIP(),'HTTP_XPROXY:'.$this->getFakeIP(),'HTTP_PROXY_CONNECTION:'.$this->getFakeIP(),'HTTP_VIA:'.$this->getFakeIP(),'HTTP_X_COMING_FROM:'.$this->getFakeIP(),'HTTP_COMING_FROM:'.$this->getFakeIP(),'HTTP_X_FORWARDED_FOR:'.$this->getFakeIP(),'HTTP_X_FORWARDED:'.$this->getFakeIP(),'HTTP_CACHE_CONTROL:'.$this->getFakeIP(),'HTTP_CLIENT_IP:'.$this->getFakeIP(),'HTTP_FORWARDED:'.$this->getFakeIP(),'HTTP_PRAGMA:'.$this->getFakeIP(),'HTTP_XONNECTION:'.$this->getFakeIP(),'HTTP_CACHE_INFO:'.$this->getFakeIP(),'HTTP_XPROXY:'.$this->getFakeIP(),'HTTP_PROXY_CONNECTION:'.$this->getFakeIP(),'HTTP_VIA:'.$this->getFakeIP(),'HTTP_X_COMING_FROM:'.$this->getFakeIP(),'HTTP_COMING_FROM:'.$this->getFakeIP(),'HTTP_X_FORWARDED_FOR:'.$this->getFakeIP(),'HTTP_X_FORWARDED:'.$this->getFakeIP(),'ZHTTP_CACHE_CONTROL:'.$this->getFakeIP(),'REMOTE_ADDR: '.$this->getFakeIP(),'REMOTE_ADDR:'.$this->getFakeIP(),'X-Client-IP:'.$this->getFakeIP(),'Client-IP: '.$this->getFakeIP(),'HTTP_X_FORWARDED_FOR: '.$this->getFakeIP(),'X-Forwarded-For: '.$this->getFakeIP(),'x-HTTP_PRAGMA:'.$this->getFakeIP(),'x-HTTP_XONNECTION:'.$this->getFakeIP(),'x-HTTP_CACHE_INFO:'.$this->getFakeIP(),'x-HTTP_XPROXY:'.$this->getFakeIP(),'x-HTTP_PROXY_CONNECTION:'.$this->getFakeIP(),'x-HTTP_VIA:'.$this->getFakeIP(),'x-HTTP_X_COMING_FROM:'.$this->getFakeIP(),'x-HTTP_COMING_FROM:'.$this->getFakeIP(),'x-HTTP_X_FORWARDED_FOR:'.$this->getFakeIP(),'x-HTTP_X_FORWARDED:'.$this->getFakeIP(),'x-HTTP_CACHE_CONTROL:'.$this->getFakeIP(),'x-HTTP_CLIENT_IP:'.$this->getFakeIP(),'x-HTTP_FORWARDED:'.$this->getFakeIP(),'x-HTTP_PRAGMA:'.$this->getFakeIP(),'x-HTTP_XONNECTION:'.$this->getFakeIP(),'x-HTTP_CACHE_INFO:'.$this->getFakeIP(),'x-HTTP_XPROXY:'.$this->getFakeIP(),'x-HTTP_PROXY_CONNECTION:'.$this->getFakeIP(),'x-HTTP_VIA:'.$this->getFakeIP(),'x-HTTP_X_COMING_FROM:'.$this->getFakeIP(),'x-HTTP_COMING_FROM'.$this->getFakeIP(),'x-HTTP_X_FORWARDED_FOR'.$this->getFakeIP(),'x-HTTP_X_FORWARDED:'.$this->getFakeIP(),'x-ZHTTP_CACHE_CONTROL:'.$this->getFakeIP(),'x-REMOTE_ADDR: '.$this->getFakeIP(),'x-REMOTE_ADDR'.$this->getFakeIP(),'X-Client-IP:'.$this->getFakeIP(),'x-Client-IP: '.$this->getFakeIP(),'x-HTTP_X_FORWARDED_FOR: '.$this->getFakeIP(),'X-Forwarded-For: '.$this->getFakeIP()];
		return $dataHeader;
	}
	
	private function getOptions(){
		$dataOptions = [CURLOPT_HEADER => TRUE, CURLOPT_HTTPHEADER => $this->getHeader(), CURLOPT_PROXY => $this->getProxy()];
		return $dataOptions;
	}
	
	private function getUpdateOptions(){
		$dataUpdateOptions = [CURLOPT_ENCODING => "gzip,deflate", CURLOPT_HTTPHEADER => ['Accept: */*','Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3','Accept-Encoding: gzip, deflate','Referer: https://connected2.me','Content-Type: application/x-www-form-urlencoded','Origin: https://connected2.me','User-Agent: '.$this->getUserAgent(),'Connection: keep-alive','Pragma: no-cache','Cache-Control: no-cache']];
		return $dataUpdateOptions;
	}
	
	private function encodeURIComponent($dataStr){
		$dataRevert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		$dataStrtr  = strtr(rawurlencode($dataStr), $dataRevert);
		return $dataStrtr;
	}

	public function doFollow($isUsername,$isPassword,$isFollow){
		$dataParameters = ['url' => $this->getApiUrl().'follow?nick='.$isUsername.'&password='.$isPassword.'&follow_nick='.$isFollow, 'options' => $this->getOptions()];
		$followJob      = $this->connectServer($dataParameters);
		echo $followJob;
	}
	
	public function doOnline($isUsername,$isPassword){
		$dataParameters      = ['url' => $this->getApiUrl().'mobile_info?device_id='.$this->getGuid().'&nick='.$isUsername.'&password='.$isPassword, 'options' => $this->getOptions()];
		$deviceJob           = $this->connectServer($dataParameters);
		$dataParameters      = ['url' => $this->getApiUrl().'switch_status?nick='.$isUsername.'&password='.$isPassword, 'options' => $this->getOptions()];
		$switchJob           = $this->connectServer($dataParameters);
		$onlineJob           = array($deviceJob,$switchJob);
		echo $onlineJob[0];
	}
	
	public function doUpdate($isUsername,$isPassword,$isBiography){
		$encodeBiography = $this->encodeURIComponent($isBiography);
		$dataParameters  = ['url' => $this->getApiUrl().'set_bio?nick='.$isUsername.'&password='.$isPassword.'&bio='.$encodeBiography, 'options' => $this->getUpdateOptions()];
		$updateJob       = $this->connectServer($dataParameters);
		echo $updateJob;
	}
	
	public function doSearch($isQuery){
		$dataParameters = ['url' => $this->getApiUrl().'search?s='.$isQuery.'', 'options' => $this->getOptions()];
		$searchJob      = $this->connectServer($dataParameters);
		echo $searchJob;
	}
	
	public function doPlusSearch($isUsername,$isPassword,$isGender,$isAgeStart,$isOnline){
		$dataParameters = ['url' => $this->getApiUrl().'shuffle_filter?nick='.$isUsername.'&password='.$isPassword.'&gender_filter='.$isGender.'&age_start='.$isAgeStart.'&order_by_last_online='.$isOnline, 'options' => $this->getOptions()];
		$plusSearchJob  = $this->connectServer($dataParameters);
		echo $plusSearchJob;
	}
	
}


$c2 = new connected2;


// Follow update
// Example using
//$c2->doFollow('your_username','your_password','follow_nick');
//$c2->doFollow('erjanulujan','123','johndoe');

// Status update
// Example using
//$c2->doOnline('your_username','your_password');
//$c2->doOnline('erjanulujan','123');

// Biography update 
// Example using
// $c2->doUpdate('your_username','your_password','your_new_biography');
// $c2->doUpdate('erjanulujan','123','Yeni biyografi yazım!');

// Search
// Example using
// $c2->doSearch('search_query');
// $c2->doSearch('erjanulujan');

// Plus search
// Example using
// $c2->doPlusSearch('your_username','your_password','gender_filter','age_start','online_status');
// $c2->doPlusSearch('erjanulujan','123','f','18','1');