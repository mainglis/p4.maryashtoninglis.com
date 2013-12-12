<div class="container">
  <?php if($user): ?>
    Hello <?=$user->first_name;?>
  <?php else: ?>
    Welcome, Shift Head!
  <?php endif; ?>
</div>

