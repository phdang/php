<?php
if ($page_number) { ?>
<script>
      var obj = document.getElementById('page<?= $page ?>');
      obj.setAttribute("class","active");
      const appendPoint = <?= $page+1?>;
      const pageDisplay = 9
      for (var i = Math.max(appendPoint,pageDisplay+1);i <= <?= $page_number?>;i++) {
        obj = document.getElementById('page' + i);
        obj.remove();
      }
      for (var i=1;i<=appendPoint-pageDisplay;i++) {
        obj = document.getElementById('page' + i);
        obj.remove();
      }
</script>
<?php
} else { ?>
<script>
var obj = document.getElementById('first');
obj.setAttribute("class","disabled");
obj = document.getElementById('last');
obj.setAttribute("class","disabled");
</script>
<?php
}
?>
