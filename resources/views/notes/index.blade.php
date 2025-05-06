<!DOCTYPE html>
<html>
<head>
    <title>Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        /* Basic modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 500px; /* Max width for larger screens */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">My Notes</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Create New Note</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($notes as $note)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $note->title }}</h2>
                    <p class="text-gray-700 mb-4 line-clamp-4">{{ $note->content }}</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('notes.show', $note->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('notes.edit', $note->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        {{-- Removed onsubmit and added data-note-id --}}
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="text-red-500 hover:underline focus:outline-none delete-button" data-note-id="{{ $note->id }}">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">No notes found.</p>
            @endforelse
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 class="text-lg font-bold mb-4">Confirm Deletion</h3>
            <p>Are you sure you want to delete this note?</p>
            <div class="flex justify-end space-x-4 mt-6">
                <button id="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                <button id="confirmDelete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </div>
        </div>
    </div>

    <script>
        // Get the modal, and the buttons
        const modal = document.getElementById('deleteModal');
        const confirmBtn = document.getElementById('confirmDelete');
        const cancelBtn = document.getElementById('cancelDelete');
        let formToSubmit = null; // Variable to store the form that needs to be submitted

        // Get all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');

        // Add click event listeners to all delete buttons
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the parent form of the clicked button
                formToSubmit = this.closest('form');
                // Display the modal
                modal.style.display = 'block';
            });
        });

        // When the user clicks the confirm delete button
        confirmBtn.onclick = function() {
            if (formToSubmit) {
                formToSubmit.submit(); // Submit the stored form
            }
        }

        // When the user clicks the cancel button or outside the modal
        cancelBtn.onclick = function() {
            modal.style.display = 'none'; // Hide the modal
            formToSubmit = null; // Reset the form variable
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none'; // Hide the modal if clicked outside
                formToSubmit = null; // Reset the form variable
            }
        }
    </script>
</body>
</html>
