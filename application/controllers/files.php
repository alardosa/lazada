<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller{
	 
	function __construct()
	{
		parent::__construct();
		$this->load->model('files_model','file_m');
		$this->load->helper('url');
		$this->load->helper('html');	
		$this->load->helper('array');	
		$this->load->helper('file');			
	}	

	public function thumb($id, $width = 164, $height = 152, $mode = 1)
	{	
		$file = $this->file_m->get($id);
		//echo var_dump($file);
		$cache_dir = $this->config->item('cache_path') . 'image_files/';
		$source_file = upload_path;		
		
		if ( ! is_dir($cache_dir))
		{
			mkdir($cache_dir, 0777, TRUE);
		}

		$modes = array('fill', 'fit');

		$args = func_num_args();
		$args = $args > 3 ? 3 : $args;
		$args = $args === 3 && in_array($height, $modes) ? 2 : $args;

		switch ($args)
		{
			case 2:
				if (in_array($width, $modes))
				{
					$mode	= $width;
					$width	= $height; // 100

					continue;
				}
				elseif (in_array($height, $modes))
				{
					$mode	= $height;
					$height	= empty($width) ? NULL : $width;
				}
				else
				{
					$height	= NULL;
				}

				if ( ! empty($width))
				{
					if (($pos = strpos($width, 'x')) !== FALSE)
					{
						if ($pos === 0)
						{
							$height = substr($width, 1);
							$width	= NULL;
						}
						else
						{
							list($width, $height) = explode('x', $width);
						}
					}
				}
			case 2:
			case 3:
				if (in_array($height, $modes))
				{
					$mode	= $height;
					$height	= empty($width) ? NULL : $width;
				}

				foreach (array('height' => 'width', 'width' => 'height') as $var1 => $var2)
				{
					if (${$var1} === 0 OR ${$var1} === '0')
					{
						${$var1} = NULL;
					}
					elseif (empty(${$var1}) OR ${$var1} === 'auto')
					{
						${$var1} = (empty(${$var2}) OR ${$var2} === 'auto' OR ! is_null($mode)) ? NULL : 100000;
					}
				}
				break;
		}

		// Path to image thumbnail
		$image_thumb = $cache_dir . ($mode ? $mode : 'normal');
		$image_thumb .= '_' . ($width === NULL ? 'a' : ($width > $file->width ? 'b' : $width));
		$image_thumb .= '_' . ($height === NULL ? 'a' : ($height > $file->height ? 'b' : $height));
		$image_thumb .= '_' . md5($file->filename).$file->extension;

		if ( ! file_exists($image_thumb))
		{
			// Set source file path
			$source_file = $source_file . $file->filename;

			// Set resized file name
			$resized_file = $image_thumb;
			// Set cropped file name
			$cropped_file = $image_thumb;

			// Load in the image manipulation library
			$this->load->library('image_lib');

			// Determine final width and height
			$wished_output_width = $width;
			$wished_output_height = $height;

			// Parameters for file resize
			$config['source_image'] = $source_file;
			$config['new_image'] = $resized_file;
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = false;

			list($width, $height, $type, $attr) = getimagesize($source_file);

			// Check to see if we want a square image
			if($wished_output_width == $wished_output_height)
			{
				if($width > $height) {
					$san = $width / $height;
					$san2 = $height / $wished_output_height;
					$new_width = round($width / $san2);
					$new_height = round($new_width / $san);
				}
				elseif($width < $height) 
				{
					$san = $height / $width;
					$san2 = $width / $wished_output_width;
					$new_height = round($height / $san2);
					$new_width = round($new_height / $san);
				} 
				else 
				{
					$new_height = $wished_output_height;
					$new_width = $wished_output_width;
				}
			}
			else
			{
				// If it's not square
				// run some numbers to determine the right dimensions
				if($width > $height) {
					$san = $width / $height;
					$san2 = $height / $wished_output_height;
					$new_width = round($width / $san2);
					$new_height = round($new_width / $san);
				}
				elseif($width < $height) 
				{
					$san = $height / $width;
					$san2 = $width / $wished_output_width;
					$new_height = round($height / $san2);
					$new_width = round($new_height / $san);
				} 
				else 
				{
					// If someone uploads a square image
					if($wished_output_width > $wished_output_height)
					{
						$san = $height / $width;
						$san2 = $width / $wished_output_width;
						$new_height = round($height / $san2);
						$new_width = round($new_height / $san);
					}
					elseif($wished_output_width < $wished_output_height)
					{
						$san = $width / $height;
						$san2 = $height / $wished_output_height;
						$new_width = round($width / $san2);
						$new_height = round($new_width / $san);
					}
					else
					{
						// ...be completely baffled...
					}
				}
			}
			// ...more parameters for file resize
			$config['width'] = $new_width;
			$config['height'] = $new_height;

			// Initiate file resize
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			// Determine if file is already the right size
			if($new_width == $wished_output_width && $new_height == $wished_output_height) {
				// Do nothing because it's already the right dimensions
			}else {
				// Determine where to set crop offset for x and y
				$x = (($new_width - $wished_output_width) > 0) ? ($new_width - $wished_output_width)/2 : 0;
				$y = (($new_height - $wished_output_height) > 0) ? ($new_height - $wished_output_height)/2 : 0;
				
				// Parameters for file cropping
				$config['width'] = $wished_output_width;
				$config['height'] = $wished_output_height;
				$config['x_axis'] = $x;
				$config['y_axis'] = $y;
				$config['quality'] = '100%';
				$config['maintain_ratio'] = FALSE;
				$config['source_image'] = $resized_file;
				$config['new_image'] = $cropped_file;
				
				// Initiate file cropping
				$this->image_lib->initialize($config);
				$this->image_lib->crop();
			}
		}
		header('Content-type: ' . $file->mimetype);
		readfile($image_thumb);
	}	
	


	public function large($id)
	{
		return $this->thumb($id, NULL, NULL);
	}

}

