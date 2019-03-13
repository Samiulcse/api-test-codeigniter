<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2018 - <?php echo date('Y'); ?>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
 

function toasterCall(type,message){

  $.toast({
      text: message, // Text that is to be shown in the toast
      heading: type.toUpperCase(), // Optional heading to be shown on the toast
      icon: type, // Type of toast icon
      showHideTransition: 'slide', // fade, slide or plain
      allowToastClose: true, // Boolean value true or false
      hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
      stack: 10, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
      position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
      textAlign: 'left', // Text alignment i.e. left, right or center
      loader: true, // Whether to show loader or not. True by default
      loaderBg: '#10893E', // Background color of the toast loader
    });

  }

  $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
        
  $(".phonebook_phone").inputFilter(function(value) {
      return /^\d*$/.test(value);
  });

</script>
</body>
</html>