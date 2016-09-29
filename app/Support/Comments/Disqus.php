<?php

namespace Codecasts\Support\Comments;

/**
 * Class Disqus.
 */
class Disqus
{
    /**
     * @param int    $id    Disqus id
     * @param string $title Disqus page title
     *
     * @return \Illuminate\View\View
     */
    public static function display($id, $title)
    {
        return view('core::disqus', [
            'disqus_id'    => $id,
            'disqus_title' => $title,
        ]);
    }
}
