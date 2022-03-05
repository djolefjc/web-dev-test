  <div x-data="{ mobileMenuOpen: false }" class="relative bg-white border-b-2 border-gray-100">
      <div class="px-4 mx-auto max-w-7xl sm:px-6">
          <div class="flex items-center justify-between py-3 md:justify-start md:space-x-10">
              <div class="lg:w-0 lg:flex-1">
                  <a href="{{ route('home') }}" class="flex">
                      <x-application-logo class="w-auto h-8 sm:h-10 fill-current text-gray-500" />
                  </a>
              </div>
              <div class="-my-2 -mr-2 md:hidden">
                  <button @click="mobileMenuOpen = true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                      <svg class="w-6 h-6" x-description="Heroicon name: menu" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                      </svg>
                  </button>
              </div>
              <nav class="items-center hidden space-x-10 md:flex">
                  <x-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                      Blog
                  </x-nav-link>
                  <x-nav-link :href="route('news')" :active="request()->routeIs('news')">
                      News
                  </x-nav-link>
                  <a href="{{ route('login') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                      Login
                  </a>
              </nav>
          </div>
      </div>

      <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="mobileMenuOpen" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute inset-x-0 top-0 z-50 p-2 transition origin-top-right transform md:hidden" style="display:none">
          <div class="rounded-lg shadow-lg">
              <div class="bg-white divide-y-2 rounded-lg shadow-xs divide-gray-50">
                  <div class="px-5 pt-5 pb-6 space-y-6">
                      <div class="flex items-center justify-between">
                          <div>
                              <x-application-logo class="w-auto h-8 fill-current text-gray-500" />
                          </div>
                          <div class="-mr-2">
                              <button @click="mobileMenuOpen = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                  <svg class="w-6 h-6" x-description="Heroicon name: x" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                  </svg>
                              </button>
                          </div>
                      </div>
                      <div>
                          <nav class="grid gap-y-8">
                              <a href="{{ route('posts') }}" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                  <svg class="flex-shrink-0 w-6 h-6 text-indigo-600" x-description="Heroicon name: cursor-click" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                  </svg>
                                  <div class="text-base font-medium leading-6 text-gray-900">
                                      Blog
                                  </div>
                              </a>
                              <a href="{{ route('news') }}" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                  <svg class="flex-shrink-0 w-6 h-6 text-indigo-600" x-description="Heroicon name: shield-check" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                  </svg>
                                  <div class="text-base font-medium leading-6 text-gray-900">
                                      News
                                  </div>
                              </a>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>