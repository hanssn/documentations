<?php

namespace App\Support;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Storage;

class Page
{
    protected $locale;

    protected $page;

    protected $type;

    protected $disk;

    public function __construct(string $locale, string $type, ?string $page = null)
    {
        $this->locale = $locale;

        $this->type = $type;
        $this->page = $page;

        $this->disk = Storage::disk('content');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function view(string $view)
    {
        $path = "$this->locale/$this->type/$this->page.md";

        abort_if(! $this->disk->exists($path), 404);

        $markdown = Markdown::convert($this->disk->get($path));

        return view($view, [
            'content' => $markdown->getContent(),
            'frontmatter' => method_exists($markdown, 'getFrontMatter') ? $markdown->getFrontMatter() : null,
            'index' => $this->getSidebar(),
        ]);
    }

    public function getSidebar()
    {
        return Markdown::convert($this->disk->get("$this->locale/docs/documentation.md"));
    }
}
