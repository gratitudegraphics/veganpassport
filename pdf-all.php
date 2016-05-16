<?php
/**
 * Template Name: All Languages PDF
 */

//wp_head();
//get_header();
require_once("/www/htdocs/w01445db/johannschroeder.com/wp-load.php");

class Passport
{
	private $pdf;

	private $cfg = array(
		'PagePaddingLeft' => 16,
		'PagePaddingTop' => 14,
		'RedRoundedBox' => array('width' => 0.8, 'dash' => 0, 'color' => array(163,34,24)),
		'IconSize' => 36,
		'FontBold' => 'robotocondensedb',
		'FontRegular' => 'robotocondensed',
		'FontItalic' => 'robotocondensedi',
		'Green' => array(34, 156, 76),
		'White' => array(255, 255, 255),
		'Red' => array(163,34,24),
		'LineHeight' => 6.2
	);

	public function __construct()
	{
		require_once('tcpdf/tcpdf.php');

		$this->pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false, false);

		mb_internal_encoding('UTF-8');

		$this->pdf->SetPrintHeader(false);
		$this->pdf->SetPrintFooter(false);

		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetAuthor('Johann Schröder');
		$this->pdf->SetTitle(mb_strtoupper(pll__('Vegan Passport')));
		$this->pdf->SetSubject('Vegan Passport');
		$this->pdf->SetKeywords('Vegan, Passport, PDF');

		$slugs = array();

		global $polylang;
		$languages = $polylang->get_languages_list();
		foreach ($languages as $language) {

			$slug = $language->slug;
			
			if(!in_array($slug,$slugs))
			    {
			     array_push($slugs,$slug);                 
			    }

			$mo = new PLL_MO();
			$mo->import_from_db($language); // import all translations in $language

			//print_r($mo);

			// then you can translated any registered string with:

			$this->cfg['FontBold'] = $mo->translate('LanguageFontBold');
			$this->cfg['FontRegular'] = $mo->translate('LanguageFontRegular');
			$this->cfg['FontItalic'] = $mo->translate('LanguageFontItalic');

			//$string_01 = $mo->translate('I-eat-strict-vegetarian');

			$this->pdf->SetFont($this->cfg['FontBold'], '', 16);
			$this->pdf->AddPage();
			#$this->pdf->setRTL(true);

			$this->pdf->RoundedRect($this->cfg['PagePaddingLeft'], $this->cfg['PagePaddingTop'], 178, 10, 2, '1111', null, $this->cfg['RedRoundedBox'], null);

			$this->pdf->SetXY($this->cfg['PagePaddingLeft'], $this->cfg['PagePaddingTop']);
			$this->pdf->SetFont('icomoon', '', 16);
			$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
			$this->pdf->setFontSpacing(-0.2);
			$this->pdf->Write(10, ' c ', null, null, 'L');
			//$this->pdf->Cell(10, 10, 'c', 0, 0, 'C');
			$this->pdf->SetTextColor(0,0,0);
			$this->pdf->SetFont($this->cfg['FontRegular'], '', 13);
			//$this->pdf->Cell(null, 10, 'PRINT. TURN PAPER. PRINT AGAIN. CUT OUT 4 PASSES AND SHARE WITH YOUR FELLOWS.', 0, 0, 'L');
			$this->pdf->Write(10, mb_strtoupper(pll__('Please-print', 'Please-print')), null, null, 'L');

			$this->FrontPage($this->cfg['PagePaddingLeft'], $this->cfg['PagePaddingTop']+16);
			$this->BackPage($this->cfg['PagePaddingLeft']+90, $this->cfg['PagePaddingTop']+16);
			$this->BackPage($this->cfg['PagePaddingLeft'], $this->cfg['PagePaddingTop']+125+16+2);
			$this->FrontPage($this->cfg['PagePaddingLeft']+90, $this->cfg['PagePaddingTop']+125+16+2);
		}

		

		$this->pdf->Output('veganpassport.pdf', 'I');

	}


	public function FrontPage( $left, $top )
	{

		$this->pdf->Rect($left, $top, 88, 125, 'F', array('all' => array()), $this->cfg['Green']);
		$this->pdf->RoundedRect($left+3, $top+8, 82, 114, 1, '1111', 'F', array(), $this->cfg['White']);

		// TITLE: I EAT STRICT VEGETARIAN
		$this->pdf->SetFont($this->cfg['FontBold'], '', 13);
		$this->pdf->SetTextColor(255,255,255);
		$this->pdf->SetXY($left, $top);
		$this->pdf->Cell(88, 8, mb_strtoupper(pll__('I-eat-strict-vegetarian')), 0, 0, 'C');

		// I DO NOT EAT MEAT AND ANIMAL PRODUCTS
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->SetXY($left, $top+9);
		$this->pdf->Cell(88, 8, mb_strtoupper(pll__('I-do-not-eat-meat', 'I-do-not-eat-meat')), 0, 0, 'C');

		// NO MEAT
		$this->pdf->SetXY($left+12, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'q', 0, 0, 'C');

		$this->pdf->SetXY($left+12, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+4, $top+29);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-meat')), 0, 0, 'C');

		// NO FISH
		$this->pdf->SetXY($left+40, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'w', 0, 0, 'C');

		$this->pdf->SetXY($left+40, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+31, $top+29);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-fish', 'No-fish')), 0, 0, 'C');

		// NO HONEY
		$this->pdf->SetXY($left+66, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'h', 0, 0, 'C');

		$this->pdf->SetXY($left+66, $top+15);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+58, $top+29);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-honey', 'No-honey')), 0, 0, 'C');

		// NO EGGS
		$this->pdf->SetXY($left+12, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'a', 0, 0, 'C');

		$this->pdf->SetXY($left+12, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+4, $top+49);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-eggs', 'No-eggs')), 0, 0, 'C');

		// NO MILK
		$this->pdf->SetXY($left+40, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 's', 0, 0, 'C');

		$this->pdf->SetXY($left+40, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+31, $top+49);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-milk', 'No-milk')), 0, 0, 'C');

		// NO BUTTER
		$this->pdf->SetXY($left+66, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'd', 0, 0, 'C');

		$this->pdf->SetXY($left+66, $top+35);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'N', 0, 0, 'C');

		$this->pdf->SetXY($left+58, $top+49);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('No-butter', 'No-butter')), 0, 0, 'C');

		// PLEASE DON'T USE
		$this->pdf->RoundedRect($left+8, $top+59, 72, 10, 2, '1111', null, $this->cfg['RedRoundedBox'], null);
		//$this->pdf->Rect($left+26, $top+60, 40, 10, 'F', array('all' => array()), $this->cfg['White']);

		$width = $this->pdf->GetStringWidth(mb_strtoupper(pll__('Please-dont-use')), $this->cfg['FontBold'], '', 11, false)+5;

		$this->pdf->SetXY($left, $top+55);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Red'][0], $this->cfg['Red'][1], $this->cfg['Red'][2]);
		$this->pdf->Rect($left+44-$width/2, $top+55, $width, 10, 'F', array('all' => array()), $this->cfg['White']);
		$this->pdf->Cell(88, 8, mb_strtoupper(pll__('Please-dont-use')), 0, 0, 'C');

		$this->pdf->SetXY($left+22, $top+60);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->Cell(44, 8, mb_strtoupper(pll__('Things-not-to-use')), 0, 0, 'C');

		$table2 = 60;

		// I EAT PLANT PRODUCTS
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->SetXY($left, $top+70);
		$this->pdf->Cell(88, 8, mb_strtoupper(pll__('I-eat-plant-products')), 0, 0, 'C');

		// GRAINS
		$this->pdf->SetXY($left+12, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'g', 0, 0, 'C');

		$this->pdf->SetXY($left+12, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+4, $top+29+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Grains')), 0, 0, 'C');

		// BEANS
		$this->pdf->SetXY($left+40, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'b', 0, 0, 'C');

		$this->pdf->SetXY($left+40, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+31, $top+29+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Beans')), 0, 0, 'C');

		// VEGETABLES
		$this->pdf->SetXY($left+66, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'v', 0, 0, 'C');

		$this->pdf->SetXY($left+66, $top+16+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+58, $top+29+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Vegetables')), 0, 0, 'C');

		// FRUITS
		$this->pdf->SetXY($left+12, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'x', 0, 0, 'C');

		$this->pdf->SetXY($left+12, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+4, $top+50+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Fruits')), 0, 0, 'C');

		// NUTS
		$this->pdf->SetXY($left+40, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'n', 0, 0, 'C');

		$this->pdf->SetXY($left+40, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+31, $top+50+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Nuts')), 0, 0, 'C');

		// VEGETABLE OIL
		$this->pdf->SetXY($left+66, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'o', 0, 0, 'C');

		$this->pdf->SetXY($left+66, $top+37+$table2);
		$this->pdf->SetFont('icomoon', '', $this->cfg['IconSize']);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->setFontSpacing(-0.2);
		$this->pdf->Cell(10, 10, 'y', 0, 0, 'C');

		$this->pdf->SetXY($left+58, $top+50+$table2);
		$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
		$this->pdf->SetTextColor($this->cfg['Green'][0], $this->cfg['Green'][1], $this->cfg['Green'][2]);
		$this->pdf->Cell(27, 8, mb_strtoupper(pll__('Vegetable-oil')), 0, 0, 'C');

	}

	public function BackPage( $left, $top )
	{
		$this->pdf->Rect($left, $top, 88, 125, 'F', array('all' => array()), $this->cfg['Green']);
		$this->pdf->RoundedRect($left+3, $top+3, 82, 119, 1, '1111', 'F', array(), $this->cfg['White']);

		$data = array(
			array(
				'title' => mb_strtoupper(pll__('I-do-not-eat-meat', 'I-do-not-eat-meat')),
				'color' => $this->cfg['Red'],
				'icon' => '2',
				'items' => array(
					array(mb_strtoupper(pll__('No-meat')), mb_strtoupper(pll__('Meat-samples'))),
					array(mb_strtoupper(pll__('No-minced-beef')), mb_strtoupper(pll__('Minced-beef-samples'))),
					array(mb_strtoupper(pll__('No-poultry')), mb_strtoupper(pll__('Poultry-samples'))),
					array(mb_strtoupper(pll__('No-seafood')), mb_strtoupper(pll__('Seafood-samples'))),
					array(mb_strtoupper(pll__('No-dairy')), mb_strtoupper(pll__('Dairy-samples'))),
					array(mb_strtoupper(pll__('No-animal-fat')), mb_strtoupper(pll__('Animal-fat-samples'))),
					array(mb_strtoupper(pll__('No-animal-products')), mb_strtoupper(pll__('Animal-products-samples'))),
					array(mb_strtoupper(pll__('No-animal-flavors')), mb_strtoupper(pll__('Animal-flavors-samples')))
				)
			),
			array(
				'title' => mb_strtoupper(pll__('I-eat-plant-products')),
				'color' => $this->cfg['Green'],
				'icon' => '1',
				'items' => array(
					array(mb_strtoupper(pll__('Grains')), mb_strtoupper(pll__('Grains-samples'))),
					array(mb_strtoupper(pll__('Beans')), mb_strtoupper(pll__('Beans-samples'))),
					array(mb_strtoupper(pll__('Vegetables')), mb_strtoupper(pll__('Vegetables-samples'))),
					array(mb_strtoupper(pll__('Leafy-greens')), mb_strtoupper(pll__('Leafy-greens-samples'))),
					array(mb_strtoupper(pll__('Fruits')), mb_strtoupper(pll__('Fruits-samples'))),
					array(mb_strtoupper(pll__('Nuts')), mb_strtoupper(pll__('Nuts-samples'))),
					array(mb_strtoupper(pll__('Vegetable-oil')), mb_strtoupper(pll__('Vegetable-oil-samples'))),
					array(mb_strtoupper(pll__('Spices')), mb_strtoupper(pll__('Spices-samples')))
				)
			)
		);
	
		$top += 4.5;

		foreach ($data as $value) {

			// TITLE
			$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
			$this->pdf->SetTextColor($value['color'][0], $value['color'][1], $value['color'][2]);
			$this->pdf->SetXY($left+5, $top);
			$this->pdf->Cell(88, 8, $value['title'], 0, 0, 'L');

			$top += 1.5;

			foreach ($value['items'] as $item) {
				// Items
				$top += $this->cfg['LineHeight'];
				$this->pdf->SetFont('icomoon', '', 12);
				$this->pdf->SetTextColor($value['color'][0], $value['color'][1], $value['color'][2]);
				$this->pdf->SetXY($left+4.5, $top);
				$this->pdf->Write(1, $value['icon'], null, null, 'L', false, 0, false, false, 0, 0, array());
				$this->pdf->SetFont($this->cfg['FontBold'], '', 11);
				$this->pdf->SetTextColor(0,0,0);
				$this->pdf->SetXY($left+10, $top);
				$this->pdf->Write(1, $item[0], null, null, 'L', false, 0, false, false, 0, 0, array());
				$this->pdf->SetFont($this->cfg['FontItalic'], '', 11);
				$this->pdf->Write(1, ' '.$item[1], null, null, 'L', false, 0, false, false, 0, 0, array());
			}

			$top += 6;
		}
	}
}

// Single Language PDF
new Passport();

#ob_clean();

//echo mb_strtoupper(pll__('I-eat-strict-vegetarian'));

// FONT GENERATE
// $font = new TCPDF_FONTS();
// $font->addTTFfont('fonts-ttf/fontawesome.ttf', 'TrueTypeUnicode');

// $font = new TCPDF_FONTS();
// $font->addTTFfont('fonts-ttf/icomoon.ttf', 'TrueTypeUnicode');

// $font = new TCPDF_FONTS();
// $font->addTTFfont('fonts-ttf/RobotoCondensed-Bold.ttf', 'TrueTypeUnicode');

// $font = new TCPDF_FONTS();
// $font->addTTFfont('fonts-ttf/RobotoCondensed-Italic.ttf', 'TrueTypeUnicode');

// $font = new TCPDF_FONTS();
// $font->addTTFfont('fonts-ttf/RobotoCondensed-Regular.ttf', 'TrueTypeUnicode');

?>