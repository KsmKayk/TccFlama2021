@if ($errors->any())
<div class="mt-2 pl-2 pr-2 bg-red-200 opacity-90 border-2 border-red-300 rounded-xl">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="font-main font-light">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
