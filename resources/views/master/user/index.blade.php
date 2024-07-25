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
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-center text-gray-500">
                                            Nis
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Class
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Generation
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Email</th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            No Hp</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center text-gray-500">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($user as $item)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->profile->nis }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->profile->class }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->profile->generation }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->email }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                {{ $item->profile->phone_number }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex justify-center items-center gap-3 h-full">
                                                    <form action="{{ route('user.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-500 hover:underline">Delete</button>
                                                    </form>
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
