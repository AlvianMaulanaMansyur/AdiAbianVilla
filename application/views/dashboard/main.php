<!DOCTYPE html>
<?php $this->load->view($header); ?>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php $this->load->view($navbar); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <?php $this->load->view($sidebar)?>
        <div class="main-panel">
        <?php $this->load->view($content)?>  
         
      <?php $this->load->view($footer)?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php $this->load->view($script)?>
  </body>
</html>