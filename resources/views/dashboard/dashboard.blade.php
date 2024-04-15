<?php
    $test = [
        [1, 2, 3],
        [4, 5, 6]
    ];
?>
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="flex justify-center items-center h-80">
        <span class="text-4xl font-extrabold">Take IT education experience to the next level.</span>
    </div>
    <div class="p-7">
        <span class="text-3xl font-extrabold block mb-4">Courses</span>
        @if (!empty($course))
            @include('dashboard.partials.course-list', ['course' => $course]);
        @else
            <p class="flex justify-center items-center h-32 font-extrabold">No Course Enrolled</p>
        @endif
    </div>
</x-app-layout>
