@props(['lessonNo', 'lessonTitle', 'lessonImg', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5'])

@php
    $solutionRoute = '/quiz/' . $lessonNo . '/solution';
@endphp

<x-layout title="Quiz {{ $lessonNo }}">
    <div class="flex flex-col items-center mt-8">
        <div class="flex flex-col items-center max-w-2xl">
            <div class="w-full">
                <a href="/" class="text-gray-500 hover:text-gray-600 hover:underline">Back to home</a>
            </div>
            <form id="quiz" action="{{ route('quiz.submit', ['lessonId' => $lessonNo]) }}" method="post"
                class="-ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                @csrf
                <div class="bg-white shadow-lg rounded-3xl p-6 pt-8 pb-8 text-justify md:p-16 md:pt-12 md:pb-12">
                    <img src="{{ $lessonImg }}" class="w-24 h-24 rounded-2xl shadow-md"/>
                    <h1 class="text-2xl font-medium mt-6 mb-1 text-gray-500">Quiz {{ $lessonNo }}</h1>
                    <h2 class="text-2xl font-medium mb-8 text-left">{{ $lessonTitle }}</h2>

                    {{ $slot }}

                    <button type="submit"
                        class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg mt-10 focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5"
                    >
                        Submit Quiz
                    </button>
                    <input type="hidden" name="value" id="scoreValue">
                </div>
            </form>

            <script>
                const lessonId = {{ $lessonNo }};
                const ans1 = "{{ $answer1 }}";
                const ans2 = "{{ $answer2 }}";
                const ans3 = "{{ $answer3 }}";
                const ans4 = "{{ $answer4 }}";
                const ans5 = "{{ $answer5 }}";
            
                // Add an event listener to the form submission
                document.getElementById('quiz').addEventListener('submit', function(event) {
                    // Prevent the default form submission behavior
                    event.preventDefault();
            
                    // Retrieve user-selected answers
                    var choice1 = document.querySelector('input[name="q1"]:checked');
                    var choice2 = document.querySelector('input[name="q2"]:checked');
                    var choice3 = document.querySelector('input[name="q3"]:checked');
                    var choice4 = document.querySelector('input[name="q4"]:checked');
                    var choice5 = document.querySelector('input[name="q5"]:checked');
                    // Add more variables for other questions
            
                    // Check if all questions are answered
                    if (choice1 && choice2 && choice3 && choice4 && choice5) {
                        // Calculate quiz score
                        var score = 0;
                        if (choice1.value === ans1) score += 20;
                        if (choice2.value === ans2) score += 20;
                        if (choice3.value === ans3) score += 20;
                        if (choice4.value === ans4) score += 20;
                        if (choice5.value === ans5) score += 20;
            
                        console.log("Score:", score);
            
                        document.getElementById('scoreValue').value = score;
                        // Submit the form
                        document.getElementById('quiz').submit();
            
                        // Submit the form asynchronously using fetch API
                        fetch('{{ route('quiz.submit', ['lessonId' => $lessonNo]) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams(new FormData(document.getElementById('quiz')))
                        })
                        .then(response => {
                            if (response.ok) {
                                // Form submitted successfully, redirect the user
                                window.location.href = "{{ $solutionRoute }}";
                            } else {
                                // Handle the error here if needed
                                console.error('Form submission failed:', response);
                                alert("Please answer all questions.");
                            }
                        })
                        .catch(error => {
                            // Handle the error here if needed
                            console.error('Error submitting the form:', error);
                            alert("Please answer all questions.");
                        });

                    } else {
                        return false;
                    }
                });                
            </script>
        </div>
    </div>
</x-layout>