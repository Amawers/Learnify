<x-app-layout>
    {{-- header --}}
    <div class="bg-primary flex justify-center items-center h-96">
        <span class="text-4xl font-extrabold text-white">QUIZ1: TEST YOUR MARKUP LANGUAGE</span>
    </div>
    <div class="flex flex-col items-center p-12 ">
        {{-- question --}}
        <div class="card w-11/12 h-72 bg-base-100 shadow-xl">
            <div class="card-body flex items-center justify-center">
                <h2 class="card-title block text-4xl">Question 1</h2>
                <span class="block text-xl">Nganong single man ko?</span>
            </div>
        </div>

        {{-- answers --}}
        <div class="card w-11/12 h-36 bg-base-100 shadow-xl mt-10">
            <div class="card-body flex items-start justify-center">
                <span class="block font-extrabold">A. Kai gwapo man ka.</span>
            </div>
        </div>

        {{-- submit --}}
        <x-primary-button class="mt-14 w-96">
            SUBMIT
        </x-primary-button>

    </div>
</x-app-layout>
