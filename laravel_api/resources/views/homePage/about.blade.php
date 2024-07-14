@extends('homePage.cover')
@section('content')
<button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">
        Open Modal
    </button>

    <!-- Modal Background -->
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold">Modal Title</h3>
                <button id="closeModal" class="text-black">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                <p>This is the modal content.</p>
            </div>
            <!-- Modal Footer -->
            <div class="flex justify-end p-4 border-t">
                <button id="closeModalFooter" class="bg-red-500 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Optional: Include the JavaScript -->
    <script>
        // Get elements
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalFooter = document.getElementById('closeModalFooter');
        const modalBackdrop = document.getElementById('modalBackdrop');

        // Open modal
        openModal.addEventListener('click', () => {
            modalBackdrop.classList.remove('hidden');
        });

        // Close modal
        closeModal.addEventListener('click', () => {
            modalBackdrop.classList.add('hidden');
        });

        closeModalFooter.addEventListener('click', () => {
            modalBackdrop.classList.add('hidden');
        });

        // Close modal when clicking outside of the modal content
        window.addEventListener('click', (event) => {
            if (event.target === modalBackdrop) {
                modalBackdrop.classList.add('hidden');
            }
        });
    </script>
@endsection