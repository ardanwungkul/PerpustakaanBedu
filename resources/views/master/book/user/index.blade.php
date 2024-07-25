<x-layouts.app>
    <div>
        <section class="bg-white rounded-lg">
            <div class="container px-6 py-5 mx-auto">
                <div class="text-start">
                    <h1 class="text-2xl font-semibold text-gray-800 capitalize border-b pb-2">Books By Category
                    </h1>
                </div>

                <div class="space-y-5 mt-5">
                    @foreach ($category->take(5) as $item)
                        <div class="bg-gray-100 rounded-lg p-5">
                            <div class="flex justify-between">
                                <p class="text-lg font-semibold">{{ $item->category_name }} Category</p>
                                <a href="{{ route('category.show', $item->id) }}">View All</a>
                            </div>
                            <div class="grid grid-cols-1 gap-8 mt-2 lg:grid-cols-4">
                                @foreach ($item->book as $book)
                                    <div>
                                        <img class="relative z-10 object-cover w-full rounded-t-md h-40"
                                            src="{{ $book->picture ? asset('storage/images/book') . '/' . $book->picture : asset('assets/images/placeholder.jpg') }}"
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
                    @endforeach
                </div>

            </div>
        </section>
    </div>
</x-layouts.app>
