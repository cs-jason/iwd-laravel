{{-- views/settings.blade.php --}}

{{-- Extend the 'Layout' component and set the title as "Settings" --}}
<x-layout title="Settings">
    <div class="flex flex-col items-center mt-8">
        <div class="flex flex-col items-center max-w-2xl">
            
            {{-- Account settings section --}}
            <div class="w-full">
                <h1 class="text-3xl font-medium mb-2">Account Settings</h1>
            </div>
            
            {{-- Profile section --}}
            <div class="flex flex-col h-full -ml-6 -mr-6 mt-4 md:ml-0 md:mr-0 mb-16">
                <div class="bg-white shadow-lg rounded-3xl p-6 pt-8 pb-8 text-left md:p-16 md:pt-12 md:pb-12 w-full ">
                    <div class="flex flex-col justify-between">
                        <div class="flex gap-6 mb-12">
                            {{-- User profile image --}}
                            <div class="border border-blue-300 rounded-full w-24 h-24 bg-blue-100">
                                <img src="{{ URL("images/bunny3.png") }}" class="rounded-full"/>
                            </div>
                            {{-- User information --}}
                            <div class="flex flex-col h-auto justify-center text-start gap-1">
                                <p class="text-2xl text-gray-800 font-medium">{{ auth()->user()->name }}</p>
                                <p class="text-xl text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        
                        {{-- Personal Information form --}}
                        <hr class="border-gray-300 mb-8">
                        <form method="POST" action="{{ route('settings.update') }}" class="max-w-xs">
                            @csrf
                            <h2 class="text-2xl font-medium text-gray-500 mb-8">Personal Information</h2>
                            
                            {{-- Name input --}}
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-gray-500">Name</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your full name">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Email input --}}
                            <div class="mb-8">
                                <label for="email" class="block mb-2 text-gray-500">Email</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required autocomplete="email" class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your email">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            {{-- Update Account button --}}
                            <div class="min-w-min mb-12">
                                <button type="submit" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-300 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">Update Account</button>
                            </div>
                        </form>
                        
                        {{-- Notifications section --}}
                        <hr class="border-gray-300 mb-8">
                        <div>
                            <h2 class="text-2xl font-medium text-gray-500 mb-8">Notifications</h2>
                            {{-- Daily Reminders settings --}}
                            <h3 class="text-xl text-gray-800 mb-1">Daily Reminders</h3>
                            <p class="text-gray-500 mb-4">By turning on daily reminders, you will receive a notification at 8:00 a.m. every morning as a reminder to read your lessons.</p>
                            <form action="{{ route('notification.update') }}" method="post" class="flex items-center mb-12">
                                @csrf
                                {{-- Toggle button for notifications --}}
                                <div class="relative group flex items-center">
                                    <button type="submit" id="notification-button">
                                        @if ($notificationStatus === 1)
                                            <div class="relative group flex items-center">
                                                <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full">
                                                    <div class="absolute top-[2px] left-[2px] bg-white border border-gray-300 rounded-full h-4 w-4 transition-all"></div>
                                                </div>    
                                                <span class="ml-3 text-gray-500">Notifications are off</span>
                                            </div>
                                        @elseif ($notificationStatus === 0)
                                            <div class="relative group flex items-center">
                                                <div class="relative w-9 h-5 bg-blue-600 peer-focus:outline-none rounded-full">
                                                    <div class="absolute top-[2px] left-[2px] bg-white border border-gray-300 rounded-full h-4 w-4 transition-all translate-x-full"></div>
                                                </div>
                                                <span class="ml-3 text-gray-500">Notifications are on</span>
                                            </div>
                                        @endif
                                    </button>
                                
                                    {{-- Tooltip for the toggle button --}}
                                    <div class="hidden group-hover:block absolute top-full px-4 py-2 bg-gray-800 text-gray-100 text-sm rounded shadow w-64 mt-2">
                                        Toggle for a daily reminder at 8am everyday to read your lessons.
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        {{-- Danger Zone section --}}
                        <hr class="border-gray-300 mb-8">
                        <div>
                            <h2 class="text-2xl font-medium text-gray-500 mb-8">Danger Zone</h2>
                            {{-- Reset Progress form --}}
                            <h3 class="text-xl text-gray-800 mb-1">Reset Progress</h3>
                            <p class="text-gray-500 mb-4">Resetting your progress is a permanent action. All your lesson progress and quiz scores will be set to zero.</p>
                            <form method="POST" action="{{ route('settings.reset-progress') }}">
                                @csrf
                                @method('POST')
                                {{-- Reset Progress button with modal trigger --}}
                                <button type="button" id="resetProgressBtn" class="text-orange-500 px-4 py-2 rounded-xl border border-orange-500 hover:bg-orange-500 hover:text-gray-100 active:bg-orange-600 transition duration-200 ease-in-out active:translate-y-0.5 mb-8">Reset Progress</button>
                                {{-- Modal for Reset Progress --}}
                                <div id="resetProgressModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-10 hidden">
                                    <div class="bg-white p-6 rounded-lg">
                                        <h2 class="text-lg font-medium text-gray-800 mb-4">Are you sure you want to reset your progress?</h2>
                                        <p class="text-sm text-gray-600 mb-6">This action cannot be undone.</p>
                                        <div class="flex justify-end">
                                            <button type="button" id="cancelResetBtn" class="text-gray-600 text-sm hover:text-gray-800 focus:outline-none mr-4">Cancel</button>
                                            <button type="submit" class="text-orange-500 text-sm hover:text-orange-600 hover:underline focus:outline-none">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            {{-- Delete Account form --}}
                            <h3 class="text-xl text-gray-800 mb-1">Account Deletion</h3>
                            <p class="text-gray-500 mb-4">Deleting your account is a permanent action. You won't be able to retrieve your account. Only delete your account if you are sure.</p>
                            <form id="deleteAccountForm" method="POST" action="{{ route('settings.delete') }}">
                                @csrf
                                @method('DELETE')
                                {{-- Delete Account button with modal trigger --}}
                                <button type="button" id="deleteAccountBtn" class="text-red-500 px-4 py-2 rounded-xl border border-red-500 hover:bg-red-500 hover:text-gray-100 active:bg-red-600 transition duration-200 ease-in-out active:translate-y-0.5">Delete Account</button>
                                {{-- Modal for Delete Account --}}
                                <div id="deleteAccountModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-10 hidden">
                                    <div class="bg-white p-6 rounded-lg">
                                        <h2 class="text-lg font-medium text-gray-800 mb-4">Are you sure you want to delete your account?</h2>
                                        <p class="text-sm text-gray-600 mb-6">This action cannot be undone.</p>
                                        <div class="flex justify-end">
                                            <button type="button" id="cancelDeleteBtn" class="text-gray-600 text-sm hover:text-gray-800 focus:outline-none mr-4">Cancel</button>
                                            <button type="submit" class="text-red-500 text-sm hover:text-red-700 hover:underline focus:outline-none">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- JavaScript for modals --}}
            <script>
                function showResetModal() {
                    document.getElementById('resetProgressModal').classList.remove('hidden');
                }

                function hideResetModal() {
                    document.getElementById('resetProgressModal').classList.add('hidden');
                }

                document.getElementById('resetProgressBtn').addEventListener('click', showResetModal);
                document.getElementById('cancelResetBtn').addEventListener('click', hideResetModal);
                
                function showDeleteModal() {
                    document.getElementById('deleteAccountModal').classList.remove('hidden');
                }
        
                function hideDeleteModal() {
                    document.getElementById('deleteAccountModal').classList.add('hidden');
                }
        
                document.getElementById('deleteAccountBtn').addEventListener('click', showDeleteModal);
                document.getElementById('cancelDeleteBtn').addEventListener('click', hideDeleteModal);
            </script>
        </div>
    </div>
</x-layout>
