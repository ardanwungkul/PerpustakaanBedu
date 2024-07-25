<x-layouts.app>
    <div>
        <section class="bg-white rounded-lg">
            <div class="container px-6 py-5 mx-auto">
                <div class="text-start">
                    <h1 class="text-2xl font-semibold text-gray-800 capitalize border-b pb-2">
                        {{ $category->category_name }} Category
                    </h1>
                </div>

                <div class="space-y-5 mt-5">
                    <div class="bg-gray-100 rounded-lg p-5">
                        <div class="grid grid-cols-1 gap-8 mt-2 lg:grid-cols-4">
                            @foreach ($category->book as $book)
                                <div>
                                    <img class="relative z-10 object-cover w-full rounded-t-md h-40"
                                        src="https://images.unsplash.com/photo-1644018335954-ab54c83e007f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                        alt="">
                                    <div class="relative p-3 mx-auto bg-white rounded-b-md shadow dark:bg-gray-900">
                                        <a href="{{ route('user.book.show', $book->id) }}"
                                            class="font-semibold text-gray-800 hover:underline dark:text-white md:text-xl line-clamp-1">
                                            {{ $book->title }}
                                        </a>
                                        <p class="mt-1 text-sm text-blue-500">{{ $book->release }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-layouts.app>
