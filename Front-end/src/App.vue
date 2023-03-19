<script setup>
import { RouterLink, RouterView } from 'vue-router'


const guest = [
  {
    name: 'History',
    path: '/',
  },
  {
    name: 'Mission',
    path: '/mission',
  },
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Login',
    path: '/login',
  },
]
const client = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'My Space',
    path: '/myspace',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
const creator = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'My Space',
    path: '/myspace',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
const admin = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'Dashboard',
    path: '/dashboard',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">

      <nav>
        <RouterLink v-if="!user" v-for="guest in links" to="{{guest.path}}">{{ guest.name }}</RouterLink>
        <RouterLink v-if="user.ID === 1" v-for="client in links" to="{{client.path}}">{{ client.name }}</RouterLink>
        <RouterLink v-if="user.ID === 2" v-for="creator in links" to="{{creator.path}}">{{ creator.name }}</RouterLink>
        <RouterLink v-if="user.ID === 0" v-for="admin in links" to="{{admin.path}}">{{ admin.name }}</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
