<!-- resources/views/components/admin-layout.blade.php -->
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation') {{-- menu admin / dropdown --}}
    
    <main class="p-6">
        {{ $slot }}
    </main>
</div>
