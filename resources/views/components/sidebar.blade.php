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
                                  <a href="side-menu-light-categories.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Categories </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="side-menu-light-add-product.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Add Product </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:;" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title">
                                          Products
                                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                      </div>
                                  </a>
                                  <ul class="">
                                      <li>
                                          <a href="side-menu-light-product-list.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Product List</div>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="side-menu-light-product-grid.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Product Grid</div>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript:;" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title">
                                          Transactions
                                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                      </div>
                                  </a>
                                  <ul class="">
                                      <li>
                                          <a href="side-menu-light-transaction-list.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Transaction List</div>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="side-menu-light-transaction-detail.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Transaction Detail</div>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript:;" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title">
                                          Sellers
                                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                      </div>
                                  </a>
                                  <ul class="">
                                      <li>
                                          <a href="side-menu-light-seller-list.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Seller List</div>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="side-menu-light-seller-detail.html" class="side-menu">
                                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                              <div class="side-menu__title">Seller Detail</div>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="side-menu-light-reviews.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Reviews </div>
                                  </a>
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
                          <a href="javascript:;" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                              <div class="side-menu__title">
                                  Users
                                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                              </div>
                          </a>
                          <ul class="">
                              <li>
                                  <a href="side-menu-light-users-layout-1.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Layout 1 </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="side-menu-light-users-layout-2.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Layout 2 </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="side-menu-light-users-layout-3.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Layout 3 </div>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li>
                          <a href="javascript:;" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                              <div class="side-menu__title">
                                  Profile
                                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                              </div>
                          </a>
                          <ul class="">
                              <li>
                                  <a href="side-menu-light-profile-overview-1.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Overview 1 </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="side-menu-light-profile-overview-2.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Overview 2 </div>
                                  </a>
                              </li>
                              <li>
                                  <a href="side-menu-light-profile-overview-3.html" class="side-menu">
                                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                      <div class="side-menu__title"> Overview 3 </div>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  </ul>
                  </li>
                  </ul>
              </nav>
