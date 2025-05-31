<?php
// Start session to store user preference
session_start();

// Toggle dark mode if requested
if (isset($_GET['toggle_dark_mode'])) {
    $_SESSION['dark_mode'] = !($_SESSION['dark_mode'] ?? false);
    // Redirect to avoid form resubmission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Check current mode
$dark_mode = $_SESSION['dark_mode'] ?? false;
?>

<!DOCTYPE html>
<html lang="en" class="<?= $dark_mode ? 'dark' : 'light' ?>">
<head>
    <meta charset="UTF-8">
    <title>Dark Mode Example</title>
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
        }
        
        .dark {
            --bg-color: #1a1a1a;
            --text-color: #f0f0f0;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }
    </style>
</head>
<body>
    <h1>Dark Mode Example</h1>
    <p>Current mode: <?= $dark_mode ? 'Dark' : 'Light' ?></p>
    
    <form method="get">
        <button type="submit" name="toggle_dark_mode">
            Toggle Dark Mode
        </button>
    </form>
</body>
</html>