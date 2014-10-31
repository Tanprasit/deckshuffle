<?php

class CardsTableSeeder extends Seeder {
	public function run() {
		if (($handle = fopen("./public/ws.csv", "r")) !== FALSE) {
			if (($handle = fopen("./public/ws.csv", "r")) !== FALSE) {
				$counter = 0;
			    while (($data = fgetcsv($handle, 1500, ",")) !== FALSE) {
			    	if ($counter > 0) {
						DB::table('cards')->insert(
							array(
						    	array(
						    		'level' => $data[0],
						    		'colour' => $data[1],
						    		'cost' =>	$data[2],
						    		'trigger' => $data[3],
						    		'power' => $data[4],
						    		'soul' => $data[5],
						    		'traits' => $data[6],
						    		'series_id' => $data[7],
						    		'name' => $data[8],
						    		'jap_name' => $data[9],
						    		'eng_text' => $data[10],
						    		'eng_text2' => $data[11],
						    		'jap_text' => $data[12],
						    		'jap_text2' => $data[13],
						    		'type' => $data[14],
						    		'unique_identifier' => $data[15],
						    	),
						    )
	    				);
			    	} else {
			    		$counter++;
			    	}
				}
			    fclose($handle);
			}
		}
	}
}