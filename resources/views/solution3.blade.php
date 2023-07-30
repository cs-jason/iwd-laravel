<x-solution
    lessonNo="3"
    lessonTitle="Branding and Advertising"
    lessonImg="{{ URL('images/icon3.png') }}"
    answer1="Establishing a unique identity for a product or company"
    answer2="Personality, positioning, and purpose"
    answer3="All of the above"
    answer4="All of the above"
    answer5="All of the above"
>
    
    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score3 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score3 }}%</p>
        </div>
        <div>
            @if ($score3 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score3 /20 }} question correct. Try again!</p>
            @elseif ($score3 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score3 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer
        quesNo="1"
        quesText="Question 1: What is branding?"
        answer="Establishing a unique identity for a product or company"
    />

    <x-answer
        quesNo="2"
        quesText="Question 2: What are the key components of branding?"
        answer="Personality, positioning, and purpose"
    />

    <x-answer
        quesNo="3"
        quesText="Question 3: How does advertising contribute to promoting a brand?"
        answer="All of the above"
    />

    <x-answer
        quesNo="4"
        quesText="Question 4: Name two forms of advertising media."
        answer="All of the above"
    />

    <x-answer
        quesNo="5"
        quesText="Question 5: Why is it important to evaluate the effectiveness of advertising campaigns?"
        answer="All of the above"
    />
</x-solution>