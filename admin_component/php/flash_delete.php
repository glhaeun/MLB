<?php

const FLASH = 'FLASH_MESSAGES';

const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';
const FLASH_DANGER = 'danger';


/**
 * Create a flash message
 *
 * @param string $name
 * @param string $message
 * @param string $type
 * @return void
 */
function create_delete_message(string $name, string $message, string $type): void
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
function display_delete_message(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }

    // Get message from the session
    $flash_message = $_SESSION[FLASH][$name];

    // Delete the flash message
    unset($_SESSION[FLASH][$name]);

    // Display the flash message
    echo format_delete_message($flash_message);
}

/**
 * Format a flash message
 *
 * @param array $flash_message
 * @return string
 */
function format_delete_message(array $flash_message): string
{
    $iconClass = '';

    // Determine the icon class based on the flash message type
    switch ($flash_message['type']) {
        case FLASH_SUCCESS:
            $iconClass = 'fas fa-check-circle';
            break;
        case FLASH_DANGER:
            $iconClass = 'fas fa-exclamation-circle';
            break;
        case FLASH_WARNING:
            $iconClass = 'fas fa-exclamation-triangle';
            break;
        case FLASH_INFO:
            $iconClass = 'fas fa-info-circle';
            break;
        default:
            $iconClass = 'fas fa-info-circle';
            break;
    }

    // Get the current page name
    $currentPage = basename($_SERVER['PHP_SELF']);

    // Get the data ID from the flash message
    $dataId = isset($flash_message['dataId']) ? $flash_message['dataId'] : '';

    // Generate the flash message HTML
    return sprintf('
        <div class="alert alert-%s">
            <i class="%s"></i> %s
            <a href="%s?delete_%s=%s" class="btn btn-danger btn-sm float-right">Confirm Delete</a>
        </div>',
        $flash_message['type'],
        $iconClass,
        $flash_message['message'],
        $currentPage,
        $currentPage,
        $dataId
    );
}

/**
 * Display all flash messages
 *
 * @return void
 */
function display_all_delete_messages(): void
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
        echo format_delete_message($flash_message);
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
function flash_delete(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        // Create a flash message
        create_delete_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        // Display a flash message
        display_delete_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        // Display all flash messages
        display_all_delete_messages();
    }
}
