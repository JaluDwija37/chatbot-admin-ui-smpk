<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faq') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 ">
                            <h1 class="font-bold text-xl">Form Retrain With Parameter</h1>
                            <form class="bg-gray-100 p-6 rounded-lg shadow-md">
                                <div class="flex flex-col space-y-4">
                                    <div class="flex w-full flex-wrap gap-6">
                                        <div class="flex flex-col w-full md:w-1/2">
                                            <label for="learing_rate" class="text-gray-700 font-medium mb-2">Learning Rate</label>
                                            <select name="learing_rate" id="learing_rate"
                                                class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                                                <option value="0.1" {{ old('learing_rate', '0.1') == '0.1' ? 'selected' : '' }}>0.1</option>
                                                <option value="0.05" {{ old('learing_rate', '0.05') == '0.05' ? 'selected' : '' }}>0.05</option>
                                                <option value="0.01" {{ old('learing_rate', '0.01') == '0.01' ? 'selected' : '' }}>0.01</option>
                                                <option value="0.005" {{ old('learing_rate', '0.005') == '0.005' ? 'selected' : '' }}>0.005</option>
                                                <option value="0.001" {{ old('learing_rate', '0.001') == '0.001' ? 'selected' : '' }}>0.001</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col w-full md:w-1/2">
                                            <label for="optimizer" class="text-gray-700 font-medium mb-2">Optimizer</label>
                                            <select name="optimizer" id="optimizer"
                                                class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                                                <option value="Adam" {{ old('optimizer', 'Adam') == 'Adam' ? 'selected' : '' }}>Adam</option>
                                                <option value="SGD" {{ old('optimizer', 'SGD') == 'SGD' ? 'selected' : '' }}>SGD</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col w-full md:w-1/2">
                                            <label for="testing_percentage" class="text-gray-700 font-medium mb-2">Testing Data Percentage</label>
                                            <input type="number" name="testing_percentage" id="testing_percentage"
                                                class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                                                placeholder="Enter percentage">
                                        </div>
                                        <div class="flex flex-col w-full md:w-1/2">
                                            <label for="batch_size" class="text-gray-700 font-medium mb-2">Batch Size</label>
                                            <input type="number" name="batch_size" id="batch_size"
                                                class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                                                placeholder="Enter batch size">
                                        </div>
                                    </div>

                                    <button type="btn_save"
                                        class="bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Retrain
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                                Sender
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Message
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Response
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Confidence
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Optimizer
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Learning Rate
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Batch Size
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Presentase Training Data
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Presentase Testing Data
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Created At
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($chat_histories as $chat_history)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap ">{{ $loop->iteration }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $chat_history->sender }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $chat_history->message }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $chat_history->response }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ is_numeric($chat_history->confidence) ? number_format($chat_history->confidence * 100, 2) . '%' : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $chat_history->chatbotStatus->optimizer ?? 'N/A' }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ is_numeric($chat_history->chatbotStatus->learning_rate ?? null) ? $chat_history->chatbotStatus->learning_rate : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ is_numeric($chat_history->chatbotStatus->batch_size ?? null) ? $chat_history->chatbotStatus->batch_size : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ is_numeric($chat_history->chatbotStatus->testing_percentage ?? null) ? (100 - ($chat_history->chatbotStatus->testing_percentage)) : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ is_numeric($chat_history->chatbotStatus->testing_percentage ?? null) ? ($chat_history->chatbotStatus->testing_percentage) : 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $chat_history->created_at }}</p>
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
    // Add this inside your existing DOMContentLoaded event listener
    document.querySelector('button[type="btn_save"]').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        const formData = {
            learning_rate: document.getElementById('learing_rate').value,
            optimizer: document.getElementById('optimizer').value,
            testing_percentage: document.getElementById('testing_percentage').value,
            batch_size: document.getElementById('batch_size').value,
        };

        // Send POST request
        fetch('http://127.0.0.1:8080/trigger', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Show success toast
                showToast('Success: Retrain triggered successfully!', 'success');
            })
            .catch((error) => {
                console.error('Error:', error);
                // Show error toast
                showToast('Error: Failed to trigger retrain.', 'error');
            });
    });

    // Function to show toast
    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `fixed top-5 right-5 px-4 py-2 rounded-lg shadow-lg text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
        toast.textContent = message;

        document.body.appendChild(toast);

        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }
</script>
