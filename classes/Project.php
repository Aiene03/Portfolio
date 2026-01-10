<?php
/**
 * Project Class
 * Represents a portfolio project
 */

class Project {
    public $title;
    public $description;
    public $image;
    public $technologies;
    public $githubLink;

    public function __construct($title, $description, $image, $technologies, $githubLink) {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->technologies = $technologies;
        $this->githubLink = $githubLink;
    }

    public function render() {
        $techHtml = '';
        foreach ($this->technologies as $tech) {
            $techHtml .= "<span class='px-2 py-1 bg-slate-100 text-slate-700 rounded text-xs'>$tech</span>";
        }

        return "
        <div class='card overflow-hidden group'>
            <div class='relative overflow-hidden aspect-video'>
                <img src='{$this->image}' alt='{$this->title}' class='w-full h-full object-cover group-hover:scale-105 transition-transform duration-300' loading='lazy'>
            </div>
            <div class='p-6'>
                <h3 class='text-xl text-slate-900 mb-2 font-medium'>{$this->title}</h3>
                <p class='text-slate-600 mb-4 text-sm'>{$this->description}</p>
                <div class='flex flex-wrap gap-2 mb-6'>
                    $techHtml
                </div>
                <a href='{$this->githubLink}' target='_blank' class='btn-outline w-full justify-center text-sm py-2'>
                    <i data-lucide='github' class='w-4 h-4 mr-2'></i> View Code
                </a>
            </div>
        </div>";
    }
}
?>
