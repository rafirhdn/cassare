<template>
   <div class="flex h-screen">
      <!-- Sidebar -->
      <SidebarAdmin />

      <!-- Main -->
      <main class="flex-1 bg-dark-theme-950">
         <slot />
      </main>
   </div>
</template>
