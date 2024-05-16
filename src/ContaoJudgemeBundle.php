<?php
namespace Lukasbableck\ContaoJudgemeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoJudgemeBundle extends Bundle {
	public function getPath(): string {
		return \dirname(__DIR__);
	}
}
