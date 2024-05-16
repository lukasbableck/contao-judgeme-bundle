<?php
namespace Lukasbableck\ContaoJudgemeBundle\Classes;

use Contao\CoreBundle\Monolog\ContaoContext;
use Contao\System;
use Psr\Log\LogLevel;

class Judgeme {
	public const API_URL = 'https://judge.me/api/v1';

	public static function getJudgemeReviews($id, $rootPage) {
		$shopdomain = $rootPage->judgemeShopdomain;
		$token = $rootPage->judgemePrivateKey;
		$url = self::API_URL.'/reviews?shop_domain='.$shopdomain.'&api_token='.$token;

		$reviews = [];
		$page = 1;
		$perPage = 100;
		$response = self::request($url.'&page='.$page.'&per_page='.$perPage);
		if (!empty($response->error)) {
			System::getContainer()->get('monolog.logger.contao')->log(LogLevel::INFO, 'Could not get Judge.me reviews: '.$response->error, ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);

			return [];
		}
		while (\count($response->reviews) > 0) {
			$reviews = array_merge($reviews, $response->reviews);
			++$page;
			$response = self::request($url.'&page='.$page.'&per_page='.$perPage);
		}

		return array_filter($reviews, function ($review) use ($id) {
			return $review->product_external_id == $id;
		});
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
