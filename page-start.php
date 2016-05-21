<?php
/**
 * Template Name: Startpage
 */
?>

<?php get_header(); ?>

<div class="project-area noprint">
  <a href="<?php echo get_option('home'); ?>"><?php the_post_thumbnail( $size, $attr ); ?></a>
  <h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
  <div>
    <span class="please-review"><?php pll_e('Please-review'); ?></span>
    <select class="cs-select cs-skin-elastic">
      <option value="" disabled selected><?php echo pll_current_language('name'); #pll_e('Choose-your-language'); ?></option>
      <?php 

        // global $polylang;
        // $post_ids = $polylang->get_translations('post', $post->ID);

        $languages = pll_the_languages(array('raw' => 1, 'hide_current'=> 1 ));
        foreach ($languages as $lang) {
          $locale = $lang['locale'];
          $countrycode = substr($locale, -2);
          echo '<option value="' . $lang['id'] . '" data-class="flag flag-icon-' . strtolower($countrycode) . ' ' .$lang['slug']. '">' . $lang['name'] . '</option>';
        }

      ?>
    </select>
  </div>
  <?php #if ( $user_ID == 1) { ?>
  <a href="<?php echo get_the_title(pll_get_post(123)) ?>">
  <button>
    <?php pll_e('PDF') ?><i class="fa fa-file-pdf-o"></i>
  </button>
  </a>
  <?php #} ?>
  <!--button onClick="window.print()">
    <?php pll_e('Print') ?><i class="fa fa-print"></i>
  </button-->
  <!--
  <a href="/pdf">
  <button id="download">
    <?php pll_e('Download') ?><i class="fa fa-download"></i>
  </button>
  </a>
  -->
  <button class="facebook-share" data-js="facebook-share">
    <?php pll_e('Share') ?><i class="fa fa-facebook"></i>
  </button>
  <button class="twitter-share" data-js="twitter-share">
    <?php pll_e('Tweet') ?><i class="fa fa-twitter"></i>
  </button>
  <a target="_blank" href="https://www.transifex.com/veganpassport/vegan-passport/live/#www.veganpassport.com">
    <button>
      <?php pll_e('Translate-help') ?><i class="fa fa-language"></i>
    </button>
  </a>
  <a target="_blank" href="http://github.com/johannschroeder/veganpassport">
    <button>
      <?php pll_e('Code-help') ?><i class="fa fa-github"></i>
    </button>
  </a>
  <a target="_blank" href="https://www.paypal.me/johannschroeder">
    <button>
      <?php pll_e('Donate') ?><i class="fa fa-paypal"></i>
    </button>
  </a>
  <div class="provider">
    <a href="http://karmaapp.de" target="_blank">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="64px" height="117.625px" viewBox="0 -53.625 64 117.625" enable-background="new 0 -53.625 64 117.625"
   xml:space="preserve">
<g>
  <path fill="#1D1D1B" d="M63.184-14.987c-0.116-0.077-0.235-0.152-0.356-0.22c-0.14-0.079-0.283-0.153-0.425-0.224
    c-0.778-0.391-1.601-0.702-2.515-0.952c-1.011-0.277-1.955-0.422-2.886-0.444c-0.148-0.003-0.297-0.006-0.445-0.006h-0.059
    c-0.721,0.003-1.436,0.084-2.123,0.242c-1.485,0.342-2.823,1.027-3.977,2.035c-0.726,0.634-1.381,1.393-1.95,2.26l-0.002-24.223
    l-0.001-0.125c-0.001-0.082-0.002-0.165,0.001-0.247c0.013-0.357-0.067-0.704-0.246-1.06c-0.565-1.128-1.269-2.119-2.09-2.947
    c-0.72-0.726-1.483-1.266-2.331-1.651c-0.664-0.302-1.35-0.485-2.041-0.545c-0.754-0.067-1.51-0.004-2.244,0.184
    c-0.799,0.204-1.589,0.541-2.347,0.999c-0.163,0.099-0.323,0.204-0.48,0.311c-0.007-0.887-0.014-1.774-0.019-2.661l-0.005-0.84
    c-0.006-1.082-0.013-2.164-0.012-3.246c0-0.51-0.145-0.933-0.445-1.291l-0.077-0.099c-0.522-0.674-1.137-1.309-1.828-1.887
    c-0.739-0.618-1.48-1.09-2.265-1.442c-0.74-0.332-1.448-0.529-2.162-0.602c-0.6-0.061-1.18-0.048-1.731,0.041
    c-0.631,0.102-1.257,0.297-1.859,0.582c-0.76,0.359-1.477,0.852-2.191,1.507c-0.643,0.59-1.193,1.258-1.646,1.834
    c-0.372,0.472-0.532,0.966-0.49,1.478l0,4.45c-0.825-0.515-1.623-0.877-2.434-1.103c-0.937-0.262-1.848-0.332-2.722-0.213
    c-0.609,0.083-1.195,0.25-1.741,0.496c-0.625,0.281-1.226,0.67-1.787,1.158c-0.716,0.623-1.35,1.38-1.996,2.383
    c-0.183,0.283-0.275,0.588-0.274,0.906l-0.002,9.032c-0.634-0.31-1.245-0.546-1.86-0.718c-1.005-0.281-1.949-0.372-2.882-0.278
    c-0.955,0.096-1.853,0.401-2.667,0.906c-0.555,0.344-1.074,0.786-1.54,1.313c-0.676,0.763-1.237,1.687-1.766,2.91
    c-0.015,0.036-0.027,0.075-0.036,0.114c-0.102,0.263-0.102,0.513-0.102,0.734L0.013,24.18C0.007,26.366,0.002,28.551,0,30.737
    c0,0.421,0.001,0.91,0.026,1.397c0.04,0.768,0.094,1.454,0.166,2.098c0.078,0.702,0.176,1.415,0.292,2.117
    c0.19,1.151,0.446,2.334,0.781,3.619c0.384,1.472,0.878,2.974,1.469,4.466c0.968,2.443,2.18,4.73,3.604,6.798
    c1.147,1.665,2.435,3.188,3.828,4.528c1.629,1.568,3.444,2.934,5.394,4.06c2.237,1.292,4.715,2.3,7.363,2.996
    c0.793,0.209,1.613,0.392,2.438,0.545c0.416,0.077,0.875,0.151,1.444,0.232c0.296,0.042,0.594,0.077,0.891,0.112l0.48,0.058
    c0.626,0.078,1.295,0.134,2.105,0.175C31.103,63.98,31.865,64,32.611,64c0.565,0,1.122-0.012,1.657-0.036
    c0.984-0.044,1.952-0.126,2.879-0.244c0.838-0.107,1.656-0.243,2.432-0.405c2.298-0.48,4.472-1.211,6.463-2.174
    c2.02-0.977,3.91-2.217,5.618-3.688c1.582-1.362,3.037-2.947,4.325-4.711c1.376-1.886,2.584-3.999,3.591-6.28
    c1.022-2.316,1.843-4.779,2.442-7.318c0.308-1.306,0.555-2.586,0.735-3.806c0.125-0.844,0.205-1.543,0.252-2.202
    c0.022-0.306,0.024-0.601,0.006-0.901c-0.052-0.903-0.102-1.805-0.15-2.708l-0.222-4.166c-0.024-0.464-0.048-0.928-0.07-1.393
    c-0.036-0.762-0.068-1.524-0.099-2.286l-0.022-0.538c-0.032-0.782-0.064-1.564-0.089-2.347c-0.02-0.637-0.036-1.274-0.053-1.911
    c-0.014-0.561-0.029-1.122-0.045-1.682c-0.063-2.074-0.068-4.195-0.069-6.19c-0.001-1.974,0.005-4.078,0.084-6.186
    c0.023-0.604,0.044-1.208,0.065-1.812l0.071-1.612c0.027-0.475,0.053-0.949,0.083-1.424c0.034-0.537,0.073-1.073,0.117-1.609
    c0.047-0.583,0.099-1.167,0.153-1.75l0.02-0.206c0.045-0.489,0.091-0.978,0.149-1.466c0.064-0.544,0.138-1.088,0.212-1.631
    l0.048-0.353c0.125-0.926,0.28-1.852,0.462-2.751c0.049-0.245,0.104-0.488,0.158-0.731c0.043-0.191,0.086-0.381,0.126-0.572
    C64.105-13.878,63.837-14.551,63.184-14.987z M60.371-12.497l-0.135,0.745c-0.078,0.424-0.155,0.849-0.224,1.274
    c-0.102,0.63-0.192,1.262-0.276,1.895c-0.054,0.404-0.097,0.809-0.141,1.214l-0.029,0.267c-0.062,0.574-0.123,1.147-0.18,1.72
    c-0.033,0.332-0.063,0.664-0.086,0.996l-0.018,0.248c-0.053,0.751-0.106,1.502-0.15,2.253c-0.044,0.744-0.082,1.488-0.12,2.231
    l-0.051,0.973c-0.003,0.052-0.006,0.105-0.006,0.155c-0.011,0.483-0.026,0.966-0.04,1.449c-0.027,0.9-0.056,1.832-0.062,2.752
    c-0.003,0.448-0.008,0.897-0.012,1.345c-0.006,0.562-0.012,1.125-0.015,1.687c-0.003,0.813,0.002,1.626,0.011,2.439l0.002,0.209
    c0.011,1.071,0.023,2.143,0.045,3.214c0.025,1.15,0.06,2.3,0.094,3.449l0.011,0.361c0.027,0.882,0.057,1.765,0.092,2.646
    c0.025,0.655,0.055,1.309,0.085,1.963l0.026,0.575c0.032,0.705,0.064,1.41,0.1,2.115c0.027,0.524,0.056,1.048,0.085,1.572
    l0.224,4.035c0.017,0.338,0.034,0.676,0.055,1.013c0.018,0.299,0.009,0.605-0.026,0.909l-0.006,0.051
    c-0.063,0.55-0.127,1.101-0.206,1.649c-0.1,0.692-0.226,1.411-0.386,2.196c-0.212,1.047-0.476,2.118-0.784,3.18
    c-0.413,1.427-0.865,2.729-1.382,3.978c-1.038,2.507-2.245,4.677-3.692,6.633c-1.556,2.106-3.37,3.9-5.391,5.333
    c-1.362,0.966-2.845,1.784-4.409,2.431c-1.457,0.603-3.015,1.073-4.633,1.398c-0.832,0.168-1.663,0.297-2.467,0.386
    c-0.707,0.078-1.442,0.134-2.185,0.167c-1.015,0.045-2.102,0.042-3.274-0.009c-0.782-0.034-1.576-0.095-2.36-0.181
    c-0.706-0.077-1.276-0.153-1.792-0.239c-0.896-0.15-1.778-0.332-2.621-0.542c-1.676-0.419-3.302-0.991-4.833-1.701
    c-2.148-0.995-4.133-2.288-5.899-3.841c-1.15-1.011-2.221-2.145-3.183-3.371c-1.337-1.703-2.506-3.612-3.474-5.674
    c-0.945-2.013-1.715-4.195-2.287-6.488c-0.215-0.862-0.403-1.767-0.559-2.691c-0.15-0.882-0.264-1.753-0.341-2.587
    c-0.078-0.84-0.116-1.702-0.113-2.562c0.006-1.576,0.01-3.153,0.013-4.729L3.416,3.254C3.423-0.761,3.43-4.776,3.439-8.791
    l0.042-16.918l0-0.079c0-0.045-0.001-0.09,0.003-0.162c0.376-0.846,0.788-1.471,1.297-1.967c0.163-0.159,0.344-0.301,0.537-0.424
    c0.479-0.305,1.008-0.453,1.618-0.453c0.048,0,0.096,0.001,0.144,0.003c0.485,0.018,0.984,0.12,1.523,0.309
    c0.805,0.283,1.58,0.697,2.37,1.264c0.002,0.001,0.003,0.003,0.005,0.004l0.009,1.064c0.008,0.873,0.016,1.747,0.016,2.62
    c-0.001,6.568-0.006,13.136-0.011,19.704c-0.002,1.863-0.005,3.726-0.008,5.589L10.98,5.204c0,0.126-0.001,0.251,0.007,0.375
    c0.047,0.744,0.589,1.367,1.319,1.515c0.752,0.154,1.5-0.213,1.838-0.884c0.112-0.222,0.173-0.454,0.182-0.686
    c0.005-0.112,0.005-0.224,0.005-0.335l0.028-16.589c0.003-1.532,0.006-3.064,0.007-4.597c0.002-2.315,0.003-4.63-0.001-6.946
    c-0.001-0.895-0.006-1.79-0.012-2.685l-0.01-1.933c-0.006-1.621-0.011-3.242-0.012-4.863c-0.002-2.314-0.001-4.629,0-6.944
    l-0.001-0.149c0-0.043-0.002-0.075-0.001-0.102c0.016-0.025,0.039-0.054,0.069-0.095l0.078-0.108
    c0.403-0.559,0.827-0.996,1.296-1.339c0.339-0.248,0.683-0.419,1.054-0.524c0.473-0.135,0.972-0.145,1.496-0.032
    c0.431,0.093,0.861,0.251,1.276,0.467c0.832,0.434,1.61,1.023,2.337,1.779c0,0.019,0,0.037,0,0.055l0,40.748l0,0.103
    c-0.001,0.114-0.001,0.227,0.004,0.341c0.021,0.424,0.167,0.786,0.436,1.078c0.461,0.501,1.088,0.672,1.735,0.476
    c0.666-0.203,1.082-0.706,1.169-1.418c0.012-0.097,0.014-0.197,0.015-0.294c0.001-0.108,0.001-0.215,0.001-0.323v-48.821l0-0.127
    c0-0.09,0.001-0.179-0.003-0.264l0.234-0.273c0.141-0.165,0.282-0.331,0.428-0.492c0.29-0.32,0.631-0.62,1.012-0.894
    c0.339-0.244,0.669-0.426,1.009-0.555c0.646-0.247,1.309-0.284,1.983-0.11c0.341,0.087,0.672,0.219,1.012,0.401
    c0.54,0.29,1.046,0.663,1.548,1.14c0.179,0.171,0.348,0.352,0.517,0.534l0.149,0.16c0.03,0.032,0.057,0.066,0.084,0.101
    c0.002,0.068,0.003,0.135,0.003,0.203l0.23,48.185v0.052c0,0.126,0.001,0.253,0.003,0.381c0.005,0.205,0.041,0.402,0.105,0.583
    c0.256,0.726,0.975,1.19,1.764,1.103c0.867-0.097,1.394-0.796,1.467-1.435c0.022-0.198,0.024-0.395,0.024-0.578l-0.134-27.883
    l-0.049-9.76c-0.001-0.069-0.002-0.139,0-0.209c0.217-0.227,0.464-0.46,0.748-0.708c0.616-0.536,1.165-0.925,1.727-1.224
    c0.416-0.222,0.811-0.376,1.205-0.471c0.818-0.198,1.573-0.096,2.305,0.314c0.328,0.183,0.639,0.415,0.927,0.69
    c0.546,0.52,1.013,1.136,1.43,1.881c0.057,0.101,0.062,0.159,0.06,0.203c-0.004,0.096-0.003,0.193-0.002,0.29l0.001,33.287
    l0.001,1.488c0.001,0.902,0.002,1.804,0,2.705c-0.001,0.342-0.007,0.684-0.013,1.026c-0.006,0.339-0.012,0.679-0.013,1.017
    c-0.002,0.524,0.006,1.049,0.013,1.573l0.004,0.302c0.002,0.145,0.012,0.291,0.03,0.434c0.1,0.81,0.823,1.448,1.653,1.452
    c0.772,0,1.458-0.54,1.63-1.284c0.047-0.2,0.069-0.416,0.067-0.662l-0.002-0.245c-0.004-0.61-0.009-1.22-0.008-1.831V2.835
    c0.001-0.547,0.001-1.095,0.019-1.642c0.018-0.577,0.057-1.16,0.095-1.708c0.03-0.428,0.069-0.854,0.117-1.28
    c0.05-0.451,0.111-0.9,0.174-1.35c0.042-0.295,0.091-0.589,0.14-0.883l0.019-0.114c0.222-1.323,0.553-2.591,0.984-3.768
    c0.359-0.981,0.772-1.816,1.263-2.555c0.32-0.481,0.649-0.888,1.007-1.247c0.424-0.425,0.89-0.778,1.384-1.049
    c0.594-0.326,1.249-0.543,1.948-0.646c0.634-0.094,1.31-0.097,2.026-0.01c0.922,0.112,1.821,0.356,2.774,0.759
    C60.391-12.605,60.381-12.551,60.371-12.497z"/>
  <path fill="#1D1D1B" d="M40.036,15.852c-3.217,0-6.278,1.318-8.473,3.631c-2.196-2.314-5.256-3.631-8.473-3.631
    c-6.449,0-11.696,5.247-11.696,11.697c0,4.127,2.109,7.868,5.624,9.997l14.71,9.897l14.605-10.039c3.381-2.164,5.4-5.848,5.4-9.855
    C51.733,21.099,46.486,15.852,40.036,15.852z M18.873,34.711l-0.062-0.039c-2.524-1.52-4.031-4.183-4.031-7.124
    c0-4.582,3.727-8.309,8.309-8.309c2.874,0,5.506,1.457,7.039,3.896l1.434,2.281l1.434-2.281c1.533-2.44,4.164-3.896,7.039-3.896
    c4.582,0,8.309,3.727,8.309,8.309c0,2.853-1.44,5.474-3.865,7.019l-12.773,8.779L18.873,34.711z"/>
</g>
</svg>      <span><?php pll_e('Karma-gift'); ?></span>
    </a>
  </div>
  <div class="license">
    <img src="<?php echo get_template_directory_uri(); ?>/img/os.svg" alt="Open Source Initiative" title="Open Source Initiative" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/cc.svg" alt="Creative Commons" title="Creative Commons" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/by.svg" alt="By" title="By Johann Schröder" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/nc.svg" alt="Not commercial" title="Not commercial" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/pd.svg" alt="Public Domain" title="Public Domain" />
  </div>
  
  <h2><?php bloginfo('description'); ?></h2>

  <!--div class="provider support">
    <a href="http://polylang.pro" target="_blank">
      <img src="<?php echo get_template_directory_uri(); ?>/img/polylang.png" alt="Polylang"/>
      <span><?php pll_e('Polylang-support'); ?></span>
    </a>
  </div-->

  <br>
</div>
<div class="print-area">
<page id="pdf" size="A4">
  <div class="hint big">
    <i class="fa fa-lightbulb-o red"></i>&nbsp; <?php pll_e('Please-print'); ?>
  </div>
  <page size="Passport">
    <title>
      <?php pll_e('I-eat-strict-vegetarian'); ?>
    </title>
    <content class="front">
        <div>
          <strong class="red subtitle"><?php pll_e('I-do-not-eat-meat'); ?></strong>
          <div class="three-cols">
            <div> <span class="icon icon-meat"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-meat'); ?></strong>
            </div>
            <div>
              <span class="icon icon-fish"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-fish'); ?></strong>
            </div>
            <div>
              <span class="icon icon-honey"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-honey'); ?></strong>
            </div>
          </div>
          <div class="three-cols">
            <div>
              <span class="icon icon-eggs"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-eggs'); ?></strong>
            </div>
            <div>
              <span class="icon icon-milk"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-milk'); ?></strong>
            </div>
            <div>
              <span class="icon icon-butter"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-butter'); ?></strong>
            </div>
          </div>
        </div>
        <div class="hint">
          <strong class="red hint-title"><?php pll_e('Please-dont-use'); ?></strong><br>
          <strong class="hint-text"><?php pll_e('Things-not-to-use'); ?></strong>
        </div>
        <div>
          <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        </div>
        <div class="three-cols">
            <div>
              <span class="icon icon-grains"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Grains'); ?></strong>
            </div>
            <div>
              <span class="icon icon-beans"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Beans'); ?></strong>
            </div>
            <div>
              <span class="icon icon-vegetables"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Vegetables'); ?></strong>
            </div>
        </div>
        <div class="three-cols">
          <div>
            <span class="icon icon-fruits"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Fruits'); ?></strong>
          </div>
          <div>
            <span class="icon icon-nuts"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Nuts'); ?></strong>
          </div>
          <div>
            <span class="icon icon-oil"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Vegetable-oil'); ?></strong>
          </div>
        </div>
    </content>
  </page>
  <page class="backside" size="Passport">
    <content>
      <div>
        <strong class="red subtitle"><?php pll_e('I-do-not-eat-meat'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
          </li>
        </ul>

      </div>
    </content>
  </page>
    <hr>
  <page class="backside" size="Passport">
    <content>
      <div>
        <strong class="red subtitle"><?php pll_e('I-do-not-eat-meat'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-close red"></i> <strong class="hidden"><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check green"></i> <strong class="hidden"><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
          </li>
        </ul>

      </div>
    </content>
  </page>
  <page size="Passport">
    <title>
      <?php pll_e('I-eat-strict-vegetarian'); ?>
    </title>
    <content class="front">
        <div>
          <strong class="red"><?php pll_e('I-do-not-eat-meat'); ?></strong>
          <div class="three-cols">
            <div> <span class="icon icon-meat"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-meat'); ?></strong>
            </div>
            <div>
              <span class="icon icon-fish"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-fish'); ?></strong>
            </div>
            <div>
              <span class="icon icon-honey"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-honey'); ?></strong>
            </div>
          </div>
          <div class="three-cols">
            <div>
              <span class="icon icon-eggs"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-eggs'); ?></strong>
            </div>
            <div>
              <span class="icon icon-milk"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-milk'); ?></strong>
            </div>
            <div>
              <span class="icon icon-butter"><span class="icon-no red"></span></span>
            </div>
            <div>
              <strong class="red"><?php pll_e('No-butter'); ?></strong>
            </div>
          </div>
        </div>
        <div class="hint">
          <strong class="red hint-title"><?php pll_e('Please-dont-use'); ?></strong><br>
          <strong class="hint-text"><?php pll_e('Things-not-to-use'); ?></strong>
        </div>
        <div>
          <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        </div>
        <div class="three-cols">
            <div>
              <span class="icon icon-grains"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Grains'); ?></strong>
            </div>
            <div>
              <span class="icon icon-beans"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Beans'); ?></strong>
            </div>
            <div>
              <span class="icon icon-vegetables"><span class="icon-yes green"></span></span>
            </div>
            <div>
              <strong class="green"><?php pll_e('Vegetables'); ?></strong>
            </div>
        </div>
        <div class="three-cols">
          <div>
            <span class="icon icon-fruits"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Fruits'); ?></strong>
          </div>
          <div>
            <span class="icon icon-nuts"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Nuts'); ?></strong>
          </div>
          <div>
            <span class="icon icon-oil"><span class="icon-yes green"></span></span>
          </div>
          <div>
            <strong class="green"><?php pll_e('Vegetable-oil'); ?></strong>
          </div>
        </div>
    </content>
  </page>
</page>
</div>
<div class="seo noprint">
  <?php the_content(); ?>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php get_footer(); ?>