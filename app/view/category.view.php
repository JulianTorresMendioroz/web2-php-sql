<?php

class CategoryView
{
    
    public function showAllCategories($categories)
    {
        require_once('templates/header.php');
?>
<div class="container mt-5">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Season</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category->id ?></td>
                <td><?php echo $category->name ?></td>
                <td><?php echo $category->season ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
        require_once('templates/footer.php');
    }

    public function showError()
    {
        echo '<div class="alert alert-error">Error! No se han encontrado categorias</div>';
    }
}
