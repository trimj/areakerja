@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th></th>
                <th>Mitra</th>
                <th>Type</th>
                <th>Coins</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($coinLogs as $log)
                    <tr>
                        <td></td>
                        <td>{{ $log->mitra->user->name }}</td>
                        @if(!empty($log->candidate_id))
                            <td>{{ $log->candidate->user->name }}</td>
                        @endif
                        @if(!empty($log->job_id))
                            <td>{{ $log->job->title }}</td>
                        @endif
                        <td>{{ $log->coins }}</td>
                        <td>{{ $log->before }}</td>
                        <td>{{ $log->after }}</td>
                        <td>
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
                                    <button type="submit" class="btn btn-small btn-warning"><i class="fas fa-trash"></i></button>
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
