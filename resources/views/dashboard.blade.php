{{-- 
views/dashboard.blade.php 

Extend the 'Layout' component and set the title as "Home" 
--}}

<x-layout title="Home">
    <body onload="dailyNotification()">
        <!-- Introduction section -->
        <div class="flex flex-col mt-8 md:flex-row md:gap-8 lg:gap-16">
            <h1 class="text-3xl font-medium text-gray-800 lg:text-4xl"><span class="brand font-semibold">Bunny. </span><span class="text-gray-500">The best way to learn about marketing.</span></h1>

            <p class="text-gray-500 mt-4 lg:w-96 md:mt-0">Dive deep into how the various aspects of marketing, and level up your skills to support your career in digital marketing.</p>
        </div>

        <!-- Lessons section -->
        <div class="grid grid-cols-3 mt-14 gap-8 lg:grid-cols-6">
            <a href="/lesson/1" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon1.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out"/>
                <p class="text-center text-gray-500 text-sm max-w-32">Introduction to Marketing</p>
            </a>
            <a href="/lesson/2" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon2.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out active:translate-y-0.5"/>
                <p class="text-center text-gray-500 text-sm max-w-32" >Market Research</p>
            </a>
            <a href="/lesson/3" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon3.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out active:translate-y-0.5"/>
                <p class="text-center text-gray-500 text-sm max-w-32" >Branding and Advertising</p>
            </a>
            <a href="/lesson/4" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon4.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out active:translate-y-0.5"/>
                <p class="text-center text-gray-500 text-sm max-w-32" >Digital Marketing</p>
            </a>
            <a href="/lesson/5" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon5.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out active:translate-y-0.5"/>
                <p class="text-center text-gray-500 text-sm max-w-32" >Product and Pricing</p>
            </a>
            <a href="/lesson/6" class="flex flex-col items-center gap-2 hover:-translate-y-1 active:translate-y-0.5 transition duration-200 ease-in-out">
                <img src="{{ URL('images/icon6.png') }}" class="w-20 h-20 rounded-2xl shadow-md hover:shadow-lg transition duration-200 ease-in-out active:translate-y-0.5"/>
                <p class="text-center text-gray-500 text-sm max-w-32" >Marketing Ethics</p>
            </a>
        </div>

        <!-- User-specific content -->
        @auth
            <!-- Display user's name and certificate link if all lessons are completed -->
            <!-- Otherwise, show progress and lesson cards -->
            <div class="flex flex-col justify-between items-start w-full mt-16">
                <div class="flex gap-4 items-center justify-center">
                    <div class="flex flex-col sm:flex-row sm:gap-2">
                        <h2 class="text-2xl text-gray-500 font-medium h-min">
                            Welcome back, 
                        </h2>
                        <h2 class="text-2xl text-gray-800 font-medium h-min">
                            {{ Auth::user()->name }}.
                        </h2>
                    </div>
                    <!-- Certificate ribbon if all lessons are completed -->
                    <!-- Otherwise, display the progress -->
                    @if (auth()->check() && app('App\Http\Controllers\UserController')->checkUserComplete())
                        <a href="{{ route('certificate') }}"><img src="{{ URL('images/blue-ribbon.png') }}" class="ribbon hover:-translate-y-0.5 hover:scale-110 transition duration-200 ease-in-out active:translate-y-0.5 text-center"/></a>
                        </div>
                        <p class="text-gray-500 mt-4">Congratulations! You have completed everything. Click the ribbon to <a href="{{ route('certificate') }}" class="text-blue-600 hover:underline hover:text-blue-700">view your certificate.</a></p>
                    @else
                </div>
                    <!-- Display lesson progress and quiz scores for each lesson -->
                    <!-- Lesson cards with progress data -->
                    <!-- Repeat for all lessons -->
                    <!-- Each lesson card is linked to a specific URL -->
                    @endif            
            </div>

        @else
            <!-- Display welcome message for guests -->
            <!-- Prompt to sign in or create an account -->
            <h2 class="text-2xl text-gray-800 mt-16 font-medium"><span class="text-gray-500">Welcome,</span> Guest.</h2>
            <p class="text-gray-500 mt-4">Looks like you’re not signed in. <a href="{{ route('login') }}" class="text-blue-600 hover:underline hover:text-blue-700">Sign in</a> or <a href="{{ route('register') }}" class="text-blue-600 hover:underline hover:text-blue-700">create an account</a> to view your progress.</p>
        @endauth

        <!-- Display lesson progress and quiz scores for each lesson -->
        <!-- Lesson cards with progress data -->
        <!-- Repeat for all lessons -->

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
            <x-lessoncard 
                lessonUrl="/lesson/1" 
                lessonNo="LESSON 1" 
                lessonImg="{{ URL('images/icon1.png') }}"
                lessonTitle="Introduction to Marketing" 
                lessonText="Learn the basics and importance of marketing in the business world." 
                lessonProgress="{{ isset($progress1) ? $progress1 : 'N/A' }}" 
                quizScore="{{ isset($score1) ? $score1 : 'N/A' }}" 
            />

            <x-lessoncard 
                lessonUrl="/lesson/2" 
                lessonNo="LESSON 2" 
                lessonImg="{{ URL('images/icon2.png') }}"
                lessonTitle="Market Research" 
                lessonText="Discover how to understand customer needs and make informed marketing decisions through research." 
                lessonProgress="{{ isset($progress2) ? $progress2 : 'N/A' }}" 
                quizScore="{{ isset($score2) ? $score2 : 'N/A' }}" 
            />

            <x-lessoncard 
                lessonUrl="/lesson/3"
                lessonNo="LESSON 3" 
                lessonImg="{{ URL('images/icon3.png') }}"
                lessonTitle="Branding and Advertising" 
                lessonText="Explore the power of branding and effective advertising strategies to capture attention and build strong customer relationships." 
                lessonProgress="{{ isset($progress3) ? $progress3 : 'N/A' }}" 
                quizScore="{{ isset($score3) ? $score3 : 'N/A' }}" 
            />

            <x-lessoncard 
                lessonUrl="/lesson/4"
                lessonNo="LESSON 4" 
                lessonImg="{{ URL('images/icon4.png') }}"
                lessonTitle="Digital Marketing" 
                lessonText="Navigate the digital landscape and leverage online channels for effective marketing campaigns." 
                lessonProgress="{{ isset($progress4) ? $progress4 : 'N/A' }}" 
                quizScore="{{ isset($score4) ? $score4 : 'N/A' }}" 
            />

            <x-lessoncard 
                lessonUrl="/lesson/5"
                lessonNo="LESSON 5" 
                lessonImg="{{ URL('images/icon5.png') }}"
                lessonTitle="Product Development and Pricing" 
                lessonText="Understand the process of developing successful products and determining optimal pricing strategies." 
                lessonProgress="{{ isset($progress5) ? $progress5 : 'N/A' }}" 
                quizScore="{{ isset($score5) ? $score5 : 'N/A' }}" 
            />

            <x-lessoncard 
                lessonUrl="/lesson/6"
                lessonNo="LESSON 6" 
                lessonImg="{{ URL('images/icon6.png') }}"
                lessonTitle="Ethics in Marketing" 
                lessonText="Explore the ethical considerations in marketing and learn how to build trust and responsibility in business practices." 
                lessonProgress="{{ isset($progress6) ? $progress6 : 'N/A' }}" 
                quizScore="{{ isset($score6) ? $score6 : 'N/A' }}" 
            />
        </div>

        <h2 class="text-2xl text-gray-500 font-medium mt-16"><span class="text-gray-800">Analytics.</span> View your progress for each lesson.</h2>     
        
        @auth
        <!-- Display lesson progress and quiz scores for each lesson -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-8 shadow rounded-lg block w-full flex-col justify-between">
                <h2 class="text-xl mb-4 text-gray-800">Lessons</h2>
                
                <div class="flex flex-col gap-2">
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">1</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-300 shadow" style="width: {{ $progress1 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress1 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">2</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-400 shadow" style="width: {{ $progress2 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress2 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">3</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-500 shadow" style="width: {{ $progress3 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress3 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">4</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-600 shadow" style="width: {{ $progress4 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress4 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">5</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-700 shadow" style="width: {{ $progress5 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress5 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">6</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-blue-800 shadow" style="width: {{ $progress6 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $progress6 }}%</p>
                    </div>
                </div>

            </div>

            <div class="bg-white p-8 shadow rounded-lg block w-full ease-in-out flex-col justify-between">
                <h2 class="text-xl mb-4 text-gray-800">Quizzes</h2>

                <div class="flex flex-col gap-2">
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">1</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-300 shadow" style="width: {{ $score1 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score1 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">2</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-400 shadow" style="width: {{ $score2 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score2 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">3</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-500 shadow" style="width: {{ $score3 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score3 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">4</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-600 shadow" style="width: {{ $score4 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score4 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">5</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-700 shadow" style="width: {{ $score5 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score5 }}%</p>
                    </div>
                    <div class="flex gap-4 items-center">
                        <p class="w-4 text-xl text-gray-500">6</p>
                        <div class="w-full h-2 rounded-full bg-gray-300">
                            <div class="h-full rounded-full bg-teal-800 shadow" style="width: {{ $score6 }}%;"></div>
                        </div>
                        <p class="w-16 text-right text-base text-gray-500">{{ $score6 }}%</p>
                    </div>
                </div>

            @else
                <div class="mt-6 h-80 bg-white p-8 shadow rounded-lg block w-full flex flex-col items-center justify-center">
                    <img src="{{ URL('images/empty.png') }}" class="w-40 h-40 opacity-70"/>
                    <p class="text-gray-400 text-center mt-4 w-72">Looks like you're not signed in. <a href="{{ route('login') }}" class="text-blue-600 hover:underline hover:text-blue-700">Sign in</a> or <a href="{{ route('register') }}" class="text-blue-600 hover:underline hover:text-blue-700">create an account</a> to view your progress.</p>
                </div>
                <div>
            @endauth
            </div> 
        </div>

        <!-- Notification and WhatsApp sharing scripts -->
        <h2 class="text-2xl text-gray-500 mt-16 mb-16 font-medium w-full">Enjoying Bunny? Share us with your friends on <a id="whatsappShareButton" class="text-green-500 hover:underline hover:text-green-600 active:text-green-400 cursor-pointer">WhatsApp.</a></h2>

        <!-- Calculate whether all lessons are completed -->
        @php
            $allCompleted = true;
            for ($lessonId = 1; $lessonId <= 6; $lessonId++) {
                $progress = App\Models\Progress::where('user_id', Auth::id())
                    ->where('lesson_id', $lessonId)
                    ->first();
    
                if (!$progress || $progress->lesson_percentage != 100 || $progress->score_percentage != 100) {
                    $allCompleted = false;
                    break;
                }
            }
        @endphp

        <script>
            // Notification script
            @auth
                let notificationStatus = {{ $notificationStatus }};
            @else
                let notificationStatus = 1;
            @endauth

            notificationStatus = !notificationStatus;

            function displayNotification() {
                if (!("Notification" in window)) {
                    return;
                }

                if (Notification.permission === "granted") {
                    new Notification("Bunny", {
                        body: "Remember to complete your lessons!",
                    });
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then(perm => {
                        if (perm === "granted") {
                            displayNotification();
                        }
                    });
                }
            }

            function dailyNotification() {
                if (notificationStatus == 1) {
                    console.log("Notification function is running");
                    const now = new Date();
                    const setTime = new Date(now);
                    setTime.setHours(8, 0, 0, 0);

                    if (setTime <= now) {
                        setTime.setDate(setTime.getDate() + 1);
                    }
                    
                    const timeUntilSetTime = setTime - now;

                    setTimeout(() => displayNotification(), timeUntilSetTime);
                } else {
                    console.log("Notifications disabled");
                }
            }

            // WhatsApp sharing script
            function shareViaWhatsApp() {
                console.log("Sharing via WhatsApp")
                var currentURL = window.location.href;
                var customMessage = "Come join me over at " + currentURL + "! It's a great place for learning marketing. See you there!";
                var whatsappURL = "https://api.whatsapp.com/send?text=" + encodeURIComponent(customMessage);
                window.open(whatsappURL, "_blank");
            }
        
            document.getElementById("whatsappShareButton").addEventListener("click", function () {
                shareViaWhatsApp();
            });

        </script>
    </body>
</x-layout>

<style>
    .bg-image {
        background-image: url('{{ URL('images/gold-ribbon.png') }}');
    }

    .ribbon {
        width: 32px;
        height: 32px;
        min-width: 32px;
    }
</style>