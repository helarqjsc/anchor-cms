<?php

class Migration_add_allowed_categories extends Migration {

	public function up() {
		$table = Base::table('pages');
		if(!$this->has_table_column($table, 'allowed_categories')) {
			$sql = 'ALTER TABLE `' . $table . '` ADD COLUMN `allowed_categories` VARCHAR(255) NOT NULL DEFAULT "0"';
			DB::ask($sql);

			$sql = 'UPDATE `' . $table . '` SET `allowed_categories` = "0"';
			DB::ask($sql);
		}
	}

	public function down() {
		$table = Base::table('pages');
		if($this->has_table_column($table, 'allowed_categories')) {
			$sql = 'ALTER TABLE `' . $table . '` DROP COLUMN `allowed_categories`';
			DB::ask($sql);
		}
	}

}
