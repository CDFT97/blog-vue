<template>
  <nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
      <li>
        <router-link class="text-uppercase" :to="{ name: 'home' }"
          >Home</router-link
        >
      </li>
      <li>
        <router-link class="text-uppercase" :to="{ name: 'contact' }"
          >Contact</router-link
        >
      </li>
      <li>
        <router-link class="text-uppercase" :to="{ name: 'archive' }"
          >Archive</router-link
        >
      </li>
      <li>
        <router-link class="text-uppercase" :to="{ name: 'about' }"
          >About</router-link
        >
      </li>
    </ul>
  </nav>
</template>