<?php
  include('header.php');
?>

<!-- form for the taskes which can be chosed -->
<div class="row justify-content-center mt-4">
    <form action="tâches.php" method="post">
        <p class="text-white"><input type="checkbox" name="task[]" value="Wire frame">Wire frame.</p>
        <p class="text-white"><input type="checkbox" name="task[]" value="chemat de bdd">Chemat de bdd.</p>
        <p class="text-white"><input type="checkbox" name="task[]" value="favicon">Favicon.</p>
        <p class="text-white"><input type="checkbox" name="task[]" value="mobile first">Mobile first.</p>
        <input type="submit" name="tasks" value="submit">

      </form>

</div>
