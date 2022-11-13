<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside id="sidebar">
            <ul class="sidebar-items">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </ul>
        </aside>
<?php endif; ?>