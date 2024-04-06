<x-app-layout>
    <div class="m-12">
        {{-- header --}}
        <div class="flex items-center">
            <x-instructor-image />
            <x-instructor-name :name="__('Christian Dacoroon')" />
        </div>

        {{-- course info --}}
        <div class="flex-col items-center m-10">
            <span class="text-3xl font-extrabold">HTML Course</span>
            <p class="font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus consequuntur porro
                quisquam nam.
                Quia, vitae atque voluptatibus, esse facilis aut hic excepturi quos et totam exercitationem? Culpa quas
                deleniti soluta?
                Doloribus, eveniet nemo. Ea laborum officiis repellat dolorem aperiam architecto dolores necessitatibus
                itaque repellendus mollitia suscipit optio quos ullam, est odit voluptatibus, distinctio fuga dolorum
                facilis iusto nostrum magnam. Alias?
            </p>
        </div>

        {{-- objectives --}}
        <div class="flex-col items-center m-10">
            <span class="block font-extrabold">Course Objectives</span>
            <x-course-objective />
        </div>

        {{-- topics --}}
        <div class="flex-col items-center m-10">
            <span class="block font-extrabold">Course Topics</span>
            <x-course-topic />
        </div>

        {{-- materials --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Learning Materials</span>
            <div class="flex flex-wrap">
                <x-learning-video />
                <x-learning-video />
                <x-learning-video />
                <x-learning-video />
            </div>
        </div>

        {{-- files --}}
        <div class="card w-11/12 bg-base-100 shadow-xl ml-12  mb-7">
            <div class="card-body w-full flex flex-row items-center">
                <x-file-image />
                <x-file-title />
            </div>
        </div>

        {{-- activities --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Activities</span>
            <div class="card w-11/12 bg-base-100 shadow-xl ml-12  mb-7">
                <div class="card-body w-full flex flex-row items-center">
                    <x-file-image />
                    <x-file-title />
                </div>
            </div>
        </div>

        {{-- forum --}}
        <div>
            <span class="text-3xl font-extrabold ml-20 mb-3 block">Forum</span>
            <div class="w-96 ml-20 mb-5">
                <div class="chat chat-start">
                    <div class="chat-bubble">It's over Anakin, <br/>I have the high ground.</div>
                </div>
                <div class="chat chat-end">
                    <div class="chat-bubble">You underestimate my power!</div>
                </div>
            </div>
            <input type="text" placeholder="Type your response" class="ml-20 input input-bordered w-full max-w-xs rounded-full" />
        </div>
    </div>

</x-app-layout>
