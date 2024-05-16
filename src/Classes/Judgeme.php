<?php
namespace Lukasbableck\ContaoJudgemeBundle\Classes;

class Judgeme {
	public const API_URL = 'https://judge.me/api/v1';

	public static function getJudgemeReviews($id, $rootPage) {
		$shopdomain = $rootPage->judgemeShopdomain;
		$token = $rootPage->judgemePrivateKey;
		$url = self::API_URL.'/reviews?shop_domain='.$shopdomain.'&api_token='.$token.'&product_id='.$id;

		$reviews = [];
		$page = 1;
		$perPage = 100;
		$response = self::request($url.'&page='.$page.'&per_page='.$perPage);
		while (\count($response->reviews) > 0) {
			$reviews = array_merge($reviews, $response->reviews);
			++$page;
			$response = self::request($url.'&page='.$page.'&per_page='.$perPage);
		}

		return $reviews;
	}

	private static function request($url, $method = 'GET', $data = null) {
		$curl = curl_init();
		curl_setopt_array($curl, [
			\CURLOPT_URL => $url,
			\CURLOPT_RETURNTRANSFER => true,
			\CURLOPT_FOLLOWLOCATION => true,
			\CURLOPT_CUSTOMREQUEST => $method,
			\CURLOPT_POSTFIELDS => $data,
		]);
		$response = curl_exec($curl);
		curl_close($curl);

		return json_decode($response);
	}
}
