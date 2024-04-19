<x-app-layout>
    <div class="m-12">
        {{-- header --}}
        <div class="flex items-center">
            <x-instructor-image />
            <x-instructor-name :name="$instructor_name" />
        </div>

        {{-- course info --}}
        <div class="flex-col items-center m-10">
            <span class="text-3xl font-extrabold">{{ $title }} Course</span>
            <p class="font-bold">{{ $description }}</p>
        </div>

        {{-- objectives --}}
        <div class="flex-col items-center m-10">
            <span class="block font-extrabold">Course Objectives</span>
            @foreach ($objectives as $objective)
                <x-course-objective :val="__($objective)" />
            @endforeach
        </div>

        {{-- topics --}}
        <div class="flex-col items-center m-10">
            <span class="block font-extrabold">Course Topics</span>
            @foreach ($topics as $topic)
                <x-course-topic :val="__($topic)" />
            @endforeach
        </div>

        {{-- materials --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Learning Materials</span>
            <div class="flex flex-wrap">
                @foreach ($materials as $material)
                    <x-learning-video :val="__($material)" />
                @endforeach
            </div>
        </div>

        {{-- files --}}
        @foreach ($files as $file)
            <div class="card w-11/12 bg-base-100 shadow-xl ml-12  mb-7">
                <div class="card-body w-full flex flex-row items-center">
                    <x-file-image />
                    <x-course-topic :val="__($file)" />
                    <x-file-title />
                </div>
            </div>
        @endforeach

        {{-- activities --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Activities</span>
            @foreach ($activities as $activities)
                <a onclick="window.location='{{ url('/quiz') }}'">
                    <div class="card w-11/12 bg-base-100 shadow-xl ml-12  mb-7">
                        <div class="card-body w-full flex flex-row items-center">
                            <x-file-image />
                            <x-course-topic :val="__($activities)" />
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- forum --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Forum</span>
            <div class="w-96 ml-20 mb-5">
                <div class="chat chat-start">
                    <div class="chat-bubble">It's over Anakin, <br />I have the high ground.</div>
                </div>
                <div class="chat chat-end">
                    <div class="chat-bubble">You underestimate my power!</div>
                </div>
            </div>
            <input type="text" placeholder="Type your response"
                class="ml-20 input input-bordered w-full max-w-xs rounded-full" />
        </div>
    </div>

</x-app-layout>
