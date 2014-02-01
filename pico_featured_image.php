<?php

/**
 * Pico Featured Image Plugin
 *
 * This plugin enables the use of the Featured Image on the content of the Pico.
 *
 * @author maccotsan
 * @link https://github.com/ksz/pico-featured-image
 * @license http://opensource.org/licenses/MIT
 * @version 0.1
 */
class Pico_Featured_Image {
	public $settings;

	public function config_loaded(&$settings) {
		$this->settings = $settings;

		if (empty($this->settings['thumb_url'])) {
			$this->settings['thumb_url'] = 'content/images/post_thumbnails';
		}
	}

	public function get_page_data(&$data, $page_meta) {
		if (!empty($page_meta['thumbnail'])) {
			$data['thumbnail'] = $page_meta['thumbnail'];
		} else {
			$filePath = str_replace($this->settings['base_url'], '', $data['url']);
			$thumbURL = $this->settings['thumb_url'] . $filePath;

			if (file_exists(ROOT_DIR . $thumbURL . '.png')) {
				$thumbURL .= '.png';
			} else if (file_exists(ROOT_DIR . $thumbURL . '.jpg')) {
				$thumbURL .= '.jpg';
			} else if (file_exists(ROOT_DIR . $thumbURL . '.gif')) {
				$thumbURL .= '.gif';
			} else {
				$thumbURL = '';
			}

			$data['thumbnail'] = $thumbURL;
		}
	}

	public function before_read_file_meta(&$headers) {
		$headers['thumbnail'] = 'Thumbnail';
	}
}
