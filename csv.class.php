<?php
/***************************************************************************************
*    Title: Basic class for serializing PHP arrays in a csv format
*    Author: Tristan Waddington
*    Date:Jun 3, 2011
*    Code version: 1
*    Availability: https://gist.github.com/twaddington/1006027
***************************************************************************************/
	class CSV {
		protected $data;

		/*
		 * @params array $columns
		 * @returns void
		 */
		public function __construct($columns) {
			$this->data = '"' . implode('","', $columns) . '"' . "\n";
		}
		/*
		 * @params array $row
		 * @returns void
		 */
		public function addRow($row) {
			$this->data .= '"' . implode('","', $row) . '"' . "\n";
		}
		/*
		 * @returns void
		 */
		public function export($filename) {
			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename="' . $filename . '.csv"');

			echo $this->data;
			die();
		}
		public function __toString() {
			return $this->data;
		}
	}

?>
