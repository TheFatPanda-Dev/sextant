<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebpagesLink;

class WebpagesLinksComponent extends Component
{
    public $webpage_link;

    protected $rules = [
        'webpage_link' => 'required|url',
    ];

    public function store()
    {
        $this->validate();

        $existingLink = WebpagesLink::firstWhere('link', $this->webpage_link);

        if ($existingLink) {
            session()->flash('message', 'Link already in database.');
            session()->flash('messageType', 'info');
        } else {
            WebpagesLink::create(['link' => $this->webpage_link]);
            session()->flash('message', 'Link added successfully.');
            session()->flash('messageType', 'success');
        }

        $this->dispatchBrowserEvent('message-displayed');
    }

    public function render()
    {
        $links = WebpagesLink::paginate(50);

        return view('livewire.webpages-links-component', [
            'links' => $links,
        ]);
    }
}
