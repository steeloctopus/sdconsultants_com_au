<!-- Add your site or application content here -->
<header>
        <div class="header-top">
            <a href="/"><img class="logo" src="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_logo_1.png" class="logo"/></a>
            <img class="strap-line" src="<?php print base_path(); print path_to_theme()?>/assets/img/sdc_banner.png"/>
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
    <?php print $messages; ?>
    <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>

    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php if ($page['featured']): ?><div id="featured"><?php print render($page['featured']); ?></div><?php endif; ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
    <?php print render($page['after_content']); ?>
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

