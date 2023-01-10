@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
            <div class="card-group">
                <div class="flex items-center justify-center my-10">
                    <i class="fas fa-coins text-5xl text-areakerja"></i>
                </div>
                <div class="body">
                    <div class="title">10 Coins</div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <div>
                                <div class="name">Rp. {{ number_format($coin->price * 10) }}</div>
                            </div>
                        </div>
                        <div class="another inline-flex">
                            @can('top-up-coin')
                                <form action="{{ route('mitra.topup.proses') }}" method="post" class="space-y-0">
                                    @csrf
                                    <input name="coin" type="hidden" value="10">
                                    <button class="btn btn-small btn-primary">Buy</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="flex items-center justify-center my-10">
                    <i class="fas fa-coins text-5xl text-areakerja"></i>
                </div>
                <div class="body">
                    <div class="title">50 Coins</div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <div>
                                <div class="name">Rp. {{ number_format($coin->price * 50) }}</div>
                            </div>
                        </div>
                        <div class="another inline-flex">
                            @can('top-up-coin')
                                <form action="{{ route('mitra.topup.proses') }}" method="post" class="space-y-0">
                                    @csrf
                                    <input name="coin" type="hidden" value="50">
                                    <button class="btn btn-small btn-primary">Buy</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="flex items-center justify-center my-10">
                    <i class="fas fa-coins text-5xl text-areakerja"></i>
                </div>
                <div class="body">
                    <div class="title">100 Coins</div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <div>
                                <div class="name">Rp. {{ number_format($coin->price * 100) }}</div>
                            </div>
                        </div>
                        <div class="another inline-flex">
                            @can('top-up-coin')
                                <form action="{{ route('mitra.topup.proses') }}" method="post" class="space-y-0">
                                    @csrf
                                    <input name="coin" type="hidden" value="100">
                                    <button class="btn btn-small btn-primary">Buy</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>Invoice</th>
                <th>amount</th>
                <th>Status</th>
                </thead>
                <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <td class="text-center">#{{ $invoice->invoice }}</td>
                        <td class="text-center">{{ $invoice->amount }}</td>
                        <td class="text-center capitalize">{{ $invoice->payment_status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="100%"></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
