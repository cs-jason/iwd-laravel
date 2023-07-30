<x-solution
    lessonNo="6"
    lessonTitle="Ethics in Marketing - Building Trust and Responsibility"
    lessonImg="{{ URL('images/icon6.png') }}"
    answer1="All of the above"
    answer2="All of the above"
    answer3="All of the above"
    answer4="All of the above"
    answer5="All of the above"
>
    
    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score6 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score6 }}%</p>
        </div>
        <div>
            @if ($score6 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score6 /20 }} question correct. Try again!</p>
            @elseif ($score6 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score6 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer
        quesNo="1"
        quesText="Question 1: Why is ethics important in marketing?"
        answer="All of the above"
    />
    <x-answer
        quesNo="2"
        quesText="Question 2: What are some ethical considerations related to truth and transparency in marketing?"
        answer="All of the above"
    />
    <x-answer
        quesNo="3"
        quesText="Question 3: How does ethical marketing address consumer privacy?"
        answer="All of the above"
    />
    <x-answer
        quesNo="4"
        quesText="Question 4: Why is fairness and non-discrimination important in marketing practices?"
        answer="All of the above"
    />
    <x-answer
        quesNo="5"
        quesText="Question 5: What is the significance of social responsibility in ethical marketing?"
        answer="All of the above"
    />
</x-solution>