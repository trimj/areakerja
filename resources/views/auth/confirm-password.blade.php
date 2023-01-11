@extends('templates.auth.page')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="ring ring-areakerja/50 p-10 rounded-xl shadow-lg shadow-areakerja/30">
            <div class="flex items-center justify-center mb-10">
                <div class="font-bold text-3xl">Password Confirmation</div>
            </div>
            <form action="{{ route('password.confirm') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary w-full">Confirm</button>
            </form>
        </div>
    </div>
@endsection
