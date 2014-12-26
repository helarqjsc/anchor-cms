<?php

class Migration_add_display_posts_column extends Migration {

	public function up() {
		$table = Base::table('pages');
		if(!$this->has_table_column($table, 'display_posts')) {
			$sql = 'ALTER TABLE `' . $table . '` ADD COLUMN `display_posts` tinyint(1) NOT NULL DEFAULT 0';
			DB::ask($sql);

			$sql = 'UPDATE `' . $table . '` SET `display_posts` = 0';
			DB::ask($sql);
		}
	}

	public function down() {
		$table = Base::table('pages');
		if($this->has_table_column($table, 'display_posts')) {
			$sql = 'ALTER TABLE `' . $table . '` DROP COLUMN `display_posts`';
			DB::ask($sql);
		}
	}

}
