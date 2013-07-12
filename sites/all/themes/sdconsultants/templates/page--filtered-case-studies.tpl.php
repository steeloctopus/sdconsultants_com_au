<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */

    $logo_number = rand(1,5);
?>
<!-- Add your site or application content here -->
<header>
    <div class="header-top">
        <a href="/"><img class="logo retina-img" src="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_logo_<?php print $logo_number; ?>.png" data-src2x="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_logo_<?php print $logo_number; ?>_2x.png" class="logo" width="91px" height="89px"/></a>
        <img class="strap-line retina-img" src="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_banner.png" data-src2x="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_banner_2x.png" width="390px" height="77px"/>
    </div>
    <div class="header-box"></div>
    <?php if ($page['header']): ?><?php print render($page['header']); ?><?php endif; ?>
</header>
<nav>
    <?php if ($page['sidebar_first']): ?>
        <?php print render($page['sidebar_first']); ?>
    <?php endif; ?>
</nav>

<section class="content">
<section class="case-studies" style="display: block;">
<div class="filtered-case-studies">
<div class="icon <?php print strtolower(str_replace(' ', '-',$title));?> no-top-margin"></div>
<h1><?php print $title?></h1>
<hr class="hr-case-title"/>
<?php print render($page['content']); ?>
</div>
</section>
    <section class="case-study-categories">
        <?php print render($page['after_content']); ?>
    </section>

</section>

<footer>
    <div class="company">
        <h8>Sustainable Development Consultants</h8>
        <p> © All images & content SDC 2013 | Designed by <a href="http://www.groszcolab.com.au">Grosz Co.Lab</a> Built
            by <a href="http://www.steeloctopus.co.uk">Steel Octopus</a></p></div>
    <div class="phone">T: (03) 9882 9967<br/>
        F: (03) 9882 9969 <br/><a href="mailto:info@sdconsultants.com.au">info@sdconsultants.com.au</a>
    </div>
    <div class="po-box">PO Box 478<br/>
        Camberwell VIC 3124
    </div>
    <div class="address">2nd Floor,<br/>555 Riversdale Rd.
    </div>
    <?php if ($page['footer']): ?><?php print render($page['footer']); ?><?php endif; ?>
</footer>

<?php if ($page['page_bottom']): ?><div id="page_bottom"><?php print render($page['page_bottom']); ?></div><?php endif; ?>
<div class="clear"></div>