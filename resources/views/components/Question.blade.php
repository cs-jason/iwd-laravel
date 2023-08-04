{{-- 
components/Question.blade.php

Define the props that this component accepts:
'quesNo' for the question number, 'quesText' for the question text,
'choiceA', 'choiceB', 'choiceC', and 'choiceD' for the answer choices. 
--}}
@props(['quesNo', 'quesText', 'choiceA', 'choiceB', 'choiceC', 'choiceD'])

{{-- Create a container for a single question. --}}
<div class="ques">
    <!-- Display the question text -->
    <p class="text-lg text-left mb-4 text-gray-800">{{ $quesText }}</p>
    
    <!-- Create an unordered list for the answer choices -->
    <ul class="flex flex-col gap-2 mb-12">
        
        <!-- Answer choice A -->
        <li class="max-h-min flex -ml-3">
            <!-- Radio input for answer choice A -->
            <input type="radio" id="q{{ $quesNo }}a" name="q{{ $quesNo }}" value="a" class="peer opacity-0" required>
            <!-- Label for the radio input with styling for interactivity -->
            <label for="q{{ $quesNo }}a" class="inline-flex items-center w-full px-4 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-300 peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">           
                <!-- Display the answer choice A text -->
                <div class="block w-full">{{ $choiceA }}</div>
            </label>
        </li>
        
        <!-- Answer choice B (similar structure as choice A) -->
        <li class="max-h-min flex -ml-3">
            <input type="radio" id="q{{ $quesNo }}b" name="q{{ $quesNo }}" value="b" class="peer opacity-0" required>
            <label for="q{{ $quesNo }}b" class="inline-flex items-center w-full px-4 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-300 peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">           
                <div class="block w-full">{{ $choiceB }}</div>
            </label>
        </li>
        
        <!-- Answer choice C (similar structure as choice A) -->
        <li class="max-h-min flex -ml-3">
            <input type="radio" id="q{{ $quesNo }}c" name="q{{ $quesNo }}" value="c" class="peer opacity-0" required>
            <label for="q{{ $quesNo }}c" class="inline-flex items-center w-full px-4 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-300 peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">           
                <div class="block w-full">{{ $choiceC }}</div>
            </label>
        </li>
        
        <!-- Answer choice D (similar structure as choice A) -->
        <li class="max-h-min flex -ml-3">
            <input type="radio" id="q{{ $quesNo }}d" name="q{{ $quesNo }}" value="d" class="peer opacity-0" required>
            <label for="q{{ $quesNo }}d" class="inline-flex items-center w-full px-4 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-300 peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">           
                <div class="block w-full">{{ $choiceD }}</div>
            </label>
        </li>
    </ul>
</div>
