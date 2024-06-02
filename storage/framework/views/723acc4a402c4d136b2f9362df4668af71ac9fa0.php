<?php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
?>

<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if(Auth::user()->usertype=='Admin'): ?>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/users')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('users.view')); ?>" class="nav-link <?php echo e(($route=='users.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/profiles')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('profiles.view')); ?>" class="nav-link <?php echo e(($route=='profiles.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('profiles.password.view')); ?>" class="nav-link <?php echo e(($route=='profiles.password.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/suppliers')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Suppliers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('suppliers.view')); ?>" class="nav-link <?php echo e(($route=='suppliers.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Suppliers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/customers')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('customers.view')); ?>" class="nav-link <?php echo e(($route=='customers.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('customers.credit')); ?>" class="nav-link <?php echo e(($route=='customers.credit')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('customers.paid')); ?>" class="nav-link <?php echo e(($route=='customers.paid')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('customers.wise.report')); ?>" class="nav-link <?php echo e(($route=='customers.wise.report')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Wise Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/units')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Units
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('units.view')); ?>" class="nav-link <?php echo e(($route=='units.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Units</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/categories')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('categories.view')); ?>" class="nav-link <?php echo e(($route=='categories.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/products')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('products.view')); ?>" class="nav-link <?php echo e(($route=='products.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/purchase')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('purchase.view')); ?>" class="nav-link <?php echo e(($route=='purchase.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('purchase.pending.list')); ?>" class="nav-link <?php echo e(($route=='purchase.pending.list')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Purchase</p>
                </a>
              </li>
              <?php if(Auth::user()->usertype=='Admin'): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('purchase.report')); ?>" class="nav-link <?php echo e(($route=='purchase.report')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Purchase Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('purchase.report.supplier.product.wise')); ?>" class="nav-link <?php echo e(($route=='purchase.report.supplier.product.wise')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier/Product Wise Purchase</p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/invoice')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('invoice.view')); ?>" class="nav-link <?php echo e(($route=='invoice.view')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('invoice.pending.list')); ?>" class="nav-link <?php echo e(($route=='invoice.pending.list')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('invoice.print.list')); ?>" class="nav-link <?php echo e(($route=='invoice.print.list')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Invoice</p>
                </a>
              </li>
              <?php if(Auth::user()->usertype=='Admin'): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('invoice.daily.report')); ?>" class="nav-link <?php echo e(($route=='invoice.daily.report')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </li>
          <?php if(Auth::user()->usertype=='Admin'): ?>
          <li class="nav-item has-treeview <?php echo e(($prefix=='/stock')?'menu-open':''); ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Stock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('stock.report')); ?>" class="nav-link <?php echo e(($route=='stock.report')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('stock.report.supplier.product.wise')); ?>" class="nav-link <?php echo e(($route=='stock.report.supplier.product.wise')?'active':''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier/Product Wise Stock</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu --><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/layouts/sidebar.blade.php ENDPATH**/ ?>