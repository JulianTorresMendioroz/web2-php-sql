<?php

class CategoryView
{
    
    public function showAllCategories($categories)
    {
        require_once './templates/category.phtml';
    }

    public function showError()
    {
        require_once './templates/error.phtml';
    }
}
