		Login
	===============================

	#Post email and password along with access_token to authenticate user.
	```
		$url = 'http://miparo/webkit/auth/user/login';
		$data = ['password' => '123456', 'email' => 'abcd@gmail.com', 'access_token' => 		'8Htvm2HW0sPCpA3x2eEkcY7V5RevkuJe'];
		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($handle);
		curl_close($handle);
		echo $response;
	 ```
