<?php 

namespace Novay\CMS\Views;

use Illuminate\View\Component;

class CmsLayout extends Component
{
    public function render()
    {
        return view('cms::app');
    }
}
