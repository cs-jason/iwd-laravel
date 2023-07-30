{{-- Define the props that this component accepts: 'lessonNo' for the lesson number, 'lessonTitle' for the lesson title, and 'lessonImg' for the lesson image. --}}
@props(['lessonNo', 'lessonTitle', 'lessonImg'])

{{-- Create the route for the quiz based on the lesson number. --}}
@php
    $quizRoute = '/quiz/' . $lessonNo;
@endphp

{{-- Extend the 'Layout' component and set the title using the lesson number. --}}
<x-layout title="Lesson {{ $lessonNo }}">
    <div class="flex flex-col items-center mt-8">
        <div class="flex flex-col items-center max-w-2xl">
            <!-- Link to go back to the homepage -->
            <div class="w-full">
                <a href="/" class="text-gray-500 hover:text-gray-600 hover:underline">Back to home</a>
            </div>
            
            <!-- Form to mark the lesson as complete -->
            <form action="{{ route('lesson.markComplete', ['lessonId' => $lessonNo]) }}" method="post"
                class="-ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                @csrf
                <div class="bg-white shadow-lg rounded-3xl p-6 pt-8 pb-8 text-justify md:p-16 md:pt-12 md:pb-12">
                    <!-- Lesson image -->
                    <img src="{{ $lessonImg }}" class="w-24 h-24 rounded-2xl shadow-md"/>
                    
                    <!-- Lesson number and title -->
                    <h1 class="text-2xl font-medium mt-6 mb-1 text-gray-500">Lesson {{ $lessonNo }}</h1>
                    <h2 class="text-2xl font-medium mb-8 text-left">{{ $lessonTitle }}</h2>
                    
                    <!-- Content of the lesson, inserted dynamically using the 'slot' directive -->
                    {{ $slot }}
                    
                    <!-- Buttons for marking the lesson as complete and taking the quiz -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-16">
                        <button type="submit"
                            class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5">
                            Mark as Complete
                        </button>
            
                        <!-- Check if the user is authenticated and if the lesson is already marked as complete to show the 'Take Quiz' button -->
                        @if (auth()->check() && app('App\Http\Controllers\UserController')->checkLessonComplete($lessonNo))
                            <a href="{{ $quizRoute }}"
                                class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                                Take Quiz
                            </a>
                        @else
                            <!-- If the lesson is not marked as complete, show a disabled button with a tooltip -->
                            <div class="relative group flex items-center w-full">
                                <div class="bg-gray-300 text-gray-400 border w-full px-4 py-2 rounded-lg shadow text-center">
                                    Take Quiz
                                </div>
                                <div class="hidden group-hover:block absolute top-full left-1/2 transform -translate-x-1/2 px-4 py-3 bg-gray-800 text-gray-100 text-sm rounded shadow w-48 mt-2 text-left">
                                    Complete the lesson first to unlock the quiz.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Popup message displayed when a success message is available in the session -->
    @if(session('success'))
        <div id="popup" class="fixed top-8 right-8 bg-green-200 border border-green-500 text-green-800 px-4 py-2 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif
</x-layout>

<style>
    /* Style for paragraphs inside the form to be justified */
    form p {
        text-align: justify;
    }
</style>

<script>
    // Hide the popup message when clicked
    document.getElementById('popup').addEventListener('click', function() {
        this.style.display = 'none';
    });
</script>
