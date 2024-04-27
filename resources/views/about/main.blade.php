@extends('shared.layout')

@section('content')
    <div class="bg-gradient-to-br from-gray-900 to-black text-gray-300 py-12">
        <div class="container mx-auto px-6 lg:px-12">
            <h1 class="text-3xl lg:text-5xl font-bold text-center mb-8">Welcome to Reactify</h1>

            <section class="mb-12">
                <h2 class="text-lg lg:text-xl font-semibold text-green-400 mb-2">Our Mission</h2>
                <p class="text-base lg:text-lg text-gray-400 leading-relaxed">
                    Our mission is simple: to provide a dynamic space where users can ask questions, share insights, and connect with like-minded individuals. We strive to create an inclusive community where everyone's voice is heard and valued.
                </p>
            </section>

            <section class="mb-12">
                <h2 class="text-lg lg:text-xl font-semibold text-green-400 mb-2">What Sets Us Apart</h2>
                <p class="text-base lg:text-lg text-gray-400 leading-relaxed">
                    Unlike traditional Q&A platforms, Reactify leverages cutting-edge AI technology to generate thought-provoking questions, sparking meaningful conversations and inspiring deep dives into various topics. Our unique approach ensures that users are constantly exposed to new ideas and perspectives, keeping the discussion fresh and engaging.
                </p>
            </section>

            <section class="mb-12">
                <h2 class="text-lg lg:text-xl font-semibold text-green-400 mb-2">Key Features</h2>
                <ul class="text-base lg:text-lg text-gray-400 leading-relaxed list-disc pl-8">
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
            </section>

            <section>
                <h2 class="text-lg lg:text-xl font-semibold text-green-400 mb-2">Join The Community</h2>
                <p class="text-base lg:text-lg text-gray-400 leading-relaxed">
                    Whether you're a curious learner, an expert in your field, or simply someone who enjoys engaging discussions, Reactify welcomes you. Join our growing community today and embark on a journey of discovery, connection, and knowledge sharing.
                </p>
            </section>
        </div>
    </div>
@endsection
