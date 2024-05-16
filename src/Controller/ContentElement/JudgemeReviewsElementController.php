<?php
namespace Lukasbableck\ContaoJudgemeBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\PageModel;
use Contao\Template;
use Lukasbableck\ContaoJudgemeBundle\Classes\Judgeme;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'judgeme')]
class JudgemeReviewsElementController extends AbstractContentElementController {
	protected function getResponse(Template $template, ContentModel $model, Request $request): Response {
		$pageModel = $this->getPageModel();
		$rootPageModel = PageModel::findByPk($pageModel->rootId);

		if(!$rootPageModel->judgemeShopdomain || !$rootPageModel->judgemePrivateKey) {
			return new Response();
		}

		$template->reviews = Judgeme::getJudgemeReviews($model->judgemeId, $rootPageModel);
		$template->averageRating = $template->reviews ? array_sum(array_column($template->reviews, 'rating')) / \count($template->reviews) : 0;
		$template->totalReviews = $template->reviews ? \count($template->reviews) : 0;

		return $template->getResponse();
	}
}
