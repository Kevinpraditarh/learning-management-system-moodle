<?php
global $CFG;
require_once($CFG->dirroot . '/theme/edumy/ccn/block_handler/ccn_block_handler.php');
class block_cocoon_parallax_counters extends block_base
{
  // Declare first
  public function init()
  {
    $this->title = get_string('cocoon_parallax_counters', 'block_cocoon_parallax_counters');
  }

  // Declare second
  public function specialization()
  {
    // $this->title = isset($this->config->title) ? format_string($this->config->title) : '';
    global $CFG, $DB;
    include($CFG->dirroot . '/theme/edumy/ccn/block_handler/specialization.php');
    if (empty($this->config)) {
      $this->config = new \stdClass();
      $this->config->title = 'Enhance your skills with best Online courses';
      $this->config->subtitle = 'STARTING ONLINE LEARNING';
      $this->config->counter_1 = '6500';
      $this->config->counter_2 = '58263';
      $this->config->counter_3 = '896673';
      $this->config->counter_4 = '8570';
      $this->config->counter_1_text = 'Students learning';
      $this->config->counter_2_text = 'Graduates';
      $this->config->counter_3_text = 'Free courses';
      $this->config->counter_4_text = 'Active courses';
      $this->config->counter_1_icon = 'flaticon-student-3';
      $this->config->counter_2_icon = 'flaticon-cap';
      $this->config->counter_3_icon = 'flaticon-jigsaw';
      $this->config->counter_4_icon = 'flaticon-online-learning';
      // $this->config->image = $CFG->wwwroot . '/theme/edumy/images/background/2.jpg';
      $this->config->color_bg = '#2441e7';
      $this->config->color_title = '#ffffff';
      $this->config->color_subtitle = '#ffffff';
    }
  }
  public function get_content()
  {
    global $CFG, $DB;
    require_once($CFG->libdir . '/filelib.php');
    if ($this->content !== null) {
      return $this->content;
    }
    $this->content         =  new stdClass;
    if (!empty($this->config->title)) {
      $this->content->title = $this->config->title;
    } else {
      $this->content->title = '';
    }
    if (!empty($this->config->subtitle)) {
      $this->content->subtitle = $this->config->subtitle;
    } else {
      $this->content->subtitle = '';
    }
    if (!empty($this->config->image)) {
      $this->content->image = $this->config->image;
    } else {
      $this->content->image = $CFG->wwwroot . '/theme/edumy/images/background/2.jpg';
    }
    if (!empty($this->config->counter_1)) {
      $this->content->counter_1 = $this->config->counter_1;
    } else {
      $this->content->counter_1 = '';
    }
    if (!empty($this->config->counter_1_text)) {
      $this->content->counter_1_text = $this->config->counter_1_text;
    } else {
      $this->content->counter_1_text = '';
    }
    if (!empty($this->config->counter_1_icon)) {
      $this->content->counter_1_icon = $this->config->counter_1_icon;
    } else {
      $this->content->counter_1_icon = '';
    }
    if (!empty($this->config->counter_2)) {
      $this->content->counter_2 = $this->config->counter_2;
    } else {
      $this->content->counter_2 = '';
    }
    if (!empty($this->config->counter_2_text)) {
      $this->content->counter_2_text = $this->config->counter_2_text;
    } else {
      $this->content->counter_2_text = '';
    }
    if (!empty($this->config->counter_2_icon)) {
      $this->content->counter_2_icon = $this->config->counter_2_icon;
    } else {
      $this->content->counter_2_icon = '';
    }
    if (!empty($this->config->counter_3)) {
      $this->content->counter_3 = $this->config->counter_3;
    } else {
      $this->content->counter_3 = '';
    }
    if (!empty($this->config->counter_3_text)) {
      $this->content->counter_3_text = $this->config->counter_3_text;
    } else {
      $this->content->counter_3_text = '';
    }
    if (!empty($this->config->counter_3_icon)) {
      $this->content->counter_3_icon = $this->config->counter_3_icon;
    } else {
      $this->content->counter_3_icon = '';
    }
    if (!empty($this->config->counter_4)) {
      $this->content->counter_4 = $this->config->counter_4;
    } else {
      $this->content->counter_4 = '';
    }
    if (!empty($this->config->counter_4_text)) {
      $this->content->counter_4_text = $this->config->counter_4_text;
    } else {
      $this->content->counter_4_text = '';
    }
    if (!empty($this->config->counter_4_icon)) {
      $this->content->counter_4_icon = $this->config->counter_4_icon;
    } else {
      $this->content->counter_4_icon = '';
    }
    if (!empty($this->config->color_bg)) {
      $this->content->color_bg = $this->config->color_bg;
    } else {
      $this->content->color_bg = '#2441e7';
    }
    if (!empty($this->config->color_title)) {
      $this->content->color_title = $this->config->color_title;
    } else {
      $this->content->color_title = '#fff';
    }
    if (!empty($this->config->color_subtitle)) {
      $this->content->color_subtitle = $this->config->color_subtitle;
    } else {
      $this->content->color_subtitle = '';
    }

    if ($this->config->style == 1) {
      $this->content->style = 'divider_home2';
    } else {
      $this->content->style = 'divider_home1';
    }

    $fs = get_file_storage();
    $files = $fs->get_area_files($this->context->id, 'block_cocoon_parallax_counters', 'content');
    // $this->content->image = '';
    foreach ($files as $file) {
      $filename = $file->get_filename();
      if ($filename <> '.') {
        $url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(), null, $file->get_filepath(), $filename);
        $this->content->image =  $url;
      }
    }

    //definisi pengambilan gambar 
    $ccnImages_Whatsapp = $CFG->wwwroot . '/theme/edumy/images/walogo.png';

    $this->content->text = '
        <style type="text/css">
        #wa{
          display: absolute;
          background-color:#E1EEF4;
          border-radius: 50px;
          padding:50px;

        }

        .custom-h1, .custom-h5 {
          margin: 0; /* Menghilangkan margin agar tidak ada jarak di atas dan di bawah elemen */
          text-align: left; /* Mengatur teks agar rata kiri */
        }

        #wa-button {
          position: fixed;
          bottom: 60px;
          right: 20px;
          z-index: 999;
        }
        
        .whatsapp-button {
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          background-color: #B6D5E6; /* Warna latar belakang WhatsApp */
          width: 120px; /* Lebar tombol (sesuaikan sesuai kebutuhan) */
          height: 50px; /* Tinggi tombol (sesuaikan sesuai kebutuhan) */
          border-radius: 25px; /* Membuat tombol berbentuk lonjong */
          text-decoration: none;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Efek bayangan tombol */
          transition: background-color 0.3s ease;
          
        }
        
        .whatsapp-button:hover {
          background-color: #128c7e; /* Warna latar belakang saat tombol dihover */
        }
        
        .button-inner {
          display: flex;
          flex-direction: row;
          align-items: center;
          padding: 5px;
          color: white; /* Warna teks tombol */
        }
        
        .button-inner img {
          width: 30px; /* Lebar gambar (sesuaikan sesuai kebutuhan) */
          height: 30px; /* Tinggi gambar (sesuaikan sesuai kebutuhan) */
          margin-right: 1px; /* Jarak antara gambar dan teks */
        }
        
        .button-label {
          font-size: 1em; /* Ukuran teks tombol */
          margin: 0; /* Menghilangkan margin default pada h2 */
          padding-right: 5px;
          color: #003666;
        }
        .button-inner>h2:hover {
          color: #ffffff;
        }
        
        
        </style>

  <section>
	  <div class="container position relative" id="wa">
		<div class="row">
			<div class="col-sm-6 col-lg-3 text-center">
				<div class="funfact_one">
					<div class="ccn_icon"><span data-ccn="counter_1_icon" class="' . format_text($this->content->counter_1_icon, FORMAT_HTML, array('filter' => true)) . '"></span></div>
					<div class="details">
            <h1 class="custom-h" data-ccn="counter_2" style="color: #003666;">' . format_text($this->content->counter_1, FORMAT_HTML, array('filter' => true)) .  '</h1>
						<h5 class="custom-h" data-ccn="counter_1_text" style="color: #757575;">' . format_text($this->content->counter_1_text, FORMAT_HTML, array('filter' => true)) . '</h5>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 text-center">
				<div class="funfact_one">
					<div class="ccn_icon"><span data-ccn="counter_2_icon" class="' . format_text($this->content->counter_2_icon, FORMAT_HTML, array('filter' => true)) . '"></span></div>
					<div class="details">
						<h1 class="" data-ccn="counter_2" style="color: #003666;">' . format_text($this->content->counter_2, FORMAT_HTML, array('filter' => true)) . '</h1>
						<h5 data-ccn="counter_2_text" style="color: #757575;">' . format_text($this->content->counter_2_text, FORMAT_HTML, array('filter' => true)) . '</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3 text-center">
				<div class="funfact_one">
					<div class="ccn_icon"><span data-ccn="counter_3_icon" class="' . format_text($this->content->counter_3_icon, FORMAT_HTML, array('filter' => true)) . '"></span></div>
					<div class="details">
						<h1 data-ccn="counter_3" class="" style="color: #003666;">' . format_text($this->content->counter_3, FORMAT_HTML, array('filter' => true)) . '</h1>
						<h5 data-ccn="counter_3_text" style="color: #757575;">' . format_text($this->content->counter_3_text, FORMAT_HTML, array('filter' => true)) . '</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3 text-center">
				<div class="funfact_one">
					<div class="ccn_icon"><span data-ccn="counter_4_icon" class="' . format_text($this->content->counter_4_icon, FORMAT_HTML, array('filter' => true)) . '"></span></div>
					<div class="details">
						<h1 class="" data-ccn="counter_4" style="color: #003666;">' . format_text($this->content->counter_4, FORMAT_HTML, array('filter' => true)) . '</h1>
						<h5 data-ccn="counter_4_text" style="color: #757575;">' . format_text($this->content->counter_4_text, FORMAT_HTML, array('filter' => true)) . '</h5>
					</div>
				</div>
			</div>
		</div>

    <div id="wa-button">
      <a href="https://wa.me/6285226457536" class="whatsapp-button">
        <div class="button-inner">
          <img src="' . $ccnImages_Whatsapp . '">
          <h2 class="button-label">Whatsapp</h2>
        </div>
      </a>
    </div>
  


	</div>

 

</section>

';
    return $this->content;
  }

  /**
   * Allow multiple instances in a single course?
   *
   * @return bool True if multiple instances are allowed, false otherwise.
   */
  public function instance_allow_multiple()
  {
    return true;
  }

  /**
   * Enables global configuration of the block in settings.php.
   *
   * @return bool True if the global configuration is enabled.
   */
  function has_config()
  {
    return true;
  }

  /**
   * Sets the applicable formats for the block.
   *
   * @return string[] Array of pages and permissions.
   */
  function applicable_formats()
  {
    $ccnBlockHandler = new ccnBlockHandler();
    return $ccnBlockHandler->ccnGetBlockApplicability(array('all'));
  }

  public function html_attributes()
  {
    global $CFG;
    $attributes = parent::html_attributes();
    include($CFG->dirroot . '/theme/edumy/ccn/block_handler/attributes.php');
    return $attributes;
  }
}
