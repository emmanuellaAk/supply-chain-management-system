  <body class="main">
      {{-- <x-mobile-menu/> --}}
      <div class="wrapper">
          <div class="wrapper-box">
              <!-- BEGIN: Side Menu -->
              <nav class="side-nav">
                  <ul>
                    <li>
                        <a href="/dashboard" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                            </div>
                        </a>
                    </li>
                      <li>
                          <a href="javascript:;" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                              <div class="side-menu__title">
                                  Suppliers
                                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                              </div>
                          </a>
                          <ul class="">

                              <li>
                                  <a href="/suppliers" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Current Suppliers </div>
                                  </a>

                              </li>
                              <li>
                                 <a href="/add.supplier" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Add Supplier</div>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li>
                          <a href="javascript:;" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                              <div class="side-menu__title">
                                  Purchase Orders
                                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                              </div>
                          </a>
                         <ul class="">
                             <li>
                                 <a href="/purchase-orders" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Purchase Order</div>
                                  </a>
                              </li>
                              <li>
                                 <a href="/inventory-form" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Add Product </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="/all-purchases" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title">
                                          All Purchases
                                      </div>
                                  </a>
                                  <ul class="">
                                  </ul>
                              </li>

                          </ul>
                      </li>
                      <li class="side-nav__devider my-6"></li>
                      <li>

                          <a href="/inventory" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                              <div class="side-menu__title">
                                  Inventory
                              </div>
                          </a>
                      </li>
                      <li>
                      <a href="/customers" class="side-menu">
                           <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                           <div class="side-menu__title">Customers</div>
                       </a>
                       </li>

                       <li>
                        <a href="/orders" class="side-menu">
                         <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                         <div class="side-menu__title">
                          Orders
                         </div>
                      </a>
                    </li>

                    <li>
                        <a href="/admin/report" class="side-menu">
                             <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                             <div class="side-menu__title">Reports</div>
                         </a>
                         </li>
                      
                  </ul>
              </nav>
