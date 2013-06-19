<?php foreach ($package as $package_item){ ?>
<ul>
<li><?php echo htmlspecialchars($package_item['package_name']) ?></li>
<li><a href="/index.php/package/edit/<?php echo $package_item['pid']?>">Edit</a></li>
</ul>
<?php } ?>
