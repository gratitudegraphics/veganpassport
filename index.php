<?php get_header(); ?>

<div class="page-title">
	<h1><?php bloginfo('name'); ?></h1>
	<h4><?php bloginfo('description'); ?></h4>
	<ul><?php pll_the_languages();?></ul>
	<?php pll_the_languages(array('dropdown'=>1));  ?>
</div>

<page size="A4">
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
          <strong class="green"><?php pll_e('I-eat-plant-products'); ?></strong>
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
        <strong class="red"><?php pll_e('I-do-not-eat-meat'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
          </li>
        </ul>

      </div>
    </content>
  </page>
    <hr>
  <page class="backside" size="Passport">
    <content>
      <div>
        <strong class="red"><?php pll_e('I-do-not-eat-meat'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-meat'); ?></strong> <i><?php pll_e('Meat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-minced-beef'); ?></strong> <i><?php pll_e('Minced-beef-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-poultry'); ?></strong> <i><?php pll_e('Poultry-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-seafood'); ?></strong> <i><?php pll_e('Seafood-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-dairy'); ?></strong> <i><?php pll_e('Dairy-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-fat'); ?></strong> <i><?php pll_e('Animal-fat-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-products'); ?></strong> <i><?php pll_e('Animal-products-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-ban red"></i> <strong><?php pll_e('No-animal-flavors'); ?></strong> <i><?php pll_e('Animal-flavors-samples'); ?></i>
          </li>
        </ul>
      </div>
      <div>
        <strong class="green"><?php pll_e('I-eat-plant-products'); ?></strong>
        <ul>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Grains'); ?></strong> <i><?php pll_e('Grains-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Beans'); ?></strong> <i><?php pll_e('Beans-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Vegetables'); ?></strong> <i><?php pll_e('Vegetables-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Leafy-greens'); ?></strong> <i><?php pll_e('Leafy-greens-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Fruits'); ?></strong> <i><?php pll_e('Fruits-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Nuts'); ?></strong> <i><?php pll_e('Nuts-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Vegetable-oil'); ?></strong> <i><?php pll_e('Vegetable-oil-samples'); ?></i>
          </li>
          <li>
            <i class="fa fa-check-circle-o green"></i> <strong><?php pll_e('Spices'); ?></strong> <i><?php pll_e('Spices-samples'); ?></i>
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
          <strong class="green"><?php pll_e('I-eat-plant-products'); ?></strong>
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php get_footer(); ?>
