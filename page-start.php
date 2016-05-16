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
<?php if ( $user_ID == 1) { ?>
  <a href="/pdf">
  <button>
    <?php pll_e('PDF') ?><i class="fa fa-file-pdf-o"></i>
  </button>
  </a>
<?php } ?>
  <button onClick="window.print()">
    <?php pll_e('Print') ?><i class="fa fa-print"></i>
  </button>
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
  <a target="_blank" href="<?php pll_e('Translate-link') ?>">
    <button>
      <?php pll_e('Translate-help') ?><i class="fa fa-language"></i>
    </button>
  </a>
  
  <h2><?php bloginfo('description'); ?></h2>

  <div class="provider support">
    <a href="http://polylang.pro" target="_blank">
      <img src="<?php echo get_template_directory_uri(); ?>/img/polylang.png" alt="Polylang"/>
      <span><?php pll_e('Polylang-support'); ?></span>
    </a>
  </div>

  <div class="provider">
    <a href="http://karmaapp.de" target="_blank">
      <img src="<?php echo get_template_directory_uri(); ?>/img/karma-logo-hand.png" alt="Karma"/>
      <span><?php pll_e('Karma-gift'); ?></span>
    </a>
  </div>

  <div class="license">
    <img src="<?php echo get_template_directory_uri(); ?>/img/cc.svg" alt="Creative Commons" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/by.svg" alt="By" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/nc.svg" alt="Not commercial" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/pd.svg" alt="Public Domain" />
  </div>

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
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
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
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong class="hidden"><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green subtitle"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong class="hidden"><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
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