@extends('templates.public.page')

@section('content')
    @include('templates.member.candidate.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Certificate</div>
        <form action="{{ route('member.daftar.kandidat.certificate.store') }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0" x-data="handler()">
                <template x-for="(field, index) in fields" :key="index">
                    <div class="flex items-center space-x-2 control-group">
                        <div class="flex flex-col space-y-5 w-full">
                            <div class="textbox-group">
                                <label>Title</label>
                                <input type="text" x-model="field.txtCert" x-bind:name="`certificate[${index + count}][title]`">
                            </div>
                            <div class="textbox-group">
                                <label>Get Date</label>
                                <input type="month" x-model="field.dateGet" x-bind:name="`certificate[${index + count}][get]`">
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-error" @click="removeField(index)">&times;</button>
                        </div>
                    </div>
                </template>
                @if (!empty($candidate->certificate))
                    @foreach ($candidate->certificate as $key => $certificate)
                        <div class="flex items-center space-x-2 control-group" id="{{ 'cert' . $key }}">
                            <div class="flex flex-col space-y-5 w-full">
                                <div class="textbox-group">
                                    <label>Title</label>
                                    <input type="text" x-bind:name="`certificate[{{ $key }}][title]`" value="{{ $certificate['title'] }}">
                                </div>
                                <div class="textbox-group">
                                    <label>Get Date</label>
                                    <input type="month" x-bind:name="`certificate[{{ $key }}][get]`" value="{{ $certificate['get'] }}">
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-error" onclick="document.getElementById('{{ 'cert' . $key }}').remove();">&times;</button>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div>
                    <button type="button" class="btn btn-success w-full" @click="addNewField()">Add Row</button>
                </div>
            </div>
            <div class="text-center space-x-2">
                <a href="{{ route('member.daftar.kandidat.education.index') }}" class="btn btn-tertiary">Previous Step</a>
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
    <div class="mt-20 md:mt-32 lg:mt-40">
        <img src="{{ asset('assets/public/images/daftar-kandidat.png') }}" alt="Daftar Kandidat" class=" w-[50%]">
    </div>
@endsection
@section('footerJS')
    <script>
        function handler() {
            return {
                fields: [],
                count: {{ !empty($candidate->certificate) ? count($candidate->certificate) : 0 }},
                addNewField() {
                    this.fields.push({
                        txtCert: '',
                        dateGet: '',
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
@endsection
