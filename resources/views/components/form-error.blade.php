@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-black rounded-md p-4 m-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
