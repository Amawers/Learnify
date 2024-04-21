<x-app-layout>
    {{-- header --}}
    <div class="bg-primary flex justify-center items-center h-96">
        <span class="text-4xl font-extrabold text-white">QUIZ1: TEST YOUR MARKUP LANGUAGE</span>
    </div>
    <div class="flex flex-col items-center p-12 ">
        {{-- questions and choices --}}
        @foreach ($data as $question)
        <div class="card w-11/12 h-auto bg-base-100 shadow-xl mb-10">
            <div class="card-body">
                <h2 class="card-title block text-4xl">{{ $question->question }}</h2>
                {{-- choices --}}
                <div class="mt-6">
                    @foreach ($question->choices as $choice)
                    <label class="block mb-3">
                        <input type="radio" name="question{{ $question->id }}" value="{{ $choice->id }}">
                        <span class="ml-2">{{ $choice->choice }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

        {{-- submit --}}
        <x-primary-button class="mt-14 w-96">
            SUBMIT
        </x-primary-button>

    </div>
</x-app-layout>
