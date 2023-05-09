<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Analytic</strong> Dashboard</h1>
    <?php 
      // include "admin_dashboard_number_of_reservist.php" 
      include "admin_dashboard_stat.php"
    ?>

    <h1 class="h3 mb-3"><strong>Active Users</strong> Dashboard</h1>
    <?php include "admin_dashboard_users.php"?>

    <h1 class="h3 mb-3"><strong>Pending Users</strong> Dashboard</h1>
      <?php include "admin_dashboard_users_pending.php"?>

      <?php include "admin_dashboard_latest_registration.php"?>
  </div>
</main>