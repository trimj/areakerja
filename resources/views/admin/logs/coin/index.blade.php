@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>Mitra</th>
                <th>Type</th>
                <th>Detail</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($coinLogs as $log)
                    <tr>
                        <td>
                            <a href="{{ route('public.mitra.show', ['mitra' => $log->partner_id]) }}" target="_blank">{{ $log->mitra->user->name }}</a>
                        </td>
                        <td class="text-center text-lg">
                            @if($log->type == 'in')
                                <i class="far fa-plus-square text-success"></i>
                            @elseif($log->type == 'out')
                                <i class="far fa-minus-square text-error"></i>
                            @else
                                <i class="far fa-question-circle text-gray-400"></i>
                            @endif
                        </td>
                        <td>{{ $log->detail }}</td>
                        <td class="flex items-center justify-center space-x-2">
                            @can('view-coin-log')
                                <a href="{{ route('admin.coinlog.show', ['coinLog' => $log->id]) }}" class="btn btn-small btn-secondary" target="_blank"><i class="fas fa-eye"></i></a>
                            @endcan
                            @if($log->trashed() && auth()->user()->can('delete-coin-log'))
                                <form action="{{ route('admin.coinlog.restore', ['coinLog' => $log->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                    @csrf
                                    <button type="submit" class="btn btn-small btn-info"><i class="fas fa-reply"></i></button>
                                </form>
                                <form action="{{ route('admin.coinlog.forceDestroy', ['coinLog' => $log->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-small btn-error"><i class="fas fa-trash"></i></button>
                                </form>
                            @else
                                <form action="{{ route('admin.coinlog.destroy', ['coinLog' => $log->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="100%">Nothing Here</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="text-center">{{ $coinLogs->links() }}</div>
    </section>
@endsection
