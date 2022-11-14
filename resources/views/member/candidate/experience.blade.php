@extends('templates.public.page')

@section('content')
    @include('templates.member.candidate.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Experience</div>
        <form action="{{ route('member.daftar.kandidat.experience.store') }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0" x-data="handler()">
                <template x-for="(field, index) in fields" :key="index">
                    <div class="flex flex-col md:flex-row items-center space-y-5 lg:space-y-0 space-x-0 md:space-x-5">
                        <div class="flex flex-col space-y-5 w-full">
                            <div class="textbox-group">
                                <label>Job Title</label>
                                <input type="text" x-model="field.txtTitle" x-bind:name="`experience[${index + count}][title]`">
                            </div>
                            <div class="textbox-group">
                                <label>Location</label>
                                <input type="text" x-model="field.txtLoc" x-bind:name="`experience[${index + count}][location]`">
                            </div>
                            <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                                <div class="textbox-group w-full">
                                    <label>From</label>
                                    <input type="month" x-model="field.dateFrom" x-bind:name="`experience[${index + count}][from]`">
                                </div>
                                <div class="textbox-group w-full">
                                    <label>To</label>
                                    <input type="month" x-model="field.dateto" x-bind:name="`experience[${index + count}][to]`">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-error w-full" @click="removeField(index)">&times;</button>
                        </div>
                    </div>
                </template>
                @if (!empty($candidate->experience))
                    @foreach ($candidate->experience as $key => $experience)
                        <div class="flex flex-col md:flex-row items-center space-y-5 lg:space-y-0 space-x-0 md:space-x-5" id="{{ 'exp' . $key }}">
                            <div class="flex flex-col space-y-5 w-full">
                                <div class="textbox-group">
                                    <label>Job Title</label>
                                    <input type="text" x-bind:name="`experience[{{ $key }}][title]`" value="{{ $experience['title'] }}">
                                </div>
                                <div class="textbox-group">
                                    <label>Location</label>
                                    <input type="text" x-bind:name="`experience[{{ $key }}][location]`" value="{{ $experience['location'] }}">
                                </div>
                                <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                                    <div class="textbox-group w-full">
                                        <label>From</label>
                                        <input type="month" x-bind:name="`experience[{{ $key }}][from]`" value="{{ $experience['from'] }}">
                                    </div>
                                    <div class="textbox-group w-full">
                                        <label>To</label>
                                        <input type="month" x-bind:name="`experience[{{ $key }}][to]`" value="{{ $experience['to'] }}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-error w-full" onclick="document.getElementById('{{ 'exp' . $key }}').remove();">&times;</button>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div>
                    <button type="button" class="btn btn-success w-full" @click="addNewField()">Add Row</button>
                </div>
            </div>
            <div class="text-center space-x-2">
                <a href="{{ route('member.daftar.kandidat.certificate.index') }}" class="btn btn-tertiary">Previous Step</a>
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
    <div class="mt-20 md:mt-32 lg:mt-40">
        <img src="{{ asset('assets/member/kandidat/daftar-kandidat.png') }}" alt="Daftar Kandidat" class=" w-[50%]">
    </div>
@endsection
@section('footerJS')
    <script>
        function handler() {
            return {
                fields: [],
                count: {{ !empty($candidate->experience) ? count($candidate->experience) : 0 }},
                addNewField() {
                    this.fields.push({
                        txtTitle: '',
                        txtLoc: '',
                        dateFrom: '',
                        dateTo: '',
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
@endsection
