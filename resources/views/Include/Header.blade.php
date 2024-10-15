<header class="bg-green-700 text-white p-6 flex justify-between items-center relative">
    <div class="absolute inset-0 bg-green-700" style="background-image: url('../IMG/Plant_Background.jpg'); opacity: 0.4;"></div>
    <!-- Nadir: Overlay div with background image and opacity -->

    <div class="text-2xl font-semibold relative z-10">
        <a href="{{ route('index') }}">
            <img src="{{ asset('IMG/Logo.jpg') }}" alt="Image 1" class="w-52 h-16 mb-2 object-cover">
        </a>
    </div>

    <!-- Nadir: Content within the header with a higher stacking order -->

    <div class="absolute inset-x-0 mx-auto space-x-4 text-center">
        <a href="{{ route('index') }}" class="text-white font-bold text-lg">HOME</a>
        <a href="{{ route('contact') }}" class="text-white font-bold text-lg">CONTACT</a>
    </div>
</header>