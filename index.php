<?php

use Config\Modules\Logging\LoggingConfig;
use Logging\Infrastructure\LoggingKernel;

require_once __DIR__ . '/autoload.php';

$loggingDirectory = __DIR__ . '/log/';
$loggingConfig = new LoggingConfig($loggingDirectory);

$loggingKernel = new LoggingKernel($loggingConfig);

$logger = $loggingKernel->logger();

$logger->info('Logging system initialized successfully.', [
    'directory' => $loggingDirectory,
    'config' => $loggingConfig,
]);

$logger->log('debug', 'This is a custom log message.', [
    'context' => 'example',
    'user_id' => 123,
]);

$logger->error('An error occurred while processing the request.', [
    'error_code' => 500,
    'user_id' => 456,
    'password' => 'sensitive_data', // This will be sanitized
]);

$logger->logInput('Gereneric message');

$logger->logInput('Custom channel log.', 'warning', 'custom', [
    'context' => 'Custom channel.',
    'channel' => 'custom'
]);