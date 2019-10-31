@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <button typel="button" class="close" data-dismiss="alert">x</button>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
