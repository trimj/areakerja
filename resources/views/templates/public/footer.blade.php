<footer>
    <div class="footer">
        <div class="main-section">
            <div class="newsletter">
                <div class="title">Subscribe to our newsletter</div>
                <div class="mb-5">
                    Do you want to get notified when a new component is added to Flowbite? Sign up for our newsletter and you'll be among the first to find out about new features, components, versions, and tools.
                </div>
                <form action="#" method="post" class="flex space-y-0">
                    @csrf
                    <input type="text" name="newsletter" id="newsletter" placeholder="Email Address">
                    <button class="btn btn-primary ml-2"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="links">
                <div class="title">Section Title</div>
                <div>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                </div>
            </div>
            <div class="links">
                <div class="title">Section Title</div>
                <div>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                </div>
            </div>
            <div class="links">
                <div class="title">Section Title</div>
                <div>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                </div>
            </div>
            <div class="links">
                <div class="title">Section Title</div>
                <div>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                </div>
            </div>
        </div>
        <div class="secondary-section">
            <div class="logo flex items-center space-x-2">
                <img src="{{ asset('assets/public/images/logo.png') }}" alt="Area Kerja" class="w-10">
                <span class="text-sm">&copy; Area Kerja, 2022.</span>
            </div>
            <div class="social-media">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </div>
</footer>
