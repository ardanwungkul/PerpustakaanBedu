<x-app-layout>
    <div>
        <section class="container px-4 mx-auto">

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-center text-gray-500">
                                            User
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Book
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Loan Date
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Status</th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Return Date</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center text-gray-500">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($history as $item)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->user->name }}
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->book->title }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->date_received }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->status }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->return_date }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap" x-data="{ openEditHistory{{ $item->id }}: false }">
                                                <div class="flex justify-center items-center gap-3 h-full">
                                                    <button @click="openEditHistory{{ $item->id }}=true"
                                                        class="px-1 py-1 text-blue-500 hover:underline duration-200 justify-center items-center">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('history.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-500 hover:underline">Delete</button>
                                                    </form>
                                                    <x-modal.edit-history :history="$item"></x-modal.edit-history>
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
