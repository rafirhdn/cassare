<template>
   <div class="flex h-screen overflow-hidden">
      <!-- Sidebar -->
      <SidebarCashier />

      <!-- Main -->
      <main class="flex-1 bg-dark-theme-950 overflow-y-auto">
         <slot />
      </main>
   </div>
</template>
