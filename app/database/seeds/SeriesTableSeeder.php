<?php

class SeriesTableSeeder extends Seeder {

	public function run() {
		DB::table('series')->insert(array(
			array('id' => 1, 'name' => 'Sword Art Online Vol.1', 'unique_identifier' => 'SAO/S20'),
			array('id' => 2, 'name' => 'Sword Art Online Vol.2', 'unique_identifier' => 'SAO/S26'),
			array('id' => 3, 'name' => 'Guilty Crown', 'unique_identifier' => 'GC/S16'),
			array('id' => 4, 'name' => 'To Aru Kagaku no Railgun S', 'unique_identifier' => 'RG/W26'),
			));
	}
}