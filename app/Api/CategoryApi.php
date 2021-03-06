<?php

namespace Kanboard\Api;

use Kanboard\Core\Base;

/**
 * Category API controller
 *
 * @package  Kanboard\Api
 * @author   Frederic Guillot
 */
class CategoryApi extends Base
{
    public function getCategory($category_id)
    {
        return $this->category->getById($category_id);
    }

    public function getAllCategories($project_id)
    {
        return $this->category->getAll($project_id);
    }

    public function removeCategory($category_id)
    {
        return $this->category->remove($category_id);
    }

    public function createCategory($project_id, $name)
    {
        $values = array(
            'project_id' => $project_id,
            'name' => $name,
        );

        list($valid, ) = $this->categoryValidator->validateCreation($values);
        return $valid ? $this->category->create($values) : false;
    }

    public function updateCategory($id, $name)
    {
        $values = array(
            'id' => $id,
            'name' => $name,
        );

        list($valid, ) = $this->categoryValidator->validateModification($values);
        return $valid && $this->category->update($values);
    }
}
