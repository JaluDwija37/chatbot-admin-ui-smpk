<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faq') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('faq.update', ['faq' => $faq->id]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="tag" :value="__('Tag')" />
                            <x-text-input id="tag" name="tag" type="text" class="mt-1 block w-full"
                                :value="old('tag', $faq->tag)" required autofocus autocomplete="tag" />
                            <x-input-error class="mt-2" :messages="$errors->get('tag')" />
                        </div>

                        <!-- Patterns Section -->
                        <div id="patterns-container">
                            <x-input-label for="patterns" :value="__('Patterns')" />

                            @foreach (old('patterns', json_decode($faq->patterns)) as $index => $pattern)
                                <div class="flex gap-2 mt-2">
                                    <x-text-input id="patterns_{{ $index }}" name="patterns[]" type="text"
                                        class="mt-1 block w-full" value="{{ $pattern }}" />
                                    <button type="button" class="text-red-500 hover:text-red-700 font-semibold"
                                        onclick="removeElement(this)">×</button>
                                </div>
                            @endforeach

                        </div>
                        <button type="button" id="add-pattern" class="mt-2 text-blue-500 hover:text-blue-700">
                            + {{ __('Add another pattern') }}
                        </button>
                        <x-input-error class="mt-2" :messages="$errors->get('patterns')" />

                        <!-- Responses Section -->
                        <div id="responses-container" class="mt-4">
                            <x-input-label for="responses" :value="__('Responses')" />

                            @foreach (old('responses', json_decode($faq->responses)) as $index => $response)
                                <div class="flex gap-2 mt-2">
                                    <x-text-input id="responses_{{ $index }}" name="responses[]" type="text"
                                        class="mt-1 block w-full" value="{{ $response }}" required />
                                    <button type="button" class="text-red-500 hover:text-red-700 font-semibold"
                                        onclick="removeElement(this)">×</button>
                                </div>
                            @endforeach

                        </div>
                        <button type="button" id="add-response" class="mt-2 text-blue-500 hover:text-blue-700">
                            + {{ __('Add another response') }}
                        </button>
                        <x-input-error class="mt-2" :messages="$errors->get('responses')" />

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let questionCount = {{ count(old('patterns', json_decode($faq->patterns))) }};
            let answerCount = {{ count(old('responses', json_decode($faq->responses))) }};

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

        // Function to remove an element
        function removeElement(button) {
            button.parentElement.remove();
        }
    </script>
</x-app-layout>
