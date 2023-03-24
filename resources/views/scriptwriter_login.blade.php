<!-- message to comfirnm scriptwirter's accont creation  and can be aded any whaer in the code-->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif