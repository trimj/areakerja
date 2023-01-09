@extends('templates.finance.page')

@section('content')
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6-darker">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>
    <div class="flex flex-col lg:flex-row ml-4 gap-4 mt-4">
        <div class="flex flex-col w-full">
            <div class="flex flex-row ">
                <div class="items-center justify-between bg-white w-full rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4 bg-main" style="height: 120px;">
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <p class="text-2xl text-white font-bold"> Welcome Back !</p>
                                <p class="text-white">Rose !</p>
                            </div>
                            <div class="flex flex-col w-48 ml-10 mt-5">
                                <img src="{{ asset('assets/finance/profile-cover.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full items-center justify-between lg:-mt-9 ml-7 w-20 h-20">
                        <img src="{{ asset('assets/finance/dummy.svg') }}" alt="">
                    </div>
                    <div class="flex flex-row w-full p-4 gap-2" style="background: white">
                        <div class="flex flex-col w-full">
                            <span class="text-lg">Rose Park</span>
                            <span class="text-sm">Admin</span>
                        </div>
                        <div class="flex flex-col w-full">
                            <div class=" flex flex-row gap-2">
                                <button class="rounded-full items-center bg-main mt-4 w-28 h-8">
                                    Sleep
                                </button>
                                <button class="rounded-full items-center bg-main mt-4 w-28 h-8">
                                    Log out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="flex flex-col w-full justify-center">
            <div class="flex flex-col lg:flex-row align-middle relative w-auto gap-4">

                <div class="w-full relative">
                    <div class="flex items-center justify-between p-4 py-8 bg-white rounded-xl shadow-lg">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Jumlah Saldo Saat ini
                            </h6>
                            <span class="text-xl font-semibold">1,235</span>
                        </div>
                    </div>
                </div>
                <div class="w-full relative">
                    <div class="flex items-center justify-between p-4 py-8 bg-white rounded-xl shadow-lg">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Rata - Rata Pendapatan
                            </h6>
                            <span class="text-xl font-semibold">2,765</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- endcard -->
    </div>
    
    <div class="ml-4 mb-4">
        <!-- chard -->
        <div class=" w-full relative mt-4">
            <div class="bg-white w-full" x-data="{ isOn: false }">
                <div class="flex items-center justify-between p-4 border-b">
                    <h4 class="text-lg font-semibold text-gray-500">
                        Jumlah Uang
                    </h4>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Last year</span>
                        <button class="relative focus:outline-none" x-cloak
                            @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                            <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100">
                            </div>
                            <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                :class="{ 'translate-x-0  bg-white': !isOn, 'translate-x-6 bg-primary-light': isOn }">
                            </div>
                        </button>
                    </div>
                </div>
                <div class="relative p-4 h-80">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <!-- endchard -->
    </div>

    <div class="flex flex-row w-96 sm:w-auto ml-4 bg-white">
        <div class="container mx-auto py-6 px-4" x-data="nonkandidat()" x-cloak>
            <div class="mb-4 flex justify-between items-center">
                <div class="flex flex-row">
                    <p class="text-xl">Riwayat Transaksi Terakhir</p>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative h-80">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Payment Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $value->id }}</td>
                                    <td class="text-center">{{ $value->partner->user->name }}</td>
                                    <td class="text-center">{{ $value->created_at }}</td>
                                    <td class="text-center">{{ $value->amount }}</td>
                                    <td class="text-center">{{ $value->payment_status }}</td>
                                    <td class="">
                                        <button
                                            class="py-1 text-sm item-center text-white bg-main hover:bg-orange-500 rounded-full w-28 mt-2"
                                            data-modal-toggle="{{ 'tambahriwayattransaksi' . $key }}">View Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerJS')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('vendor/datatable/datatables.js') }}"></script>

    {{-- <script>
        function nonkandidat() {
            return {
                headings: [{
                        'key': 'id',
                        'value': 'Order ID'
                    },
                    {
                        'key': 'billing_name',
                        'value': 'Billing Name'
                    },
                    {
                        'key': 'date',
                        'value': 'Date'
                    },
                    {
                        'key': 'total',
                        'value': 'Total'
                    },
                    {
                        'key': 'payment_status',
                        'value': 'Payment Status'
                    },
                    {
                        'key': 'payment_method',
                        'value': 'Payment Method'
                    },
                    {
                        'key': 'Detail',
                        'value': 'Detail'
                    }
                ],

                users: [{
                    "id": $value - > id,
                    "billing_name": $value - > billing_name,
                    "date": $value - > date,
                    "total": $value - > total,
                    "payment_status": $value - > payment_status,
                    "payment_method": $value - > payment_method
                }],
                selectedRows: [],

                open: false,

                toggleColumn(key) {
                    // Note: All td must have the same class name as the headings key! 
                    let columns = document.querySelectorAll('.' + key);

                    if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
                        columns.forEach(column => {
                            column.classList.remove('hidden');
                        });
                    } else {
                        columns.forEach(column => {
                            column.classList.add('hidden');
                        });
                    }
                },

                getRowDetail($event, id) {
                    let rows = this.selectedRows;

                    if (rows.includes(id)) {
                        let index = rows.indexOf(id);
                        rows.splice(index, 1);
                    } else {
                        rows.push(id);
                    }
                },

                selectAllCheckbox($event) {
                    let columns = document.querySelectorAll('.rowCheckbox');

                    this.selectedRows = [];

                    if ($event.target.checked == true) {
                        columns.forEach(column => {
                            column.checked = true
                            this.selectedRows.push(parseInt(column.name))
                        });
                    } else {
                        columns.forEach(column => {
                            column.checked = false
                        });
                        this.selectedRows = [];
                    }
                }
            }
        }
    </script> --}}
@endsection
