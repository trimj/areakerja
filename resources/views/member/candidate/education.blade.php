@extends('templates.public.page')

@section('content')
    @include('templates.member.candidate.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Education</div>
        <form action="{{ route('member.daftar.kandidat.education.index') }}" method="post">
            @csrf
            @method('put')
            @error('education')
            <div class="alert alert-error">Mohon isi pendidikan Anda, minimal pendidikan terakhir.</div>
            @enderror
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0" x-data="handler()">
                <template x-for="(field, index) in fields" :key="index">
                    <div class="flex items-center space-x-2 control-group">
                        <div class="flex flex-col space-y-2 w-full">
                            <div class="textbox-group">
                                <label>Education</label>
                                <input type="text" x-model="field.txtEdu" x-bind:name="`education[${index + count}][name]`">
                            </div>
                            <div class="textbox-group">
                                <label>Location</label>
                                <input type="text" x-model="field.txtLoc" x-bind:name="`education[${index + count}][location]`">
                            </div>
                            <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                                <div class="textbox-group w-full">
                                    <label>Start</label>
                                    <input type="month" x-model="field.dateFrom" x-bind:name="`education[${index + count}][from]`">
                                </div>
                                <div class="textbox-group w-full">
                                    <label>End</label>
                                    <input type="month" x-model="field.dateTo" x-bind:name="`education[${index + count}][to]`">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-error" @click="removeField(index)">&times;</button>
                        </div>
                    </div>
                </template>
                @if (!empty($candidate->education))
                    @foreach ($candidate->education as $key => $education)
                        <div class="flex items-center space-x-2 control-group" id="{{ 'edu' . $key }}">
                            <div class="flex flex-col space-y-5 w-full">
                                <div class="textbox-group">
                                    <label>Education</label>
                                    <input type="text" x-bind:name="`education[{{ $key }}][name]`" value="{{ $education['name'] }}">
                                </div>
                                <div class="textbox-group">
                                    <label>Location</label>
                                    <input type="text" x-bind:name="`education[{{ $key }}][location]`" value="{{ $education['location'] }}">
                                </div>
                                <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                                    <div class="textbox-group w-full">
                                        <label>Start</label>
                                        <input type="month" x-bind:name="`education[{{ $key }}][from]`" value="{{ $education['from'] }}">
                                    </div>
                                    <div class="textbox-group w-full">
                                        <label>End</label>
                                        <input type="month" x-bind:name="`education[{{ $key }}][to]`" value="{{ $education['to'] }}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-error" onclick="document.getElementById('{{ 'edu' . $key }}').remove();">&times;</button>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div>
                    <button type="button" class="btn btn-success w-full" @click="addNewField()">Add Row</button>
                </div>
            </div>
            <div class="text-center space-x-2">
                <a href="{{ route('member.daftar.kandidat.skill.index') }}" class="btn btn-tertiary">Previous Step</a>
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
                count: {{ !empty($candidate->education) ? count($candidate->education) : 0 }},
                addNewField() {
                    this.fields.push({
                        txtEdu: '',
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
