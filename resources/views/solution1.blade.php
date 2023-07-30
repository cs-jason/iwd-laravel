<x-solution
    lessonNo="1"
    lessonTitle="Introduction to Marketing"
    lessonImg="{{ URL('images/icon1.png') }}"
    answer1="The process of creating and delivering value to customers"
    answer2="Product, price, promotion, place"
    answer3="To understand customer needs and preferences"
    answer4="Marketing products using digital channels and technologies"
    answer5="It influences customer perception of the product or service"
>

    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score1 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score1 }}%</p>
        </div>
        <div>
            @if ($score1 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score1 /20 }} question correct. Try again!</p>
            @elseif ($score1 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score1 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer 
    quesNo="1" 
    quesText="Question 1: What is marketing?"
    answer="The process of creating and delivering value to customers" 
    />

    <x-answer 
    quesNo="2" 
    quesText="Question 2: What are the four elements of the marketing mix?"
    answer="Product, price, promotion, place" 
    />

    <x-answer 
    quesNo="3" 
    quesText="Question 3: Why is market research important in marketing?"
    answer="To understand customer needs and preferences" 
    />

    <x-answer 
    quesNo="4" 
    quesText="Question 4: What is digital marketing?"
    answer="Marketing products using digital channels and technologies" 
    />

    <x-answer 
    quesNo="5" 
    quesText="Question 5: How does pricing strategy affect a product or service?"
    answer="It influences customer perception of the product or service" 
    />
</x-quiz>