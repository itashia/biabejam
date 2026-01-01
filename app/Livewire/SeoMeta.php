<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SeoMeta extends Component
{
    public Setting $settings;

    public function render()
    {
        return view('components.layouts.seo-meta');
    }
}
