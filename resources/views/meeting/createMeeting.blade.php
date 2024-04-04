@extends('shared.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('create-meeting/CSS/responsive.css') }}">


    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex md:px-16 px-5 md:py-24 py-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 md:pr-24 md:pr-16 flex flex-col md:items-start text-left mb-16 md:mb-0 items-center text-center premium_meeting">
                <h1 class="md:title-font md:text-4xl text-2xl mb-10 font-medium text-gray-900 w-3/4 home-text">
                    Premium video meetings for everyone.
                </h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">
                    We re-engineered the service we built for secure, high-quality
                    business meetings, Google Meet, to make it available for all, on any
                    device.
                </p>
                <div class="flex md:flex-row md:justify-center items-center flex-col start_meeting">
                    <form action="{{ route('create-meet') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="md:inline-flex text-white bg-blue-600 border-0 py-2 px-6 md:mb-0 mb-4 focus:outline-none             hover:bg-blue-800 rounded text-lg flex justify-center">
                            <i class="fa-solid fa-video pr-2 py-1.5"></i>
                            Start a meeting
                        </button>
                    </form>

                    <input type="text" id="linkUrl"
                           class="md:ml-2 pl-5 inline-flex font-normal placeholder:text-gray-500 bg-white border border-gray-300 py-2 px-2 outline-gray-500 rounded text-lg relative"
                           placeholder="Enter a meeting code">

                    <button onclick="joinUserMeeting()" class="md:ml-4 mt-2.5 text-gray-500 font-semibold cursor-pointer px-4 text-[17px]">Join</button>
                </div>

                <a href="https://support.google.com/accounts/answer/27441?hl=en" class="mt-10 font-medium">
                    Don't have an account?
                    <span class="text-blue-500 cursor-pointer">Get Started Now</span>
                </a>
            </div>
            <div class="md:max-w-lg md:w-full md:w-1/2 w-5/6 first-image-parent">
                <img src="{{ asset('create-meeting/images/image1.webp') }}" alt="first image" id="first-image"
                     class="object-cover object-center rounded">
            </div>
        </div>
    </section>

    <!-- mid section  -->
    <hr class="border border-1 md:mx-24 mx-12">
    <h2 class="text-center mt-10 font-semibold font-poppins">See what you can do with Google Meet</h2>
    <i class="fa-solid fa-angle-down flex items-center justify-center mb-10 mt-2 sm:text-xl"></i>

    <section class="text-gray-600 body-font">
        <div
            class="container mx-auto flex md:px-16 px-5 md:pt-10 pt-12 md:py-24 py-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 md:-mt-12 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-gray-900 w-3/4">Meet Safely</h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">
                    Meet uses the same protections that Google uses to secure your information and safeguard your
                    privacy. Meet video conferences are encrypted in transit, and our array of safety measures are
                    continuously updated for added protection.
                </p>
                <div class="flex justify-center">
                    <a href="https://support.google.com/a/answer/7582940?hl=en"
                       class="text-blue-600 font-semibold cursor-pointer">
                        Learn more about security and compliance
                    </a>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img src="{{ asset('create-meeting/images/image2.webp') }}" alt="second image" class="object-cover object-center rounded">
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex md:pt-10 pt-12 md:px-12 md:py-24 py-12 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img src="{{ asset('create-meeting/images/image3.webp') }}" alt="third image" class="object-cover object-center rounded">
            </div>
            <div
                class="lg:flex-grow md:w-1/2 md:-mt-12 lg:pl-24 md:pl-16 px-5 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-gray-800">Meet from anywhere</h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">
                    Get the whole crew together in Google Meet, where you can present business proposals, collaborate on
                    chemistry assignments, or just catch up face to face. <br><br> Businesses, schools, and other
                    organizations can live stream meetings to 100,000 viewers within their domain.
                </p>
                <a href="https://workspace.google.com/intl/en_in/pricing.html" class="flex justify-center">
                    <p class="text-blue-600 font-semibold cursor-pointer">See plans and pricing for organization</p>
                </a>
            </div>
        </div>
    </section>

    <!-- third section  -->
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex md:px-12 px-5 pt-12 md:py-24 py-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 md:-mt-12 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-gray-900 w-3/4">Meet on any device
                </h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">
                    Invited guests can join an online video conference from their computer using any modern web
                    browser—no software to install. On mobile devices, they can join from the Google Meet app. Guests
                    can even join meetings from Google Nest Hub Max.
                </p>
                <a href="https://edu.google.com/chromebooks/overview/" class="flex justify-center">
                    <p class="text-blue-600 font-semibold cursor-pointer">Enable hybrid work with Chrome OS devices</p>
                </a>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img src="{{ asset('create-meeting/images/image4.webp') }}" alt="fourth image" class="object-cover object-center rounded">
            </div>
        </div>
    </section>

    <!-- fourth section  -->
    <section class="text-gray-600 body-font">
        <div
            class="container mx-auto flex md:pt-10 pt-12 md:px-12 px-5 md:py-24 py-12 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img src="{{ asset('create-meeting/images/image5.webp') }}" alt="fifth image" class="object-cover object-center rounded">
            </div>
            <div
                class="lg:flex-grow md:w-1/2 md:-mt-44 md:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-gray-800">Meet clearly</h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">Google Meet
                    adjusts to your network speed, ensuring high quality video calls wherever you are. New AI
                    enhancements keep your calls clear even when your surroundings aren’t.</p>
            </div>
        </div>
    </section>

    <!-- fifth section  -->
    <section class="text-gray-600 body-font">
        <div
            class="container mx-auto flex md:px-16 px-5 md:pt-10 pt-12 md:py-24 py-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 md:-mt-12 -mt-10 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-gray-900 w-3/4">Meet with everyone
                </h1>
                <p class="mb-8 leading-relaxed w-[90%] md:text-lg text-normal text-gray-600 font-normal">With live
                    captions powered by Google’s speech recognition technology, Google Meet makes meetings more
                    accessible. For non-native speakers, hearing impaired participants, or just noisy ee shops, live
                    captions make it easy for everyone to follow along (available in English only).
                </p>
                <a href="https://support.google.com/meet/answer/7313544?hl=en" class="flex justify-center">
                    <p class="text-blue-600 font-semibold cursor-pointer">Learn more about accessibility features</p>
                </a>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img src="{{ asset('create-meeting/images/image6.webp') }}" alt="sixth image" class=" object-cover object-center rounded">
            </div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function joinUserMeeting () {
        var link = $('#linkUrl').val();
        // console.log(link);
        if(link.trim() == '' || link.length < 1) {
            alert('plz enter the link');
            return;
        }else {
            window.location.href = link;
        }

    }
</script>

{{--<script>--}}
{{--    function joinUserMeeting() {--}}
{{--        var link = document.getElementById('linkUrl').value;--}}
{{--        console.log(link);--}}
{{--        if (link.trim() == '' || link.length < 1) {--}}
{{--            alert('Please enter the link');--}}
{{--            return;--}}
{{--        } else {--}}
{{--            // Your code here if link is not empty--}}
{{--        }--}}
{{--    }--}}

{{--</script>--}}

