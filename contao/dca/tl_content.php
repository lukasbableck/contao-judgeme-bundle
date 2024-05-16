<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['judgeme_reviews_element'] = '{type_legend},type,headline;{judgeme_legend},judgemeId,judgemeLimit,productPage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['judgemeId'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['judgemeLimit'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50', 'mandatory' => false],
	'sql' => 'int(10) unsigned NULL',
];
$GLOBALS['TL_DCA']['tl_content']['fields']['productPage'] = [
	'exclude' => true,
	'inputType' => 'url',
	'eval' => ['tl_class' => 'w50', 'mandatory' => false],
	'sql' => "varchar(255) NOT NULL default ''",
];
