<style>
  /* Sidebar Container */
  .main-sidebar {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #495057;
    border-right: 1px solid #ced4da;
    min-height: 100vh;
  }


  .nav-sidebar .nav-link {
    color: #495057;
    margin: 0.3rem;
    border-radius: 0.4rem;
    transition: all 0.3s ease-in-out;
  }

  .nav-sidebar .nav-link.active {
    color: #fff;
    background: #003cb3;
    font-weight: bold;
  }

  .nav-sidebar .nav-link:hover {
    background: #6c757d;
    color: #fff;
  }

  /* Sidebar Icons */
  .nav-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 1.5rem;
    height: 1.5rem;
    margin-right: 0.5rem;
    vertical-align: middle;
  }


  /* Section Headers */
  .nav-header {
    color: #6c757d;
    font-size: 0.9rem;
    padding: 1rem 1rem 0.5rem;
    text-transform: uppercase;
    font-weight: bold;
  }

  /* Scrollbar Customization */
  .os-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
  }

  .os-scrollbar-handle {
    background: rgba(0, 0, 0, 0.3);
    border-radius: 5px;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .main-sidebar {
      width: 70%;
      transition: transform 0.3s ease-in-out;
    }
  }

  .size-6 {
    width: 1.2rem;
    height: 1.2rem;
    display: inline-block;
    vertical-align: middle;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand bg-light">
  <!-- Brand Logo -->
  <a href="<?php echo base_url ?>admin" class="brand-link bg-transparent text-sm shadow-sm">
    <img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="Store Logo"
      class="brand-image img-circle elevation-3 bg-white"
      style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>

  <!-- Sidebar Section -->
  <div class="sidebar os-host os-theme-light">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="./" class="nav-link nav-home">
            <span class="nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M13.45 11.55l2.05 -2.05" />
                <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
              </svg>
            </span>
            <p>Dashboard</p>
          </a>
        </li>


        <!-- Archives -->
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=archives" class="nav-link nav-archives">
            <span class="nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
              </svg>
            </span>
            <p>Archives List</p>
          </a>
        </li>


        <!-- Students -->
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=students" class="nav-link nav-students">
            <span class="nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
            </span>
            <p>Student List</p>
          </a>
        </li>


        <!-- Admin Maintenance Section -->
        <?php if ($_settings->userdata('type')): ?>
          <!-- Departments -->
          <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=departments" class="nav-link nav-departments">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M9 6l11 0" />
                  <path d="M9 12l11 0" />
                  <path d="M9 18l11 0" />
                  <path d="M5 6l0 .01" />
                  <path d="M5 12l0 .01" />
                  <path d="M5 18l0 .01" />
                </svg>
              </span>
              <p>Department List</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=curriculum" class="nav-link nav-curriculum">
              <i class="nav-icon fas fa-scroll"></i>
              <p>Curriculum List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                  <path d="M20 21l2 -2l-2 -2" />
                  <path d="M17 17l-2 2l2 2" />
                </svg>
              </span>
              <p>User List</p>
            </a>
          </li>


          <!-- Settings -->
          <li class="nav-item">
            <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                </svg>
              </span>
              <p>Settings</p>
            </a>
          </li>

        <?php endif; ?>
      </ul>
    </nav>
  </div>
</aside>


<script>
  var page;

  $(document).ready(function () {
    // Determine the current page from the URL parameter
    page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    page = page.replace(/\//gi, '_'); // Sanitize the page name by replacing slashes

    // Highlight the active page link in the sidebar
    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active');

      // If the current menu item is part of a treeview (dropdown), open it
      if ($('.nav-link.nav-' + page).hasClass('tree-item')) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active');
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open');
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree')) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open');
      }
    }

    // Handle click on 'receive-nav' to show modal for entering tracking number
    $('#receive-nav').click(function () {
      $('#uni_modal').on('shown.bs.modal', function () {
        $('#find-transaction [name="tracking_code"]').focus();
      });
      uni_modal("Enter Tracking Number", "transaction/find_transaction.php");
    });
  });
</script>