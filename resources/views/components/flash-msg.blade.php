@if (session()->has('success'))
<div class="flash-msg fixed text-s bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close">×</button>    
</div>
@endif


<script type="text/javascript">
    $('.close').click(function(){
        $('.flash-msg').hide();
    })
</script>