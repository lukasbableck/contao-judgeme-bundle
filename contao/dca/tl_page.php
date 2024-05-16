<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_page']['fields']['judgemePrivateKey'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['judgemePublicKey'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['judgemeShopdomain'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];

PaletteManipulator::create()
	->addLegend('judgeme_legend', 'chmod_legend', PaletteManipulator::POSITION_AFTER)
	->addField('judgemePrivateKey', 'judgeme_legend', PaletteManipulator::POSITION_APPEND)
	->addField('judgemePublicKey', 'judgeme_legend', PaletteManipulator::POSITION_APPEND)
	->addField('judgemeShopdomain', 'judgeme_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('root', 'tl_page')
	->applyToPalette('rootfallback', 'tl_page')
;
