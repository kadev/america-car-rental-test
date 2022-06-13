<?php if(isset($product)): ?>
    <div class="item">
        <div class="right floated content">
            <label style="margin-right: 1rem;">$<?php echo $product['total'] ?></label>
        </div>
        <div class="content text-bold">
            <img class="ui avatar image" src="<?php echo URL; ?>img/<?php echo $product['image']; ?>">
            <?php echo ucfirst($product['name']); ?> (x<?php echo $product['qty']; ?>)
        </div>
    </div>
<?php endif; ?>