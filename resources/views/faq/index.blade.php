<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faq') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <a href="{{ route('faq.create') }}"
                    class="bg-indigo-400 border-2 text-white font-bold py-2 px-3 rounded-md">
                    Create FAQ
                </a>
                <div class="text-gray-700 flex items-center gap-2">
                    <div>
                        <span class="font-semibold">Last Trained:</span>
                        <span id="lastTrained">Loading...</span>
                    </div>
                    <button onclick="getLastTrained()" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 ">
                            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Number
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Tag
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Questions
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Answers
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faqs as $faq)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap ">{{ $loop->iteration }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $faq->tag }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <ul>
                                                        @forelse ($faq->patterns ? json_decode($faq->patterns) : ["No Data"] as $pattern)
                                                            <li class="list-disc">{{ $pattern }}</li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <ul>
                                                        @foreach (json_decode($faq->responses) as $response)
                                                            <li class="list-disc">{{ $response }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex">
                                                        <a href="{{ route('faq.edit', ['faq' => $faq->id]) }}"
                                                            class="bg-yellow-500 border-2 text-white font-bold py-2 px-3 rounded-md">
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('faq.destroy', ['faq' => $faq->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button id="btn_delete"
                                                                class="bg-red-500 border-2 text-white font-bold py-2 px-3 rounded-md"
                                                                type="submit">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
<script>
    async function getLastTrained() {
        try {
            const response = await fetch('{{ url('/api/chatbot_status') }}');
            const data = await response.json();
            const date = new Date(data.created_at);
            const formattedDate = `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;
            document.getElementById('lastTrained').textContent = formattedDate;
        } catch (error) {
            document.getElementById('lastTrained').textContent = 'Error loading data';
        }
    }
    getLastTrained();
    // Refresh every 30 seconds
    setInterval(getLastTrained, 30000);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#btn_delete').forEach(button => {
            button.addEventListener('click', function(e) {
                // e.preventDefault();
                
                // Send POST request
                fetch('http://127.0.0.1:8080/trigger', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    // Submit the form after successful API call
                    this.closest('form').submit();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
