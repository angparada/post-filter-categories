<div class="post-category-filter">
    <div class="post-filters-container">
        <div class="post-filter-search">
            <div class="filter-search-input">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" id="pf-search-input" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo __('Search', ''); ?>" required />
                <button type="submit">
                    <span><?php echo __('Search', ''); ?> </span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <mask id="mask0_380_10457" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_380_10457)">
                                <path d="M18.9 20.3L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.146 15.371 4.888 14.113C3.62933 12.8543 3 11.3167 3 9.5C3 7.68333 3.62933 6.14567 4.888 4.887C6.146 3.629 7.68333 3 9.5 3C11.3167 3 12.8543 3.629 14.113 4.887C15.371 6.14567 16 7.68333 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L20.325 18.925C20.5083 19.1083 20.6 19.3333 20.6 19.6C20.6 19.8667 20.5 20.1 20.3 20.3C20.1167 20.4833 19.8833 20.575 19.6 20.575C19.3167 20.575 19.0833 20.4833 18.9 20.3ZM9.5 14C10.75 14 11.8127 13.5627 12.688 12.688C13.5627 11.8127 14 10.75 14 9.5C14 8.25 13.5627 7.18733 12.688 6.312C11.8127 5.43733 10.75 5 9.5 5C8.25 5 7.18733 5.43733 6.312 6.312C5.43733 7.18733 5 8.25 5 9.5C5 10.75 5.43733 11.8127 6.312 12.688C7.18733 13.5627 8.25 14 9.5 14Z" fill="#383838" />
                            </g>
                        </svg></i>
                </button>
            </form>
            </div>
        </div>
        <div class="post-filters-categories">
            <ul>
                <li><a href="#" class="filter-item active" data-term="all"><?php echo __('Todos'); ?></a></li>
                <?php if ($terms) : ?>
                    <?php foreach ($terms as $term) : ?>
                        <li><a href="#" class="filter-item" data-term="<?php echo esc_attr($term->slug); ?>"><?php echo $term->name; ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="post-filters-order">
            <button type="button" class="filter-order-buttom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <mask id="mask0_374_9471" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect x="24" width="24" height="24" transform="rotate(90 24 0)" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_374_9471)">
                        <path d="M6 14L7.45 12.6L11 16.15V4H13V16.15L16.55 12.6L18 14L12 20L6 14Z" fill="#004236" />
                    </g>
                </svg>
            </button>
            <ul>
                <li>
                    <label for="order"><?php echo esc_html__('Modificado por última vez'); ?></label> 
                    <input type="radio" name="order" value="modified" />
                </li>
                <li>
                    <label for="order"><?php echo esc_html__('De la A la Z'); ?></label>
                    <input type="radio" name="order" value="title_asc" />
                </li>
                <li>
                    <label for="order"><?php echo esc_html__('De la Z la A'); ?></label>
                    <input type="radio" name="order" value="title_desc" />
                </li>
                <li>
                    <label for="order"><?php echo esc_html__('Creación más antigua'); ?></label>
                    <input type="radio" name="order" value="ASC" />
                </li>
                <li>
                    <label for="order"><?php echo esc_html__('Creación más reciente'); ?></label>
                    <input type="radio" name="order" value="date" />
                </li>
            </ul>
        </div>
        <div class="post-filters-tag">
            <button type="button" class="fiter-tag-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <mask id="mask0_380_10113" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect width="24" height="24" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_380_10113)">
                        <path d="M11 21V15H13V17H21V19H13V21H11ZM3 19V17H9V19H3ZM7 15V13H3V11H7V9H9V15H7ZM11 13V11H21V13H11ZM15 9V3H17V5H21V7H17V9H15ZM3 7V5H13V7H3Z" fill="#004236" />
                    </g>
                </svg>
            </button>
        </div>
    </div>
    <div class="recent-post">
        <div class="recent-post-heading">
            <?php $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><mask id="mask0_380_10117" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="33" height="32"><rect x="0.304688" width="32" height="32" fill="#D9D9D9"/></mask><g mask="url(#mask0_380_10117)"><path d="M5.63835 26.6667C4.90501 26.6667 4.27746 26.4058 3.75568 25.884C3.23301 25.3614 2.97168 24.7334 2.97168 24V8.00004C2.97168 7.26671 3.23301 6.63915 3.75568 6.11737C4.27746 5.59471 4.90501 5.33337 5.63835 5.33337H12.5383C12.8939 5.33337 13.233 5.40004 13.5557 5.53337C13.8775 5.66671 14.1606 5.8556 14.405 6.10004L16.305 8.00004H26.9717C27.705 8.00004 28.333 8.26137 28.8557 8.78404C29.3775 9.30582 29.6383 9.93337 29.6383 10.6667V15C29.2383 14.7112 28.8161 14.4667 28.3717 14.2667C27.9272 14.0667 27.4606 13.8889 26.9717 13.7334V10.6667H5.63835V24H15.0717C15.1383 24.4667 15.2383 24.9223 15.3717 25.3667C15.505 25.8112 15.6717 26.2445 15.8717 26.6667H5.63835ZM24.305 25.3334C25.0383 25.3334 25.6663 25.0725 26.189 24.5507C26.7108 24.028 26.9717 23.4 26.9717 22.6667C26.9717 21.9334 26.7108 21.3058 26.189 20.784C25.6663 20.2614 25.0383 20 24.305 20C23.5717 20 22.9437 20.2614 22.421 20.784C21.8992 21.3058 21.6383 21.9334 21.6383 22.6667C21.6383 23.4 21.8992 24.028 22.421 24.5507C22.9437 25.0725 23.5717 25.3334 24.305 25.3334ZM24.0383 29.3334C23.7272 29.3334 23.4552 29.2334 23.2223 29.0334C22.9886 28.8334 22.8383 28.5778 22.7717 28.2667L22.5717 27.3334C22.305 27.2223 22.0552 27.1058 21.8223 26.984C21.5886 26.8614 21.3495 26.7112 21.105 26.5334L20.1383 26.8334C19.8495 26.9223 19.5663 26.9112 19.289 26.8C19.0108 26.6889 18.7939 26.5112 18.6383 26.2667L18.3717 25.8C18.2161 25.5334 18.1606 25.2445 18.205 24.9334C18.2495 24.6223 18.3939 24.3667 18.6383 24.1667L19.3717 23.5334C19.3272 23.2667 19.305 22.9778 19.305 22.6667C19.305 22.3556 19.3272 22.0667 19.3717 21.8L18.6383 21.1667C18.3939 20.9667 18.2495 20.7165 18.205 20.416C18.1606 20.1165 18.2161 19.8334 18.3717 19.5667L18.6717 19.0667C18.8272 18.8223 19.0383 18.6445 19.305 18.5334C19.5717 18.4223 19.8495 18.4112 20.1383 18.5L21.105 18.8C21.3495 18.6223 21.5886 18.472 21.8223 18.3494C22.0552 18.2276 22.305 18.1112 22.5717 18L22.7717 17.0334C22.8383 16.7223 22.9886 16.472 23.2223 16.2827C23.4552 16.0943 23.7272 16 24.0383 16H24.5717C24.8828 16 25.1548 16.1 25.3877 16.3C25.6215 16.5 25.7717 16.7556 25.8383 17.0667L26.0383 18C26.305 18.1112 26.5552 18.2276 26.789 18.3494C27.0219 18.472 27.2606 18.6223 27.505 18.8L28.4717 18.5C28.7606 18.4112 29.0441 18.4223 29.3223 18.5334C29.5997 18.6445 29.8161 18.8223 29.9717 19.0667L30.2383 19.5334C30.3939 19.8 30.4495 20.0889 30.405 20.4C30.3606 20.7112 30.2161 20.9667 29.9717 21.1667L29.2383 21.8C29.2828 22.0667 29.305 22.3556 29.305 22.6667C29.305 22.9778 29.2828 23.2667 29.2383 23.5334L29.9717 24.1667C30.2161 24.3667 30.3606 24.6169 30.405 24.9174C30.4495 25.2169 30.3939 25.5 30.2383 25.7667L29.9383 26.2667C29.7828 26.5112 29.5717 26.6889 29.305 26.8C29.0383 26.9112 28.7606 26.9223 28.4717 26.8334L27.505 26.5334C27.2606 26.7112 27.0219 26.8614 26.789 26.984C26.5552 27.1058 26.305 27.2223 26.0383 27.3334L25.8383 28.3C25.7717 28.6112 25.6215 28.8614 25.3877 29.0507C25.1548 29.2392 24.8828 29.3334 24.5717 29.3334H24.0383Z" fill="#1C1B1F"/></g></svg>'; ?>
    
            <?php printf('<h2><span>%s</span> %s</h2>', $svg, esc_html__('Recientes', '')); ?>
        </div>
        <div class="recent-post-body">
            <div class="swiper">
                <div class="top-navigation">
                    <div class="swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                            <mask id="mask0_380_10129" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="33" height="32">
                                <rect x="32.3047" y="32" width="32" height="32" transform="rotate(180 32.3047 32)" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_380_10129)">
                                <path d="M20.7046 8.93323C20.9491 9.17767 21.0713 9.48878 21.0713 9.86656C21.0713 10.2443 20.9491 10.5555 20.7046 10.7999L15.5046 15.9999L20.7046 21.1999C20.9491 21.4443 21.0713 21.7554 21.0713 22.1332C21.0713 22.511 20.9491 22.8221 20.7046 23.0666C20.4602 23.311 20.1491 23.4332 19.7713 23.4332C19.3935 23.4332 19.0824 23.311 18.838 23.0666L12.7046 16.9332C12.5713 16.7999 12.4766 16.6554 12.4206 16.4999C12.3655 16.3443 12.338 16.1777 12.338 15.9999C12.338 15.8221 12.3655 15.6554 12.4206 15.4999C12.4766 15.3443 12.5713 15.1999 12.7046 15.0666L18.838 8.93323C19.0824 8.68878 19.3935 8.56656 19.7713 8.56656C20.1491 8.56656 20.4602 8.68878 20.7046 8.93323Z" fill="#1C1B1F" />
                            </g>
                        </svg></div>
                    <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                            <mask id="mask0_380_10126" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="33" height="32">
                                <rect x="0.304688" width="32" height="32" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_380_10126)">
                                <path d="M11.9048 23.0668C11.6603 22.8223 11.5381 22.5112 11.5381 22.1334C11.5381 21.7557 11.6603 21.4445 11.9048 21.2001L17.1048 16.0001L11.9048 10.8001C11.6603 10.5557 11.5381 10.2446 11.5381 9.86677C11.5381 9.48899 11.6603 9.17788 11.9048 8.93344C12.1492 8.68899 12.4603 8.56677 12.8381 8.56677C13.2159 8.56677 13.527 8.68899 13.7714 8.93344L19.9048 15.0668C20.0381 15.2001 20.1328 15.3446 20.1888 15.5001C20.2439 15.6557 20.2714 15.8223 20.2714 16.0001C20.2714 16.1779 20.2439 16.3446 20.1888 16.5001C20.1328 16.6557 20.0381 16.8001 19.9048 16.9334L13.7714 23.0668C13.527 23.3112 13.2159 23.4334 12.8381 23.4334C12.4603 23.4334 12.1492 23.3112 11.9048 23.0668Z" fill="#1C1B1F" />
                            </g>
                        </svg></div>
                </div>
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php foreach ($posts as $post) : ?>
                        <div class="swiper-slide">
                            <div class="swiper-image">
                                <img src="https://placehold.co/285x220?text=<?php echo $post->post_title; ?>" alt="<?php echo $post->post_title; ?>">
                            </div>
                            <div class="swiper-content">
                                <div class="swiper-heading">
                                    <h4><?php echo wp_trim_words($post->post_title, 2, '...'); ?></h4>
                                    <?php $author_id = get_post_field('post_author', $post->ID); ?>
                                    <p><?php echo get_the_author_meta('display_name', $author_id); ?></p>
                                </div>
                                <div class="swiper-date">
                                    <?php $content = $post->post_content; ?>
                                    <?php $word_count = str_word_count(strip_tags($content)); ?>
                                    <?php $words_per_minute = 200; ?>
                                    <?php $reading_time = ceil($word_count / $words_per_minute); ?>
                                    <span><?php echo  $reading_time; ?> min</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
    <div id="post-filter-content" class="post-filter-content">
    
        <?php if ($terms) : ?>
            <?php foreach ($terms as $parent) : ?>
                <?php $childs = get_term_children($parent->term_id, 'category'); ?>
                <?php $categoryIcon = get_term_meta($parent->term_id, 'image', true); ?>
                <?php if ($categoryIcon) : ?>
                    <?php $icon = sprintf('<span>%s</span>', wp_get_attachment_image($categoryIcon, 'thumbnail')); ?>
                <?php else : ?>
                    <?php $icon = ''; ?>
                <?php endif; ?>
                <article class="category-item category-item-<?php echo $parent->term_id; ?>">
                    <div class="category-heading">
                        <h2><?php echo $icon; ?> <?php echo $parent->name; ?></h2>
                        <a href="<?php echo get_category_link($parent->term_id); ?>" class="category-link"><?php echo __('Ver todo'); ?> <i class="icon"><?php echo $iconSVG; ?></i></a>
                    </div>
                    <?php if ($childs) : ?>
                        <div class="category-body">
                            <?php foreach ($childs as $child) : ?>
                                <?php $category =  get_term($child, 'category'); ?>
                                <?php $image = get_term_meta($category->term_id, 'image', true); ?>
                                <div class="item">
                                    <?php if ($image) : ?>
                                        <a href="<?php echo get_category_link($child)?>" class="category-image"><?php echo wp_get_attachment_image($image); ?></a>
                                    <?php else : ?>
                                        <a href="<?php echo get_category_link($child)?>" class="category-image"><img src="https://placehold.co/116x100" alt="<?php echo $category->name; ?>" width="116" height="100" /></a>
                                    <?php endif; ?>
                                    <h4><?php echo $category->name; ?></h4>
                                    <span><?php echo $category->count; ?> <?php echo ($category->count === 1) ? __('archivo') : __('archivos'); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>