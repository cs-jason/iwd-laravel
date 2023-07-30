<x-solution
    lessonNo="5"
    lessonTitle="Product Development and Pricing"
    lessonImg="{{ URL('images/icon5.png') }}"
    answer1="The process of creating and improving products"
    answer2="To understand customer needs and preferences"
    answer3="To validate product design and functionality"
    answer4="All of the above"
    answer5="Value-based pricing focuses on customer perception of value, while cost-based pricing considers production costs"
>

    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <p class="text-xl text-gray-500">Score</p>
            <div class="w-full h-2 rounded-full bg-gray-300">
                <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score5 }}%;"></div>
            </div>
            <p class="w-16 text-right text-base text-gray-500">{{ $score5 }}%</p>
        </div>
        <div>
            @if ($score5 === 20)
                <p class="text-base text-gray-500">Nice try, you got {{ $score5 /20 }} question correct. Try again!</p>
            @elseif ($score5 === 100) 
                <p class="text-base text-gray-500">Well done! You got all the questions correct!</p>
            @else
                <p class="text-base text-gray-500">Nice try, you got {{ $score5 /20 }} questions correct. Try again!</p>
            @endif
        </div>
    </div>

    <x-answer
        quesNo="1"
        quesText="Question 1: What is product development?"
        answer="The process of creating and improving products"
    />

    <x-answer
        quesNo="2"
        quesText="Question 2: Why is market research important in product development?"
        answer="To understand customer needs and preferences"
    />

    <x-answer
        quesNo="3"
        quesText="Question 3: What is the role of prototyping and testing in the product development process?"
        answer="To validate product design and functionality"
    />

    <x-answer
        quesNo="4"
        quesText="Question 4: What factors should be considered when determining the pricing of a product?"
        answer="All of the above"
    />

    <x-answer
        quesNo="5"
        quesText="Question 5: How does value-based pricing differ from cost-based pricing strategies?"
        answer="Value-based pricing focuses on customer perception of value, while cost-based pricing considers production costs"
    />
</x-solution>