<x-app-layout>
    @include('layouts._sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts._navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            {{ $slot }}
            @include('layouts._footer')
        </div>
    </main>
    @include('layouts._fixed-plugin')
</x-app-layout>
