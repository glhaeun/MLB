<?php

const FLASH = 'FLASH_MESSAGES';

const FLASH_DANGER = 'danger';
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';

/**
 * Create a flash message
 *
 * @param string $name
 * @param string $message
 * @param string $type
 * @return void
 */
function create_flash_message(string $name, string $message, string $type): void
{
    // Initialize the flash messages array if it doesn't exist
    if (!isset($_SESSION[FLASH])) {
        $_SESSION[FLASH] = [];
    }

    // Add the message to the session
    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}

/**
 * Display a flash message
 *
 * @param string $name
 * @return void
 */
function display_flash_message(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }

    // Get message from the session
    $flash_message = $_SESSION[FLASH][$name];

    // Delete the flash message
    unset($_SESSION[FLASH][$name]);

    // Display the flash message
    echo format_flash_message($flash_message);
}

/**
 * Format a flash message
 *
 * @param array $flash_message
 * @return string
 */function format_flash_message(array $flash_message): string
{
    return sprintf('
    <div class="alert alert-%s alert-dismissible fade show" role="alert">
        %s
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>',
        $flash_message['type'],
        $flash_message['message']
    );
}


    


/**
 * Display all flash messages
 *
 * @return void
 */
function display_all_flash_messages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // Get flash messages
    $flash_messages = $_SESSION[FLASH];

    // Remove all the flash messages
    unset($_SESSION[FLASH]);

    // Show all flash messages
    foreach ($flash_messages as $flash_message) {
        echo format_flash_message($flash_message);
    }
}

/**
 * Flash a message
 *
 * @param string $name
 * @param string $message
 * @param string $type (error, warning, info, success)
 * @return void
 */
function flash_alert(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        // Create a flash message
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        // Display a flash message
        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        // Display all flash messages
        display_all_flash_messages();
    }
}
