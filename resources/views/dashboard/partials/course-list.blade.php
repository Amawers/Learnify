 {{-- $userData = [
            ["name" => "Christian Jericho Dacoroon", "course" => "HTML", "value" => "10"],
            ["name" => "Mike John Paul Cana", "course" => "CSS", "value" => "20"],
            ["name" => "Daryl James Nangcas", "course" => "JS", "value" => "30"],
            ["name" => "Divina Karla Barcelo", "course" => "LARAVEL", "value" => "40"],
            ["name" => "Verseler Kerr Handuman", "course" => "TAILWIND", "value" => "50"],
      ]; --}}

<div class="flex flex-wrap">
    @foreach ($course as $data)
    <div class="card w-96 bg-base-100 shadow-xl mb-10 ml-4">
        <div class="flex items-center mt-3 -mb-5 z-10">
            <x-instructor-image />
            <x-instructor-name :name="__($data['instructor_name'])"/>
        </div>
        <figure class="px-10 ">
            <x-course-image />
        </figure>
        <div class="card-body items-center text-center">
          <div class="flex items-center justify-between -mt-12 w-72">
            <span class="card-title text-xs">{{ $data["title"] }}</span>
            <x-course-progress :value="$data['progress']"/>
          </div>
          <x-completion-percentage :value="$data['progress']"/>
          <div class="flex justify-start w-72">
            <x-primary-button onclick="window.location='{{ route('course', ['course_id' => $data['course_id']]) }}'">View Course</x-primary-button>
        </div>
        </div>
    </div>
    @endforeach
</div>
