@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>Attribute</th>
                <th>Value</th>
                </thead>
                <tbody>
                <tr>
                    <td>Mitra</td>
                    <td>
                        <a href="{{ route('public.mitra.show', ['mitra' => $log->partner_id]) }}" target="_blank">{{ $log->mitra->user->name }}</a>
                    </td>
                </tr>
                <tr>
                    <td>Total Coins</td>
                    <td>{{ $log->mitra->coins }}</td>
                </tr>
                @if(!empty($log->candidate_id))
                    <tr>
                        <td>Candidate</td>
                        <td>{{ $log->candidate->user->name }}</td>
                    </tr>
                @else
                    <tr>
                        <td>Job Vacancy</td>
                        <td>
                            <a href="{{ route('public.lowongan.showWithSlug', ['slug', $log->job->slug]) }}" target="_blank">{{ $log->job->title }}</a>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>Total Coins</td>
                    <td>
                        @if($log->type == 'in')
                            <i class="far fa-plus-square text-success"></i>
                        @elseif($log->type == 'out')
                            <i class="far fa-minus-square text-error"></i>
                        @else
                            <i class="far fa-question-circle text-gray-400"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Before</td>
                    <td>{{ $log->before }}</td>
                </tr>
                <tr>
                    <td>After</td>
                    <td>{{ $log->after }}</td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td>{{ $log->detail }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
