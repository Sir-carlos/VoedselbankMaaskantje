

<button id="dark-mode-toggle">Dark Mode</button>

<script>
    // Check if user preference for dark mode exists
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Set initial mode based on user preference
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    }

    // Toggle between light and dark modes
    document.getElementById('dark-mode-toggle').addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');

        // Save user preference for dark mode
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    });
</script>
