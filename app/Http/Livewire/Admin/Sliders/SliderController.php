<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderController extends Component
{
    use WithFileUploads;

    public $rand, $img;

    protected $listeners = ['render'];

    public function mount()
    {
        $this->rand = rand();
    }

    public function render()
    {
        $sliders =  Slider::all();
        return view('livewire.admin.sliders.slider-controller', compact('sliders'))->layout('layouts.admin');
    }

    public function create()
    {
        $this->validate([
            'img' => 'required|image|max:2048',
        ]);

        $this->img = $this->img->store('sliders', 'public');

        Slider::create([
            'url' => $this->img
        ]);

        $this->reset('img');
        $this->emitSelf('render');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        Storage::disk('public/sliders')->delete($slider->url);
        $slider->delete();
        $this->emitSelf('render');
    }

    public function cancel()
    {
        $this->reset('img');
    }
}
