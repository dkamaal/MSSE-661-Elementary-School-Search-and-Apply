<?php
include_once 'header.php';
?>
<!--Search Page for getting ZIP Code and sending ZIP to display.php for displaying school ID, Name and Rating-->
<h1>Search Elementary School!</h1><br><br>

<!--Below Example-Inline Javascript-->
<input type='image' src='graduationcap.gif' width='200' height='200'
      onmouseover="this.src='schoolbuilding.gif'"
      onmouseout="this.src='graduationcap.gif'"><br><br><br>

<script>
  function validate(form) {
    fail = validatezip(form.zip.value)
    if (fail == "") return true
    else {
      alert(fail);
      return false
    }
  }
</script>


<div class="searchbox">
  <div class="tooltip">
    <span class="tooltiptext">Schools available for ZIP 80014, 80015 and 80129</span>
    <form method="post" action="schoollist.php" onsubmit="return validate(this)">
      <input type="text" name="zip" size='12' maxlength="5" placeholder="Enter ZIP Code">
      <input type="submit" name="submit" value="SEARCH">
  </div>
</div>
</div>
</body>

</html>