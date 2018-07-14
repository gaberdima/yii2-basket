<div class="container">
    <table class="table table-striped">
        <tr>
            <th>name</th>
            <th>price</th>
            <th>article</th>
            <th>email</th>
            <th>basket_number</th>
            <th>count</th>
        </tr>

        <?php

        foreach ($order_tov as $x){
        ?><tr>
            <td><?php echo $x['name']; ?></td>
            <td><?php echo $x['price']; ?></td>
            <td><?php echo $x['article']; ?></td>
            <td><?php echo $x['email']; ?></td>
            <td><?php echo $x['basket_number']; ?></td>
            <td><?php echo $x['count']; ?></td>
            <?php

            }

            ?>

    </table>
</div>