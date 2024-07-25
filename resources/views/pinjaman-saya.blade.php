<x-layouts.app>
    <div class="p-5">
        <div class="bg-white w-full rounded-lg p-5">
            <ul>
                @foreach ($history as $item)
                    <li>
                        <div class="p-3 border rounded-lg">
                            <div class="flex gap-3 items-center">
                                <img class="w-40 rounded-lg flex-none"
                                    src="{{ $item->book->picture ? asset('storage/images/book') . '/' . $item->book->picture : asset('assets/images/placeholder.jpg') }}"
                                    alt="">
                                <div class="h-full">
                                    <div class="flex gap-1">
                                        <p class="w-[180px]">Judul Buku</p>
                                        <p>:</p>
                                        <p class="">{{ $item->book->title }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <p class="w-[180px]">Tanggal Pengajuan</p>
                                        <p>:</p>
                                        <p class="">{{ $item->date }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <p class="w-[180px]">Tanggal Peminjaman</p>
                                        <p>:</p>
                                        <p class="">{{ $item->date_received }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <p class="w-[180px]">Status</p>
                                        <p>:</p>
                                        <p class="">{{ $item->status }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <p class="w-[180px]">Tanggal Dikembalikan</p>
                                        <p>:</p>
                                        <p class="">{{ $item->return_date }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layouts.app>
