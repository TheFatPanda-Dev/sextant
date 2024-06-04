<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebpagesLink;

class WebpagesLinksComponent extends Component
{
    public $confirmingLinkDeletion = false;
    public $linkIdToBeDeleted;
    protected $listeners = ['triggerDelete' => 'confirmDelete'];

    public function render()
    {
        $links = WebpagesLink::paginate(50);

        return view('livewire.webpages-links-component', [
            'links' => $links,
        ]);
    }

    public function delete($id)
    {
        $link = WebpagesLink::find($id);

        if ($link) {
            $link->delete();
            session()->flash('message', 'Link deleted successfully.');
            session()->flash('messageType', 'success');
        } else {
            session()->flash('message', 'Link not found.');
            session()->flash('messageType', 'error');
        }
    }

    public function confirmDelete($id)
    {
        $this->linkIdToBeDeleted = $id;
        $this->confirmingLinkDeletion = true;
    }

    public function deleteLink()
    {
        WebpagesLink::destroy($this->linkIdToBeDeleted);
        $this->confirmingLinkDeletion = false;
        session()->flash('message', 'Link deleted successfully.');
        session()->flash('messageType', 'success');
    }
}
