<!DOCTYPE html>
<html lang="en">

@include('templates.finance.head')

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark }">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
                Loading.....
            </div>
            @include('templates.finance.sidebar')
            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                @include('templates.finance.main')
                @include('templates.finance.footer')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/finance.js') }}"></script>
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
                console.log('masuk');
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
            };
        };
    </script>
    @hasSection('footerJS')
        @yield('footerJS')
    @endif
</body>

</html>
