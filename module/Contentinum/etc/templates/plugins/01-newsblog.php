<?php
return array(
    'plugins' => array(
        'none' => array(
            'name' => 'No template'
        ),
        
        'news' => array(
            'viewhelper' => 'news',
            'key' => 'newsblog',
            'name' => 'Standard news or blog template',
            'teaserLandscapeSize' => '250',
            'teaserPortraitSize' => '250',
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
        
                     
                ),
                'elements' => array(
                    'sendmail' => array('icon' => '<i class="fa fa-envelope" aria-hidden="true"> </i>', 'href' => '/emailrecom', 'attr' => array('title' => 'Diesen Artikel als Link versenden', 'class' => 'initmodal', 'data-reveal-id' => 'recomendModal')),
                    'pdf' => array('icon' => '<i class="fa fa-download" aria-hidden="true"> </i>', 'href' => '/pdf/blog', 'attr' => array('title' => 'Diesen Artikel als PDF herunterladen', 'target' => '_blank')),
                    'facebook' => array('icon' => '<i class="fa fa-facebook" aria-hidden="true"> </i>', 'href' => 'http://www.facebook.com/share.php', 'attr' => array('title' => 'Diesen Artikel auf Facebook liken','target' => '_blank')),
                ),
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news'
                    )
                )
            ),
            'news' => array(
                'grid' => array(
                    'element' => 'article',
                    'attr' => array(
                        'class' => 'news-article'
                    )
                )
            ),
            'header' => array(
                'grid' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
        
            'groupheadline' => array(
                'grid' => array(
                    'element' => 'h1',
                    'attr' => array(
                        'class' => 'news-group-headline'
                    ),
                     
                ),
            ),
        
            'headline' => array(
                'grid' => array(
                    'element' => 'h2',
                    'attr' => array(),
                     
                ),
            ),
        
            'publishDate' => array(
                'grid' => array(
                    'format' => array('dateFormat' => array( 'attr' => 'FULL')),
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'news-date'
                    ),
                ),
            ),
        
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-imageitem news-media'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-imagecaption'
                    )
                )
            ),
        
            'mediateaserleft' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'mediateaserright' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'footer' => array(
                'grid' => array(
                    'element' => 'footer',
                    'attr' => array(
                        'class' => 'news-article-footer'
                    )
                )
            ),
            'publishAuthor' => array(
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'news-article-author'
                    ),
                    'content:before' => ', '
        
                )
            ),
        
            'labelReadMore' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-readmore'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            ),
            'backlink' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-back'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            )
        
        
        
        ),   
        
        
        'newsactual' => array(
            'viewhelper' => 'newsactual',
            'key' => 'newsactual',
            'name' => 'Aktuelle Nachrichten (untereinander)',
            'teaserLandscapeSize' => '250',
            'teaserPortraitSize' => '250',
        
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news'
                    )
                )
            ),
            'news' => array(
                'grid' => array(
                    'element' => 'article',
                    'attr' => array(
                        'class' => 'news-article'
                    )
                )
            ),
            'header' => array(
                'grid' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
        
            'groupheadline' => array(
                'grid' => array(
                    'element' => 'h1',
                    'attr' => array(
                        'class' => 'news-group-headline'
                    ),
                     
                ),
            ),
        
            'headline' => array(
                'grid' => array(
                    'element' => 'h2',
                    'attr' => array(),
                     
                ),
            ),
        
            'publishDate' => array(
                'grid' => array(
                    'format' => array('dateFormat' => array( 'attr' => 'FULL')),
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'news-date'
                    ),
                ),
            ),
        
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-imageitem news-media'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-imagecaption'
                    )
                )
            ),
        
            'mediateaserleft' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'mediateaserright' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'footer' => array(
                'grid' => array(
                    'element' => 'footer',
                    'attr' => array(
                        'class' => 'news-article-footer'
                    )
                )
            ),
            'publishAuthor' => array(
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'news-article-author'
                    ),
                    'content:before' => ', '
        
                )
            ),
        
            'labelReadMore' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-readmore'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            ),
            'backlink' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-back'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            )
        
        
        
        ),        
        

        'newsactualgrid' => array(
            'viewhelper' => 'newsactual',
            'key' => 'newsactual',
            'name' => 'Aktuelle Nachrichten (Blockgrid)',
            'teaserLandscapeSize' => '250',
            'teaserPortraitSize' => '250',
            'displayimage' => 'no',

        
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-2',
                    ),
                ),                
            ),
            'news' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'grid element',
                    ),
                ),                
                'grid' => array(
                    'element' => 'article',
                    'attr' => array(
                        'class' => 'news-article'
                    )
                ),                
            ),
            'header' => array(
                'grid' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
        
            'groupheadline' => array(
                'grid' => array(
                    'element' => 'h1',
                    'attr' => array(
                        'class' => 'news-group-headline'
                    ),
                     
                ),
            ),
        
            'headline' => array(
                'grid' => array(
                    'element' => 'h2',
                    'attr' => array(),
                     
                ),
            ),
        
            'publishDate' => array(
                'grid' => array(
                    'format' => array('dateFormat' => array( 'attr' => 'FULL')),
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'news-date'
                    ),
                ),
            ),
        
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-imageitem news-media'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-imagecaption'
                    )
                )
            ),
        
            'mediateaserleft' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'mediateaserright' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
        
            'footer' => array(
                'grid' => array(
                    'element' => 'footer',
                    'attr' => array(
                        'class' => 'news-article-footer'
                    )
                )
            ),
            'publishAuthor' => array(
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'news-article-author'
                    ),
                    'content:before' => ', '
        
                )
            ),
        
            'labelReadMore' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-readmore'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            ),
            'backlink' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-back'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            )
        
        
        
        ),        
        
        )
);