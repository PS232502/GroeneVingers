<footer class="bg-green-700 text-white p-6 flex flex-col items-start relative">
    <div class="absolute inset-0" style="background-image: url('../IMG/Plant_Background.jpg'); opacity: 0.4;"></div>
    <!-- Nadir: Overlay div with background image and opacity -->

    <div style="position: relative; z-index: 1;">
        <ul>
            <li>Kapperdoesweg 8</li>
            <li>5674 AJ Nuenen</li>
            <li><a href="mailto:info@groenevingersshop.com">info@groenevingersshop.com</a></li>
        </ul>
    </div>

    <div class="mx-auto text-center text-sm relative z-10">&copy; 2024 | All rights reserved</div>

    <div class="absolute bottom-0 right-0 m-6">
        <a href="{{ route('login') }}" class="text-white mr-4">Login</a>
        <a href="{{ route('register') }}" class="text-white">Register</a>
    </div>
</footer>
