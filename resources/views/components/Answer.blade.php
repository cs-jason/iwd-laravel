{{--
    This component is used to display a question and its corresponding answer.
    It receives the following props: 'quesNo' for the question number, 'quesText' for the question text, and 'answer' for the answer text. 
--}}
@props(['quesNo', 'quesText', 'answer'])

<div class="ques">
    <!-- Display the question text -->
    <p class="text-lg text-left mb-4 text-gray-800">{{ $quesText }}</p>

    <!-- Create an unordered list for the multiple-choice options -->
    <ul class="flex flex-col gap-2 mb-12">
        <li>
            <!-- Create a hidden radio input for the answer option -->
            <input type="radio" id="q{{ $quesNo }}a" name="q{{ $quesNo }}" value="a" class="hidden peer" required>

            <!-- Create a label for the radio input to improve accessibility and styling -->
            <label for="q{{ $quesNo }}a" class="inline-flex items-center w-full px-4 py-2 text-green-700 bg-green-100 border border-green-300 rounded-lg">           
                <!-- Display the answer text inside the label -->
                <div class="block w-full">{{ $answer }}</div>
            </label>
        </li>
    </ul>
</div>
