@props(['lessonNo', 'lessonTitle', 'lessonImg', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5'])

@php
    $quizRoute = '/quiz/' . $lessonNo;
@endphp

<x-layout title="Quiz {{ $lessonNo }}">
    <div class="flex flex-col items-center mt-8">
        <div class="flex flex-col items-center max-w-2xl">
            <div class="w-full">
                <a href="/" class="text-gray-500 hover:text-gray-600 hover:underline">Back to home</a>
            </div>
            <div class="-ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                <div class="bg-white shadow-lg rounded-3xl p-6 pt-8 pb-8 text-justify md:p-16 md:pt-12 md:pb-12">
                    <img src="{{ $lessonImg }}" class="w-24 h-24 rounded-2xl shadow-md"/>
                    <h1 class="text-2xl font-medium mt-6 mb-1 text-gray-500">Quiz {{ $lessonNo }} Solutions</h1>
                    <h2 class="text-2xl font-medium mb-8">{{ $lessonTitle }}</h2>

                    {{ $slot }}

                    <div class="flex flex-col sm:flex-row gap-4 mt-16">
                        @if (!(auth()->check() && app('App\Http\Controllers\UserController')->checkQuizComplete($lessonNo)))
                            <a href="{{ $quizRoute }}" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                                Retry Quiz
                            </a>
                        @endif
                        <a href="/" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                            Return to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>