<x-app-layout>
    <div>
        <section class="container px-4 mx-auto">
            <div x-data="{ openAddBook: false }" class="flex justify-between items-center bg-white rounded-lg border py-3 px-5">
                <h2 class="text-xl font-medium text-gray-800">Books Library</h2>
                <button @click="openAddBook=true"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Add Book</span>
                </button>
                <x-modal.add-book :categories="$categories"></x-modal.add-book>
            </div>

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-center text-gray-500">
                                            Book
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Author
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Release
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Publisher</th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Copy</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center text-gray-500">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($book as $item)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div class="flex items-center justify-center flex-col gap-1">
                                                    <img src="{{ $item->picture ? asset('storage/images/book') . '/' . $item->picture : asset('assets/images/placeholder.jpg') }}"
                                                        class="w-20 rounded-lg object-cover" alt="">
                                                    <p>
                                                        {{ $item->title }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->author }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->release }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->publisher }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->copy }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap" x-data="{ openEditBook{{ $item->id }}: false }">
                                                <div class="flex justify-center items-center gap-3 h-full">
                                                    <button @click="openEditBook{{ $item->id }}=true"
                                                        class="px-1 py-1 text-blue-500 hover:underline duration-200 justify-center items-center">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('book.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-500 hover:underline">Delete</button>
                                                    </form>
                                                    <x-modal.edit-book :book="$item"></x-modal.edit-book>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#category_id').select2({
            placeholder: 'Select Categories',
            tags: true
        });
    });
</script>
