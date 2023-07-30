<x-solution
    lessonNo="2"
    lessonTitle="Market Research - Unveiling Consumer Insights"
    lessonImg="{{ URL('images/icon2.png') }}"
    answer1="Collecting and analyzing information about the market and customers"
    answer2="Surveys and interviews"
    answer3="It provides insights into customers' thoughts and feelings"
    answer4="It allows for benchmarking against industry competitors"
    answer5="All of the above"
>

    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score2 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score2 }}%</p>
        </div>
        <div>
            @if ($score2 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score2 /20 }} question correct. Try again!</p>
            @elseif ($score2 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score2 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer
        quesNo="1"
        quesText="Question 1: What is market research?"
        answer="Collecting and analyzing information about the market and customers"
    />

    <x-answer
        quesNo="2"
        quesText="Question 2: Name two methods of collecting quantitative data in market research."
        answer="Surveys and interviews"
    />

    <x-answer
        quesNo="3"
        quesText="Question 3: How does observation contribute to market research?"
        answer="It provides insights into customers' thoughts and feelings"
    />

    <x-answer
        quesNo="4"
        quesText="Question 4: Why is competitive analysis an important component of market research?"
        answer="It allows for benchmarking against industry competitors"
    />

    <x-answer
        quesNo="5"
        quesText="Question 5: What are some benefits of conducting market research for businesses?"
        answer="All of the above"
    />
</x-solution>