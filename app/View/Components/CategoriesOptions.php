<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoriesOptions extends Component
{
    /**
     * Create a new component instance.
     */
    public mixed $selectedCategoryId;

    public function __construct($selectedCategoryId = null)
    {
        $this->selectedCategoryId = $selectedCategoryId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::all();

        // return selected category name and id as an array or the first category if not selected
        $selectedCategory = $this->selectedCategoryId ? $categories->find($this->selectedCategoryId)->only(['id', 'name']) : $categories->first()->only(['id', 'name']);

        return view('components.categories-options', compact('categories', 'selectedCategory'));
    }
}
