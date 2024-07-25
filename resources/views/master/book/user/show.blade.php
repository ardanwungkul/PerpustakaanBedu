<x-layouts.app>
    <div>
        <section class="bg-white rounded-lg">
            <div class="grid grid-cols-2 gap-3 p-5">
                <div>
                    <img src="{{ $book->picture ? asset('storage/images/book') . '/' . $book->picture : asset('assets/images/placeholder.jpg') }}"
                        class="w-full rounded-lg" alt="">
                </div>
                <div>
                    <p class="font-bold text-3xl">{{ $book->title }}</p>
                    <p class="text-gray-400 text-xs">Writed By {{ $book->author }}</p>
                    <p class="text-gray-400 text-xs">Release By {{ $book->publisher }} on {{ $book->release }}</p>
                    <div class="mt-3 " x-data="{ addHistory: false }">
                        <button @click="addHistory=true"
                            class="py-1 bg-gray-500 w-full rounded-lg text-white hover:bg-gray-600 text-sm">Pinjam
                            Buku</button>
                        <x-modal.add-history :book="$book"></x-modal.add-history>
                    </div>
                    <div class="mt-3">
                        <p class="font-semibold text-lg">Description</p>
                        <div class="p-3 rounded-lg border mt-1">
                            <p class="text-sm">{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
