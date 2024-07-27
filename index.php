<?php 

require_once ('page-common-headers.php');

$subDomain = 'tools';
$selfHostedRsrcRoot = $SITE->getResourceRoot();
$devHostRsrcRoot = $SITE->getResourceRoot('dev');
$cacheVer = $SITE->getCacheVer();
$cacheVerToolsJs = $SITE->getCacheVer('tools-js');
$linkToolsJs = '<script type="text/javascript" src="'.$selfHostedRsrcRoot.'js/main/tools.min.js'.$cacheVerToolsJs.'"></script>
<script type="text/javascript" src="'.$selfHostedRsrcRoot.'js/main/prebid-ads.js'.$cacheVerToolsJs.'"></script>';
$toolsSubNav = '<li><a href="/'.$subDomain.'">Site Tools</a></li>';
	
$rccBlankImg = $GLOBAL_mediaRootFav.'rcc-blank-img.png';													

$divOp = '&#247;';
$plusMinus = '&#177;';
$nameKey = 'name';
$clsKey = 'class';
$digKey = 'bandDigit';
$mulKey = 'multiplier';
$tolKey = 'tol';
$tCoKey = 'tempCo';
$tCoUnitKey = 'tCoUnit';

$metaArr = array(				

	($blackKey = 'black') => array($nameKey => 'Black', $clsKey => 'rcc-blk', $digKey => '0', $mulKey => 'x1', $tolKey => '', $tCoKey => ''),
	($brownKey = 'brown')  => array($nameKey => 'Brown', $clsKey => 'rcc-brw', $digKey => '1', $mulKey => 'x10', $tolKey => $plusMinus.'1%', $tCoKey => '100'),
	($redKey = 'red')  => array($nameKey => 'Red', $clsKey => 'rcc-red', $digKey => '2', $mulKey => 'x100', $tolKey => $plusMinus.'2%', $tCoKey => '50'),
	($orangeKey = 'orange')  => array($nameKey => 'Orange', $clsKey => 'rcc-org', $digKey => '3', $mulKey => 'x1K', $tolKey => $plusMinus.'3%', $tCoKey => '15'),
	($yellowKey = 'yellow')  => array($nameKey => 'Yellow', $clsKey => 'rcc-yel', $digKey => '4', $mulKey => 'x10K', $tolKey => $plusMinus.'4%', $tCoKey => '25'),
	($greenKey = 'green')  => array($nameKey => 'Green', $clsKey => 'rcc-grn', $digKey => '5', $mulKey => 'x100K', $tolKey => $plusMinus.'0.5%', $tCoKey => ''),
	($blueKey = 'blue')  => array($nameKey => 'Blue', $clsKey => 'rcc-blu', $digKey => '6', $mulKey => 'x1M', $tolKey => $plusMinus.'0.25%', $tCoKey => '10'),
	($violetKey = 'violet')  => array($nameKey => 'Violet', $clsKey => 'rcc-vio', $digKey => '7', $mulKey => 'x10M', $tolKey => $plusMinus.'0.10%', $tCoKey => '5'),
	($grayKey = 'gray')  => array($nameKey => 'Gray', $clsKey => 'rcc-gry', $digKey => '8', $mulKey => 'x100M', $tolKey => $plusMinus.'0.05%', $tCoKey => ''),
	($whiteKey = 'white')  => array($nameKey => 'White', $clsKey => 'rcc-wht', $digKey => '9', $mulKey => 'x1G', $tolKey => '', $tCoKey => ''),
	($goldKey = 'gold')  => array($nameKey => 'Gold', $clsKey => 'rcc-gld', $digKey => '10', $mulKey => $divOp.'10', $tolKey => $plusMinus.'5%', $tCoKey => ''),
	($silverKey = 'silver')  => array($nameKey => 'Silver', $clsKey => 'rcc-slv', $digKey => '11', $mulKey => $divOp.'100', $tolKey => $plusMinus.'10%', $tCoKey => ''),
	$tCoUnitKey => 'ppm/ºC'

);

$digit1Options=$digit2Options=$digit3Options=$multiplierOptions=$tolOptions=$tCoOptions=
$bandNamesTr=$multipliersTr=$tolsTr=$tCosTr='';

$digit1Arr = array($brownKey, $redKey, $orangeKey, $yellowKey, $greenKey, $blueKey, $violetKey, $grayKey, $whiteKey);
$digit3Arr = $digit2Arr = $bandNamesArr = array_merge(array($blackKey), $digit1Arr);		
$mulArr = array_merge($digit2Arr, array($goldKey, $silverKey));
$tolArr = array($brownKey, $redKey, $orangeKey, $yellowKey, $greenKey, $blueKey, $violetKey, $grayKey, $goldKey, $silverKey);
$tCoArr = array($brownKey, $redKey, $orangeKey, $yellowKey, $blueKey, $violetKey);

foreach($digit1Arr as $bandColorKey)
	$digit1Options .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(1, 9) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').'>'.$metaArr[$bandColorKey][$digKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($digit2Arr as $bandColorKey)
	$digit2Options .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(0, 9) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').'>'.$metaArr[$bandColorKey][$digKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($digit3Arr as $bandColorKey)
	$digit3Options .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(0, 9) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').'>'.$metaArr[$bandColorKey][$digKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($mulArr as $bandColorKey)
	$multiplierOptions .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(0, 11) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').' '.(in_array($bandColorKey, array($goldKey, $silverKey))? 'data-division-operator="true"' : '').'>'.$metaArr[$bandColorKey][$mulKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($tolArr as $bandColorKey)
	$tolOptions .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(0, 9) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').'>'.$metaArr[$bandColorKey][$tolKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($tCoArr as $bandColorKey)
	$tCoOptions .= '<option class="'.$metaArr[$bandColorKey][$clsKey].'"  '.((mt_rand(1, 7) == $metaArr[$bandColorKey][$digKey])? 'selected="selected"' : '').'>'.$metaArr[$bandColorKey][$tCoKey].' '.$metaArr[$bandColorKey][$nameKey].'</option>';

foreach($bandNamesArr as $bandColorKey)
	$bandNamesTr .= '<tr><td class="'.$metaArr[$bandColorKey][$clsKey].'">'.$metaArr[$bandColorKey][$nameKey].'</td> <td>'.$metaArr[$bandColorKey][$digKey].'</td></tr>';

foreach($mulArr as $bandColorKey)
	$multipliersTr .= '<tr><td class="'.$metaArr[$bandColorKey][$clsKey].'">'.$metaArr[$bandColorKey][$nameKey].'</td> <td>'.str_ireplace(array('K', 'M', 'G'), array('000', '000000', '000000000'), $metaArr[$bandColorKey][$mulKey]).'</td></tr>';		

foreach($tolArr as $bandColorKey)
	$tolsTr .= '<tr><td class="'.$metaArr[$bandColorKey][$clsKey].'">'.$metaArr[$bandColorKey][$nameKey].'</td> <td>'.$metaArr[$bandColorKey][$tolKey].'</td></tr>';
											
foreach($tCoArr as $bandColorKey)
	$tCosTr .= '<tr><td class="'.$metaArr[$bandColorKey][$clsKey].'">'.$metaArr[$bandColorKey][$nameKey].'</td> <td>'.$metaArr[$bandColorKey][$tCoKey].$metaArr[$tCoUnitKey].'</td></tr>';
																	

function getBandForm($band=4, $h, $h_img){		
	
	global $digit1Options, $digit2Options, $digit3Options, $multiplierOptions, $tolOptions, $tCoOptions;
																															
	return $h.'	
			<div class="bars">'.$h_img.'<div class="digit1-bar"></div><div class="digit2-bar"></div>'.(($band == 4)? '<div class="multiplier-bar"></div>' : '').'<div class="tolerance-bar"></div>'.(($band >= 5)? '<div class="digit3-bar"></div><div class="multiplier-bar2"></div>' : '').(($band == 6)? '<div class="temp-coeff-bar"></div>' : '').'</div>
			<form class="inline-form block-label" method="post" action="">
				<fieldset>
					<div class="rc3">						
						<div class="field-ctrl">
							<label>1st Digit</label>
							<select class="field digit1">
								'.$digit1Options.'																
							</select>					
						</div>
						<div class="field-ctrl">
							<label>2nd Digit</label>
							<select class="field digit2">
								'.$digit2Options.'										
							</select>					
						</div>
						'.((in_array($band, array(5, 6)))? '
						<div class="field-ctrl">
							<label>3rd Digit</label>
							<select class="field digit3">
								'.$digit3Options.'										
							</select>					
						</div>' : '').'
						<div class="field-ctrl">
							<label>Multiplier</label>
							<select class="field multiplier">
								'.$multiplierOptions.'										
							</select>					
						</div>
						<div class="field-ctrl">
							<label>Tolerance</label>
							<select class="field tolerance">	
								'.$tolOptions.'															
							</select>					
						</div>
						'.(($band == 6)? '
						<div class="field-ctrl">
							<label>Temp co</label>
							<select class="field temp-coeff">
								'.$tCoOptions.'																
							</select>					
						</div>' : '').'
						<div class="rcc-res"></div>
					</div>
				</fieldset>
			</form>
			';

}

$SITE->buildPageHtml(array('pageTitle'=>'Resistor Color Code Calculator', 'pageBodyMetas'=>$linkToolsJs,	
	'preBodyMetas'=>$SITE->getNavBreadcrumbs($toolsSubNav.'<li><a href="'.$GLOBAL_page_self_rel.'" title="">Resistor Color Code Calculator</a></li>'),
	'pageBody'=>'				
	<div class="single-base blend">			
		<div class="base-ctrl">				
			<div class="panel panel-mine-1 rc3-base">	
				<h1 class="panel-head page-title">RESISTOR COLOR CODE CALCULATOR</h1>
				<div class="panel-body">
					<div class="tab tab-classic">			
						<a class="" data-default-tab="true" data-toggle="tab">4-band</a>	
						<a class="" data-toggle="tab">5-band</a>	
						<a class="" data-toggle="tab" >6-band</a>
						<a class="" data-toggle="tab">Notes</a>
					</div>
					<div class="tab-contents has-tab-close fade-panel">  				
						<div class="tab-content">						  
							'.getBandForm(4, '<h1 class="prime">4 Band Resistor</h1>', '<img class="" src="'.$rccBlankImg.'" alt="4-band resistors" />').'
						</div>					
						<div class="tab-content">						  
							'.getBandForm(5, '<h1 class="prime">5 Band Resistor</h1>', '<img class="" src="'.$rccBlankImg.'" alt="5-band resistors" />').'
						</div>			
						<div class="tab-content">						  
							'.getBandForm(6, '<h1 class="prime">6 Band Resistor</h1>', '<img class="" src="'.$rccBlankImg.'" alt="6-band resistors" />').'
						</div>	
						<div class="tab-content">						  
							<h1 class="prime">Notes On Resistor Color Codes</h1>
							<div class="hr-dividers">
								Are you having trouble reading resistor color codes? If your answer is yes, then this tool is specifically designed for you! 
								Our Resistor Color Code Calculator is a handy tool for reading carbon-composition resistors whether it’s a 4-band, 5-band or 6-band type. 
								<p>
									To use this tool, simply click on a particular color and number and watch how the actual bands on the resistor illustration change. 
									The resistance value is displayed on the result box below together with the tolerance and the temperature coefficient.  
								</p>
								<h3>RESISTOR COLOR CODE READING GUIDE</h3>
								<p>
									As shown above, a carbon-composition resistor can have 4 to 6 bands. A 5-band resistor is more precise compared to a 4-band type because 
									of the inclusion of a third significant digit. A 6-band resistor is like a 5-band resistor but includes a temperature coefficient band (the 6th band).
								</p>
								<div class="table-responsive">									
									<table class="table-basic">
										<th>Bands:</th><th>4-band</th><th>5-band</th><th>6-band</th>
										<tr><td>1st band</td> <td>1st significant digit</td> <td>1st significant digit</td> <td>1st significant digit</td></tr>
										<tr><td>2nd band</td> <td>2nd significant digit</td> <td>2nd significant digit</td> <td>2nd significant digit</td></tr>
										<tr><td>3rd band</td> <td>multiplier</td> <td>3rd significant digit</td> <td>3rd significant digit</td></tr>
										<tr><td>4th band</td> <td>tolerance</td> <td>multiplier</td> <td>multiplier</td></tr>
										<tr><td>5th band</td> <td>N/A</td> <td>tolerance</td> <td>tolerance</td></tr>
										<tr><td>6th band</td> <td>N/A</td> <td>N/A</td> <td>temperature coefficient</td></tr>
									</table>											
								</div>	
								<div class="table-responsive">											
									<p>
										<h3>BAND DIGIT</h3>
										Each color represents a number if it’s located from the 1st to 2nd band for a 4-band type or 1st to 3rd band for a 5-band and 6-band type.
									</p>									
									<table class="table-basic">												
										<th>Color</th><th>Value</th>
										'.$bandNamesTr.'
									</table>									
									<p>Mnemonics were created to easily memorize the sequence of the colors.</p>
									<div class="alert alert-warning prime"> 
										The most popular mnemonic is "<b>B</b>ig <b>B</b>oys <b>R</b>ace <b>O</b>ur <b>Y</b>oung <b>G</b>irls <b>B</b>ut <b>V</b>iolet <b>G</b>enerally <b>W</b>ins" 
										where the first letter of each word corresponds to the first letter of the color. 
									</div>
								</div>																								
								<div class="table-responsive">
									<p>
										<h3>MULTIPLIER</h3>
										If the color is found on the 3rd band for a 4-band type or the 4th band for a 5-band and 6-band type, then it’s a multiplier.
									</p>									
									<table class="table-basic">												
										<th>Color</th><th>Value</th>
										'.$multipliersTr.'
									</table>
									<div class="alert alert-info">Notice that the number of zeroes is equal to the color’s number as per the previous table.</div>
								</div>											
								<div class="table-responsive">
									<p>
										<h3>TOLERANCE</h3>
										The fourth band (or 5th for the 5-band and 6-band) indicates the tolerance values. Here, two colors are added (gold and silver).
									</p>									
									<table class="table-basic">												
										<th>Color</th><th>Value</th>																	
										'.$tolsTr.'
									</table>									
								</div>										
								<div class="table-responsive">
									<p>
										<h3>TEMPERATURE COEFFICIENT</h3>
										The 6th band for a 6-band type resistor is the temperature coefficient. 
										This indicates how much the actual resistance value of the resistor changes when the temperature changes.
									</p>									
									<table class="table-basic">												
										<th>Color</th><th>Value</th>																	
										'.$tCosTr.'
									</table>
									<div class="alert alert-info"> 
										NOTE: Temperature coefficient is not applicable to any color band that was not listed in this table												
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>'
));


		
		
		
		
		
	


?>