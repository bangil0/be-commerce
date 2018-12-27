<?php $scripts = \DB::table('script')->get();?>
@foreach($scripts as $script)
	{!!$script->content!!}
@endforeach

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('essence')}}/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="{{asset('essence')}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('essence')}}/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="{{asset('essence')}}/js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="{{asset('essence')}}/js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="{{asset('essence')}}/js/active.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>