@include('includes.head')
<?php
  $total_doc = $doctors->count();
  $total_pat = $patients->count();
  $total_user = $total_doc + $total_pat;
  if ($total_user === 0 ) {
    $doc_percent = 0;
    $pat_percent = 0;
  } else {
    $doc_percent = $total_doc/$total_user * 100;
    $pat_percent = $total_pat/$total_user * 100;
  }
  if ($total_doc === 0) {
    $approved_percent = 0;
    $pending_percent = 0;
  } else {
    $approved_percent = $approved->count()/$total_doc * 100;
    $pending_percent = $pending->count()/$total_doc * 100;
  }
  $total_app = $total_appointments->count();

  if ($total_app === 0 ) {
    $comp_app_percent = 0;
    $pend_app_percent = 0;
  } else {
    $comp_app_percent = $completed_appointments->count()/$total_app * 100;
    $pend_app_percent = $pending_appointments->count()/$total_app * 100;
  }

?>
<header style="margin-top: -55px">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark fixed-top" style="z-index: 999;">
    <div class="container-fluid">
      <span class="navbar-toggler-icon" id='toggleside'></span>
      <a href='#' class="navbar-brand ml-5">Virtual Clinic</a>
    </div>
  </nav>
  <!--/Navbar-->
</header>

@include('layouts.admin.body')

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script>
  // Animation init
    new WOW().init();
    // Select initiate
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });

    $('#toggleside').click(function() {
        $('#sidebar').toggleClass('togglesidebar');
        $('#space').toggleClass('togglespace');
    });
</script>

<script>
  const tabs = document.querySelectorAll('.tab');
    function samk(e) {
        removeActive();
        hideAll();
        this.parentNode.classList.add('active');
        const target = `#${this.id}-panel`;
        document.querySelector(target).classList.add('show-tab');
    }
    function removeActive() {
        tabs.forEach(tab => tab.parentNode.classList.remove('active'));
    }
    function hideAll() {
        const tabPanel = document.querySelectorAll('.tab-panel');
        tabPanel.forEach(panel => panel.classList.remove('show-tab'));
    }

    tabs.forEach(tab => tab.addEventListener('click', samk));
</script>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>