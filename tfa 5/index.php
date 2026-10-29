<?php
declare(strict_types=1);

$customers = [
    ['full_name' => 'Michael De Santa', 'email' => 'michael@vangelico.example', 'phone' => '09170000001'],
    ['full_name' => 'Franklin Clinton', 'email' => 'franklin@vagos.example', 'phone' => '09170000002'],
    ['full_name' => 'Trevor Philips', 'email' => 'trevor@trevors.example', 'phone' => '09170000003'],
    ['full_name' => 'Lamar Davis', 'email' => 'lamar@h_customs.example', 'phone' => '09170000004'],
    ['full_name' => 'Lester Crest', 'email' => 'lester@bleeter.example', 'phone' => '09170000005'],
];

$users = [
    ['username' => 'michael', 'full_name' => 'Michael De Santa'],
    ['username' => 'franklin', 'full_name' => 'Franklin Clinton'],
    ['username' => 'trevor', 'full_name' => 'Trevor Philips'],
    ['username' => 'lamar', 'full_name' => 'Lamar Davis'],
    ['username' => 'lester', 'full_name' => 'Lester Crest'],
];

$page = $_GET['page'] ?? 'home';
if (!in_array($page, ['home', 'about', 'customers', 'users'], true)) {
    http_response_code(404);
    $page = '404';
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel POS | TFA 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="brand">Laravel POS</div>
            <nav>
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/customers">Customers</a>
                <a href="/users">Users</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <?php if ($page === 'home'): ?>
            <section class="hero">
                <p class="eyebrow">IT0049 Web System Technologies</p>
                <h1>Laravel POS Application</h1>
                <p class="lead">A four-page point-of-sale application with customer and user account listings.</p>
                <div class="actions">
                    <a class="button" href="/customers">View Customers</a>
                    <a class="button secondary" href="/users">View Users</a>
                </div>
            </section>
        <?php elseif ($page === 'about'): ?>
            <section class="card">
                <p class="eyebrow">TFA 5</p>
                <h1>About</h1>
                <p>This application demonstrates routes, controllers, Blade-style views, navigation, and static PHP arrays for temporary data storage.</p>
                <p>The required pages are Home, About, Customer Accounts, and User Accounts.</p>
            </section>
        <?php elseif ($page === 'customers'): ?>
            <section class="card">
                <p class="eyebrow">Account Management</p>
                <h1>Customer Accounts</h1>
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Full Name</th><th>Email</th><th>Phone</th></tr></thead>
                        <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?= e($customer['full_name']) ?></td>
                                <td><?= e($customer['email']) ?></td>
                                <td><?= e($customer['phone']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php elseif ($page === 'users'): ?>
            <section class="card">
                <p class="eyebrow">Account Management</p>
                <h1>User Accounts</h1>
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Username</th><th>Full Name</th></tr></thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= e($user['username']) ?></td>
                                <td><?= e($user['full_name']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php else: ?>
            <section class="card"><h1>Page Not Found</h1><p>The requested page does not exist.</p></section>
        <?php endif; ?>
    </main>

    <footer><div class="container">TFA 5 Laravel POS Foundations</div></footer>
</body>
</html>
