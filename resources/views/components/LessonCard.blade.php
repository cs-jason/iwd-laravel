
{{-- 
    Define the props that this component accepts:
    'lessonUrl' for the URL of the lesson, 'lessonNo' for the lesson number, 'lessonImg' for the lesson image,
    'lessonTitle' for the lesson title, 'lessonText' for the lesson description,
    'lessonProgress' for the progress percentage of the lesson, and 'quizScore' for the quiz score. 
--}}
@props(['lessonUrl', 'lessonNo', 'lessonImg', 'lessonTitle', 'lessonText', 'lessonProgress', 'quizScore'])

{{-- Link to the lesson URL with a card-like layout for displaying the lesson information. --}}
<a href="{{ $lessonUrl }}" class="bg-white p-8 shadow rounded-lg block w-full hover:shadow-lg hover:-translate-y-0.5 transition duration-200 ease-in-out active:translate-y-0.5 flex flex-col justify-between">

    <!-- Lesson information displayed inside the card -->
    <div class="flex flex-col gap-4">
        <!-- Display the lesson number with gray text in uppercase and tracking-widest for letter spacing -->
        <h4 class="text-xs text-gray-500 capitalize tracking-widest">{{ $lessonNo }}</h4>
        <!-- Display the lesson image -->
        <img src="{{ $lessonImg }}" class="w-24 h-24 rounded-2xl shadow-md"/>
        <!-- Display the lesson title with larger text and medium font weight -->
        <h3 class="text-xl text-gray-800 font-medium">{{ $lessonTitle }}</h1>
        <!-- Display the lesson description with base-sized text in gray color -->
        <p class="text-base text-gray-500">{{ $lessonText }}</p>
    </div>

    <!-- Additional information displayed only for authenticated users -->
    @auth
        <div class="text-gray-400 mt-12 flex justify-between">
            <div>
                <!-- Display the lesson progress with a label "Progress" -->
                <p class="mb-1">Progress</p>
                <!-- Display the quiz score with a label "Score" -->
                <p>Score</p>
            </div>
            <div>
                <!-- Display the lesson progress percentage -->
                <p class="mb-1">{{ $lessonProgress }}%</p>
                <!-- Display the quiz score percentage -->
                <p>{{ $quizScore }}%</p>
            </div>
        </div>
    @endauth
</a>
