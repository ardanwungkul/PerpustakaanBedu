@props(['book'])
<div x-show="addHistory" x-transition:enter="transition duration-300 ease-out"
    x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100" x-transition:leave="transition duration-150 ease-in"
    x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
    x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
    class="fixed inset-0 z-10 overflow-y-auto bg-black/25" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
            <form action="{{ route('user.history.store', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex gap-5">
                    <div class="w-full">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="date" name="date_received" id="date_received"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="date_received"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                                Peminjaman</label>

                        </div>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <button @click="addHistory=false" type="button"
                        class="px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md w-auto hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                        Cancel
                    </button>
                    <button
                        class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:w-auto sm:mt-0 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
