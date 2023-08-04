{{-- 
components/Solution.blade.php

Define the props that this component accepts:
'lessonNo' for the lesson number, 'lessonTitle' for the lesson title, 'lessonImg' for the lesson image,
'answer1', 'answer2', 'answer3', 'answer4', and 'answer5' for the correct answers.
--}}
@props(['lessonNo', 'lessonTitle', 'lessonImg', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5'])

{{-- Create the quiz route based on the lesson number. --}}
@php
    $quizRoute = '/quiz/' . $lessonNo;
@endphp

{{-- Extend the 'Layout' component and set the title using the lesson number. --}}
<x-layout title="Quiz {{ $lessonNo }}">
    <div class="flex flex-col items-center mt-8">
        <div class="flex flex-col items-center max-w-2xl">
            <!-- Link to go back to the homepage -->
            <div class="w-full">
                <a href="/" class="text-gray-500 hover:text-gray-600 hover:underline">Back to home</a>
            </div>
            <div class="-ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                <!-- Container for the solution content -->
                <div class="bg-white shadow-lg rounded-3xl p-6 pt-8 pb-8 text-justify md:p-16 md:pt-12 md:pb-12">
                    <!-- Lesson image -->
                    <img src="{{ $lessonImg }}" class="w-24 h-24 rounded-2xl shadow-md"/>
                    <!-- Solution title -->
                    <h1 class="text-2xl font-medium mt-6 mb-1 text-gray-500">Quiz {{ $lessonNo }} Solutions</h1>
                    <!-- Lesson title -->
                    <h2 class="text-2xl font-medium mb-8">{{ $lessonTitle }}</h2>
                    
                    <!-- Content of the quiz solutions, inserted dynamically using the 'slot' directive -->
                    {{ $slot }}
                    
                    <!-- Buttons to retry the quiz or return to home -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-16">
                        <!-- Retry quiz button -->
                        @if (!(auth()->check() && app('App\Http\Controllers\UserController')->checkQuizComplete($lessonNo)))
                            <a href="{{ $quizRoute }}" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                                Retry Quiz
                            </a>
                        @endif
                        <!-- Return to home button -->
                        <a href="/" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                            Return to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
