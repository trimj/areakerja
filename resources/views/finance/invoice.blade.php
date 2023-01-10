@extends('templates.finance.page')

@section('content')
    <div class="">
        <h1 class="text-xs font-bold ml-2 mb-5">INVOICE LIST</h1>
        <div class="flex flex-wrap">
            @foreach($invoice as $data)
            <a href="{{route('finance.invoice.show', $data->id)}}" class="text-black hover:text-black">
                <div class="w-24.4rem bg-white px-4 py-5 text-sm m-2">
                    <div class="flex flex-row">
                        <div class="flex flex-col text-center mx-7">
                            <img class="rounded-full w-11 m-auto" src="{{asset('assets/finance/dummy.svg')}}" alt="">
                            <p class="mb-5">{{$data->partner->user->name}}</p>
                        </div>
                        <div class="flex flex-col flex-grow relative px-3">
                            <p>Invoice #123456</p>
                            <p>{{$data->logkoin->type}}</p>
                            <p class="absolute bottom-0"><i class="fa-regular fa-money-bill-1 mr-2"></i>{{$data->amount}} <i
                                    class="fa-solid fa-calendar-days mr-2 ml-4"></i> {{$data->created_at}}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            
        </div>
    </div>
@endsection

@section('footerJS')
@endsection
