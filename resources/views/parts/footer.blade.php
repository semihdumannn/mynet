</div> <!--app bitişi-->
<!-- ================================================
  Scripts
  ================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="{{asset('cms/js/plugins/jquery-1.11.2.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('cms/js/materialize.js')}}"></script>
<!--prism-->
<script type="text/javascript" src="{{asset('cms/js/plugins/prism/prism.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('cms/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('cms/js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('cms/js/custom-script.js')}}"></script>
@yield('page_js')
@if(session()->has('message'))
    <script>
        Materialize.toast('{{session()->get('message')}}', 4000)
    </script>
@endif
</body>

</html>
