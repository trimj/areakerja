<footer>
    <div class="footer">
        <div class="main-section">
            <div class="newsletter">
                <div class="title">Subscribe to our newsletter</div>
                <form action="#" method="post" class="flex space-y-0 mt-5">
                    @csrf
                    <input type="text" name="newsletter" id="newsletter" placeholder="Email Address">
                    <button class="btn btn-primary ml-2"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="links col-span-full lg:col-span-4 text-center lg:text-right">
                <div class="title">Company</div>
                <a href="#">About Us</a>
                <a href="{{ route('public.contact') }}">Contact</a>
                <a href="#">FAQ</a>
                <a href="#">Privacy</a>
            </div>
        </div>
        <div class="secondary-section">
            <div class="logo flex items-center space-x-2">
                <img src="{{ asset('assets/public/images/logo.png') }}" alt="Area Kerja" class="w-10">
                <span class="text-sm">&copy; Area Kerja, 2023.</span>
            </div>
            <div class="flex flex-row justify-center social-media">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
