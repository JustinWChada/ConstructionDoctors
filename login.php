<?php
require 'vendor/autoload.php';

$provider = new League\OAuth2\Client\Provider\Google([
    'clientId'     => 'your-google-client-id',
    'clientSecret' => 'your-google-client-secret',
    'redirectUri'  => 'https://your-redirect-uri',
]);

if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
} else {
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Get user details
    $user = $provider->getResourceOwner($token);

    // Store user details in session or database
    $_SESSION['user'] = $user->toArray();
    header('Location: dashboard.php');
}
?>
