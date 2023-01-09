<footer>
    <div class="footer">
        {{-- <div class="main-section"> --}}
            <div class="flex flex-row w-full">
                <div class="flex flex-col w-full h-44">
                    <div class="newsletter">
                        <div class="title">Subscribe to our newsletter</div>
                        {{-- <div class="mb-5">
                            Do you want to get notified when a new component is added to Flowbite? Sign up for our newsletter and you'll be among the first to find out about new features, components, versions, and tools.
                        </div> --}}
                        <form action="#" method="post" class="flex space-y-0 mt-5 w-96">
                            @csrf
                            <input type="text" name="newsletter" id="newsletter" placeholder="Email Address">
                            <button class="btn btn-primary ml-2"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col w-full items-end">
                    <div class="links">
                        <div class="title text-xl font-bold">Company</div>
                        <div class="text-right">
                            <a href="#">About Us</a>
                            <a href="{{ route('public.contact') }}">Contact</a>
                            <a href="#">FAQ</a>
                            <a href="#">Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        <div class="secondary-section">
            <div class="logo flex items-center space-x-2">
                <img src="{{ asset('assets/public/images/logo.png') }}" alt="Area Kerja" class="w-10">
                <span class="text-sm">&copy; Area Kerja, 2022.</span>
            </div>
            <div class="flex flex-row w-full h-full justify-center gap-10 opacity-50 social-media ">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
