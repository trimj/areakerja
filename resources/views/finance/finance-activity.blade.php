@extends('templates.finance.page')

@section('content')
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6-darker">
        <h1 class="text-2xl font-semibold">List Activity Company</h1>
    </div>
    

@endsection

@section('footerJS')
    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="{{asset('js/finance.js')}}"></script>
    <script src="https://kit.fontawesome.com/d770eb273a.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem("dark")) {
                    return JSON.parse(window.localStorage.getItem("dark"));
                }

                return (
                    !!window.matchMedia &&
                    window.matchMedia("(prefers-color-scheme: dark)")
                        .matches
                );
            };

            const setTheme = (value) => {
                window.localStorage.setItem("dark", value);
            };

            const getColor = () => {
                if (window.localStorage.getItem("color")) {
                    return window.localStorage.getItem("color");
                }
                return "cyan";
            };

            const setColors = (color) => {
                const root = document.documentElement;
                root.style.setProperty(
                    "--color-primary",
                    `var(--color-${color})`
                );
                root.style.setProperty(
                    "--color-primary-50",
                    `var(--color-${color}-50)`
                );
                root.style.setProperty(
                    "--color-primary-100",
                    `var(--color-${color}-100)`
                );
                root.style.setProperty(
                    "--color-primary-light",
                    `var(--color-${color}-light)`
                );
                root.style.setProperty(
                    "--color-primary-lighter",
                    `var(--color-${color}-lighter)`
                );
                root.style.setProperty(
                    "--color-primary-dark",
                    `var(--color-${color}-dark)`
                );
                root.style.setProperty(
                    "--color-primary-darker",
                    `var(--color-${color}-darker)`
                );
                this.selectedColor = color;
                window.localStorage.setItem("color", color);
                //
            };

            const updateBarChart = (on) => {
                const data = {
                    data: randomData(),
                    backgroundColor: "rgb(207, 250, 254)",
                };
                if (on) {
                    barChart.data.datasets.push(data);
                    barChart.update();
                } else {
                    barChart.data.datasets.splice(1);
                    barChart.update();
                }
            };

            const updateDoughnutChart = (on) => {
                const data = random();
                const color = "rgb(207, 250, 254)";
                if (on) {
                    doughnutChart.data.labels.unshift("Seb");
                    doughnutChart.data.datasets[0].data.unshift(data);
                    doughnutChart.data.datasets[0].backgroundColor.unshift(
                        color
                    );
                    doughnutChart.update();
                } else {
                    doughnutChart.data.labels.splice(0, 1);
                    doughnutChart.data.datasets[0].data.splice(0, 1);
                    doughnutChart.data.datasets[0].backgroundColor.splice(
                        0,
                        1
                    );
                    doughnutChart.update();
                }
            };

            const updateLineChart = () => {
                lineChart.data.datasets[0].data.reverse();
                lineChart.update();
            };

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark;
                    setTheme(this.isDark);
                },
                setLightTheme() {
                    this.isDark = false;
                    setTheme(this.isDark);
                },
                setDarkTheme() {
                    this.isDark = true;
                    setTheme(this.isDark);
                },
                color: getColor(),
                selectedColor: "cyan",
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen;
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus();
                    });
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus();
                    });
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus();
                    });
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true;
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus();
                    });
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true;
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus();
                    });
                },
                updateBarChart,
                updateDoughnutChart,
                updateLineChart,
            };
        };
    </script>
    <script>
        function nonkandidat() {
            return {
                headings: [
                    {
                        'key': 'userId',
                        'value': 'Order ID'
                    },
                    {
                        'key': 'Name',
                        'value': 'Billing Name'
                    },
                    {
                        'key': 'Umur',
                        'value': 'Date'
                    },
                    {
                        'key': 'Total',
                        'value': 'Total'
                    },
                    {
                        'key': 'Status',
                        'value': 'Payment Status'
                    },
                    {
                        'key': 'PaymentMethod',
                        'value': 'Payment Method'
                    },
                    {
                        'key': 'Detail',
                        'value': 'Detail'
                    }
                ],
                users: [{
                    "userId": 1,
                    "Name": "Cort",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 2,
                    "Name": "Brianne",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 3,
                    "Name": "Isadore",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 4,
                    "Name": "Janaya",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 5,
                    "Name": "Freddi",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 6,
                    "Name": "Oliy",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 7,
                    "Name": "Tabb",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 8,
                    "Name": "Joela",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 9,
                    "Name": "Alistair",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 10,
                    "Name": "Nealon",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 11,
                    "Name": "Annissa",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 12,
                    "Name": "Nissie",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 13,
                    "Name": "Madalena",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 14,
                    "Name": "Rozina",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
                }, {
                    "userId": 15,
                    "Name": "Lorelle",
                    "Umur": "07 Oct, 2022",
                    "Total": "Rp 10.000.000",
                    "Status": "Selesai",
                    "PaymentMethod": "Visa"
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
    </script>
@endsection