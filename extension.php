<?php

/*
 * (c) Aleksey Orlov <i.trancer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace More;

use Bolt\BaseExtension;
use Bolt\Content;

class Extension extends BaseExtension
{
    function info()
    {
        return array(
            'name' => "More",
            'description' => "An extension provides capability to break the post into teaser and content sections",
            'keywords' => "bolt, extension, more",
            'author' => "Aleksey Orlov",
            'link' => "https://github.com/axsy/bolt-extension-more",
            'version' => "0.1",
            'required_bolt_version' => "1.0.2",
            'highest_bolt_version' => "1.0.2",
            'type' => "General",
            'first_releasedate' => "2013-03-30",
            'latest_releasedate' => "2013-03-30",
            'dependencies' => "",
            'priority' => 10
        );
    }

    function initialize()
    {
        $this->app['twig']->addFilter('more', new \Twig_SimpleFilter('more', function (Content $content, $field) {
            if (preg_match('/^(.*?)\{#\s*more\s*#\}/ms', $content->values[$field], $matches)) {
                $content = clone $content;
                $content->values[$field] = $matches[1];
            }

            return $content[$field];
        }, array(
            'is_safe' => array('html')
        )));
    }

}