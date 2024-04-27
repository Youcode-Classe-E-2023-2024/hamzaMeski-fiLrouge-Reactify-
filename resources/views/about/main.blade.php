@extends('shared.layout')

@section('content')
    <div class="bg-gray-900 text-gray-300">
        <div class="container mx-auto p-8 overflow-hidden rounded-lg md:p-10 lg:p-12">

            <p class="font-sans text-3xl font-bold text-gray-200 max-w-5xl lg:text-5xl">
                Welcome to Reactify
            </p>

            <div class="h-6"></div>

            <div class="flex flex-col justify-center">
                <p class="self-start inline font-sans text-lg font-semibold text-green-400 bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                    Our mission
                </p>
                <p class="font-serif text-lg text-gray-400 md:pr-10">
                    Our mission is simple: to provide a dynamic space where users can ask questions, share insights, and connect with like-minded individuals. We strive to create an inclusive community where everyone's voice is heard and valued.
                </p>
            </div>

            <div class="h-6"></div>

            <div class="flex flex-col justify-center">
                <p class="self-start inline font-sans text-lg font-semibold text-green-400 bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                    What Sets Us Apart
                </p>
                <p class="font-serif text-lg text-gray-400 md:pr-10">
                    Unlike traditional Q&A platforms, [Your Website Name] leverages cutting-edge AI technology to generate thought-provoking questions, sparking meaningful conversations and inspiring deep dives into various topics. Our unique approach ensures that users are constantly exposed to new ideas and perspectives, keeping the discussion fresh and engaging.
                </p>
            </div>

            <div class="h-6"></div>

            <div class="flex flex-col justify-center">
                <p class="self-start inline font-sans text-lg font-semibold text-green-400 bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                    Key Features
                </p>
                <ul class="font-serif text-lg text-gray-400 md:pr-10 list-disc pl-8">
                    <li class="mb-2">
                        <span class="font-semibold text-green-400">AI-Generated Questions:</span> Our AI algorithm generates thought-provoking questions to inspire discussion and exploration.
                    </li>
                    <li class="mb-2">
                        <span class="font-semibold text-green-400">Interactive Questioning:</span> Users can post questions, like them, and engage in insightful conversations.
                    </li>
                    <li class="mb-2">
                        <span class="font-semibold text-green-400">Article Generation:</span> Questions automatically trigger the creation of detailed articles, providing in-depth insights and knowledge.
                    </li>
                    <li class="mb-2">
                        <span class="font-semibold text-green-400">Community Interaction:</span> Connect with other users, join groups, and engage in private conversations.
                    </li>
                    <li class="mb-2">
                        <span class="font-semibold text-green-400">Social Networking:</span> Build your network by sending friend requests, connecting with others who share your interests.
                    </li>
                </ul>
            </div>

            <div class="h-6"></div>

            <div class="flex flex-col justify-center">
                <p class="self-start inline font-sans text-lg font-semibold text-green-400 bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                    Join The Community
                </p>
                <p class="font-serif text-lg text-gray-400 md:pr-10">
                    Whether you're a curious learner, an expert in your field, or simply someone who enjoys engaging discussions, [Your Website Name] welcomes you. Join our growing community today and embark on a journey of discovery, connection, and knowledge sharing.
                </p>
            </div>

        </div>
    </div>
@endsection
