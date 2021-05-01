<div class="card card-primary">
    @if (Session::has('success'))
        <h3 class="card-header" style="background: green;""> {{ Session::get('success') }}</h3>
 @endif
            @if (Session::has('error'))

                <h3 class="card-header" style="background: red;"> {{ Session::get('error') }}</h3>

            @endif
</div>