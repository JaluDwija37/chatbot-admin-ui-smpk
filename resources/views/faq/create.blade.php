<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Faq') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('faq.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="tag" :value="__('Tag')" />
                            <x-text-input id="tag" name="tag" type="text" class="mt-1 block w-full"
                                :value="old('tag')" required autofocus autocomplete="tag" />
                            <x-input-error class="mt-2" :messages="$errors->get('tag')" />
                        </div>

                        <!-- Patterns Section -->
                        <div id="patterns-container">
                            <x-input-label for="patterns" :value="__('Patterns')" />
                            <div class="flex gap-2 mt-2">
                                <x-text-input id="patterns_0" name="patterns[]" type="text" class="mt-1 block w-full"
                                    :value="old('patterns[0]')" />
                            </div>
                        </div>
                        <button type="button" id="add-pattern" class="mt-2 text-blue-500 hover:text-blue-700">
                            + {{ __('Add another pattern') }}
                        </button>
                        <x-input-error class="mt-2" :messages="$errors->get('patterns')" />

                        <!-- Responses Section -->
                        <div id="responses-container" class="mt-4">
                            <x-input-label for="responses" :value="__('Responses')" />
                            <div class="flex gap-2 mt-2">
                                <x-text-input id="responses_0" name="responses[]" type="text"
                                    class="mt-1 block w-full" :value="old('responses[0]')" required />
                            </div>
                        </div>
                        <button type="button" id="add-response" class="mt-2 text-blue-500 hover:text-blue-700">
                            + {{ __('Add another response') }}
                        </button>
                        <x-input-error class="mt-2" :messages="$errors->get('responses')" />

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button id="btn_save">{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let questionCount = 1;
            let answerCount = 1;

            // Add another pattern
            document.getElementById('add-pattern').addEventListener('click', function() {
                let questionContainer = document.getElementById('patterns-container');

                let newQuestionDiv = document.createElement('div');
                newQuestionDiv.classList.add('flex', 'gap-2', 'mt-2');

                let newQuestionInput = document.createElement('input');
                newQuestionInput.type = 'text';
                newQuestionInput.name = 'patterns[]';
                newQuestionInput.id = 'patterns_' + questionCount;
                newQuestionInput.classList.add('mt-1', 'block', 'w-full', 'border-gray-300',
                    'focus:border-indigo-500', 'focus:ring-indigo-500', 'rounded-md', 'shadow-sm');
                newQuestionInput.required = true;

                // Create delete button
                let deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.classList.add('text-red-500', 'hover:text-red-700', 'font-semibold');
                deleteBtn.innerHTML = '&times;';
                deleteBtn.addEventListener('click', function() {
                    questionContainer.removeChild(newQuestionDiv);
                });

                newQuestionDiv.appendChild(newQuestionInput);
                newQuestionDiv.appendChild(deleteBtn);

                questionContainer.appendChild(newQuestionDiv);
                questionCount++;
            });

            // Add another response
            document.getElementById('add-response').addEventListener('click', function() {
                let answerContainer = document.getElementById('responses-container');

                let newAnswerDiv = document.createElement('div');
                newAnswerDiv.classList.add('flex', 'gap-2', 'mt-2');

                let newAnswerInput = document.createElement('input');
                newAnswerInput.type = 'text';
                newAnswerInput.name = 'responses[]';
                newAnswerInput.id = 'responses_' + answerCount;
                newAnswerInput.classList.add('mt-1', 'block', 'w-full', 'border-gray-300',
                    'focus:border-indigo-500', 'focus:ring-indigo-500', 'rounded-md', 'shadow-sm');
                newAnswerInput.required = true;

                // Create delete button
                let deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.classList.add('text-red-500', 'hover:text-red-700', 'font-semibold');
                deleteBtn.innerHTML = '&times;';
                deleteBtn.addEventListener('click', function() {
                    answerContainer.removeChild(newAnswerDiv);
                });

                newAnswerDiv.appendChild(newAnswerInput);
                newAnswerDiv.appendChild(deleteBtn);

                answerContainer.appendChild(newAnswerDiv);
                answerCount++;
            });
        });


        // Add this inside your existing DOMContentLoaded event listener
        document.getElementById('btn_save').addEventListener('click', function(e) {


            // Collect form data
            const formData = {
                tag: document.querySelector('#tag').value,
                patterns: Array.from(document.querySelectorAll('input[name="patterns[]"]')).map(input => input
                    .value),
                responses: Array.from(document.querySelectorAll('input[name="responses[]"]')).map(input => input
                    .value)
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
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</x-app-layout>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
