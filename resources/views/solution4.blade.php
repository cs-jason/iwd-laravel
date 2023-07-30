<x-solution
    lessonNo="4"
    lessonTitle="Digital Marketing - Navigating the Online Landscape"
    lessonImg="{{ URL('images/icon4.png') }}"
    answer1="Marketing products using digital channels and technologies"
    answer2="Search engine optimization and social media integration"
    answer3="All of the above"
    answer4="Creating engaging and valuable content to attract and retain customers"
    answer5="All of the above"
>

    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score4 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score4 }}%</p>
        </div>
        <div>
            @if ($score4 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score4 /20 }} question correct. Try again!</p>
            @elseif ($score4 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score4 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer
        quesNo="1"
        quesText="Question 1: What is digital marketing?"
        answer="Marketing products using digital channels and technologies"
    />

    <x-answer
        quesNo="2"
        quesText="Question 2: Name two key components of website development for digital marketing."
        answer="Search engine optimization and social media integration"
    />

    <x-answer
        quesNo="3"
        quesText="Question 3: How does social media marketing contribute to a business's digital presence?"
        answer="All of the above"
    />

    <x-answer
        quesNo="4"
        quesText="Question 4: What is content marketing, and how does it benefit businesses?"
        answer="Creating engaging and valuable content to attract and retain customers"
    />

    <x-answer
        quesNo="5"
        quesText="Question 5: How can data analytics help optimize digital marketing campaigns?"
        answer="All of the above"
    />
</x-solution>