<section class="bg-gradient-to-r from-blue-50 via-blue-100 to-blue-200">
    <div class="mx-auto max-w-screen-xl px-4 py-10 lg:flex lg:items-center">
        <div class="mx-auto max-w-xl text-center">
            <h1 class="text-4xl font-extrabold sm:text-5xl text-gray-900 leading-tight">
                Online Marketplace
                <strong class="font-extrabold text-blue-700 sm:block text-3xl mt-2">Discover Quality Products Online Now.</strong>
            </h1>
            <p class="mt-4 text-lg sm:text-xl text-gray-700">
                Browse our collection of high-quality products and enjoy seamless online shopping.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-6">
                @if (auth()->check())
                    <a class="block w-full rounded-full bg-blue-600 px-12 py-4 text-sm font-medium text-white shadow-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-500 sm:w-auto transition duration-300 ease-in-out transform hover:scale-105"
                       href="/offer">
                        Redeem your offer Now!
                    </a>
                @else
                    <a class="block w-full rounded-full bg-blue-600 px-12 py-4 text-sm font-medium text-white shadow-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-500 sm:w-auto transition duration-300 ease-in-out transform hover:scale-105"
                       href="/auth/login">
                        Get Started
                    </a>
                @endif
                <a class="block w-full bg-white rounded-full px-12 py-4 text-sm font-medium text-blue-600 shadow-xl hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:text-blue-500 sm:w-auto transition duration-300 ease-in-out transform hover:scale-105"
                   href="all/products">
                    Explore More
                </a>
            </div>
        </div>
    </div>
</section>
