<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2018 &copy; SEGACY</a> </div>
</div>

<!--end-Footer-part-->

<script src="<?php echo base_url(); ?>res/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>res/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>res/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>res/js/matrix.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>