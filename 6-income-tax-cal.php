<?php

	function formulaArr() {
		$json = '[
			{"rate" : 0.30, "minAmount":500000000},
			{"rate" : 0.25, "minAmount":250000000},
			{"rate" : 0.15, "minAmount":50000000},
			{"rate" : 0.05, "minAmount":0}]';
		
		$formula = json_decode($json,true);
		return $formula;
	}

	function incomeTaxCal($income) {
		$formula = formulaArr();
		$len = count($formula);
		$diff = 0;
		$totalTax =0;
		
	
		for($i=0;$i<$len;$i++) {
			if($income >= $formula[$i]['minAmount']) {
				$diff = $income-$formula[$i]['minAmount'];
				$totalTax += $formula[$i]['rate'] * $diff;
				$income = $formula[$i]['minAmount'];; 
			}
		}	
		return number_format($totalTax);
	}

	print incomeTaxCal(750000000); 

?>