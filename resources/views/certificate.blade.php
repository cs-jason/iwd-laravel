{{-- 
views/certificate.blade.php 

Extend the 'Layout' component and set the title as "Certificate"
--}}

<x-layout title="Certificate">
    @if (auth()->check() && app('App\Http\Controllers\UserController')->checkUserComplete())
        <!-- If the user is authenticated and has completed all the lessons, show the certificate -->
        <body>
            <!-- Link to go back to the homepage -->
            <a href="/" class="text-gray-500 hover:text-gray-700 focus:text-gray-400">Back</a>
            <!-- Container for the certificate content -->
            <div class="-ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                <div class="mx-auto bg-white p-8 mt-4 rounded-lg shadow-lg">
                    <!-- Certificate design with user information -->
                    <div class="border flex flex-col items-center justify-center p-16 text-center">
                        <h1 class="cert-title text-5xl mb-6 text-gray-700">Certificate of Completion</h1>
                        <img src="{{ URL('images/blue-ribbon.png') }}" class="w-32 h-32 mb-6"/>
                        <p class="cert-text mb-6 tracking-widest text-gray-500">THIS IS TO CERTIFY THAT</p>
                        <h2 class="cert-name text-4xl font-bold mb-6">{{ Auth::user()->name }}</h2>
                        <p class="cert-text text-gray-500 mb-16 uppercase tracking-widest">has successfully completed the Marketing Course</p>
                        <p class="cert-text text-gray-500 mb-4 uppercase tracking-widest">Proudly presented by</p>
                        <div class="flex gap-2 items-center">
                            <img src="{{ URL('images/bunny-logo.png') }}" class="w-10 h-10">
                            <p class="text-2xl font-semibold text-gray-800 brand">Bunny</p>
                        </div>
                    </div>
                </div>
                <div class="px-6">
                    <!-- Section to share certificate via WhatsApp -->
                    <h2 class="text-xl text-gray-500 mt-16 mb-16 font-medium w-full text-center">Enjoyed learning with Bunny? <br>Spread the knowledge with your friends on <a id="whatsappShareButton" class="text-green-500 hover:underline hover:text-green-600 active:text-green-400 cursor-pointer">WhatsApp.</a></h2>
                </div>
            </div>

            <script>
                // Function to share the certificate link via WhatsApp
                function shareViaWhatsApp() {
                    console.log("Sharing via WhatsApp")
                    var currentURL = window.location.href;
                    var customMessage = "Come join me over at " + currentURL + "! It's a great place for learning marketing. See you there!";
                    var whatsappURL = "https://api.whatsapp.com/send?text=" + encodeURIComponent(customMessage);
                    window.open(whatsappURL, "_blank");
                }

                // Add a click event listener to the WhatsApp share button
                document.getElementById("whatsappShareButton").addEventListener("click", function () {
                    shareViaWhatsApp();
                });
            </script>
        </body>
    @else
    <script>
        // Redirect to the 404 page for non-authenticated users and non-completed users
        // if (!@json(Auth::check())) {
            window.location.href = '/404';
        // }
    </script>
    @endauth
</x-layout>

<style>
    /* Certificate border styling */
    .border {
        box-shadow:
        inset #009688 0 0 0 5px, 
        inset #059c8e 0 0 0 1px, 
        inset #0cab9c 0 0 0 10px, 
        inset #1fbdae 0 0 0 11px, 
        inset #8ce9ff 0 0 0 16px, 
        inset #48e4d6 0 0 0 17px, 
        inset #e5f9f7 0 0 0 21px, 
        inset #bfecf7 0 0 0 22px;
        border-radius: 0.5rem;
    }
    /* Font styling for certificate elements */
    .cert-title {
        font-family: 'UnifrakturCook', cursive;
    }

    .cert-name {
        font-family: 'Meie', cursive;
    }

    .cert-text {
        font-family: 'PlayfairDisplay' , serif;
    }
</style>