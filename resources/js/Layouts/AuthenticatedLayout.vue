<script setup>
import {ref} from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-darkness-900">
            <nav class="bg-darkness-900 border-b border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <img
                                    class="rounded-full w-12 h-12"
                                    src="/img/dracula.png"
                                >
                                <Link :href="route('home')">
                                    <h1 class="main_title">Vamp Perso</h1>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :active="route().current('characters.index')"
                                         :href="route('characters.index')">
                                    Personnages
                                </NavLink>

                                <NavLink
                                    :active="route().current('experience.index')"
                                    :href="route('experience.index')"
                                    class="ml-4"
                                >
                                    Experience
                                </NavLink>
                            </div>
                            <div class="hidden sm:-my-px sm:ms-10 sm:flex">
                                <NavLink
                                    v-if="$page.props.auth.user.role === 'game_master'"
                                    :active="route().current('chronicle.index')"
                                    :href="route('chronicle.index')"
                                >
                                    Chroniques
                                </NavLink>
                            </div>
                            <div class="hidden sm:-my-px sm:ms-10 sm:flex">
                                <NavLink
                                    v-if="$page.props.auth.user.is_admin"
                                    href="/admin"
                                >
                                    Admin
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-skin-50 bg-darkness-900 hover:text-blood-500 focus:outline-none transition ease-in-out duration-150"
                                                type="button"
                                            >
                                                <img
                                                    class="rounded-full w-8 h-8 mr-2"
                                                    src="/img/vampire.png"
                                                >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        clip-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        fill-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profil</DropdownLink>
                                        <DropdownLink :href="route('logout')" as="button" method="post">
                                            Déconnexion
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-blood-500 hover:text-blood-500 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                            >
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        d="M4 6h16M4 12h16M4 18h16"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        d="M6 18L18 6M6 6l12 12"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :active="route().current('onboarding')" :href="route('onboarding')">
                            Accueil
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-blood-500">
                        <div class="px-4">
                            <div class="flex items-center font-medium text-base text-skin-50">
                                <img
                                    class="rounded-full w-8 h-8 mr-2"
                                    src="/img/vampire.png"
                                >
                                {{ $page.props.auth.user.name }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink
                                :active="route().current('characters.index')"
                                :href="route('characters.index')"
                            >
                                Personnages
                            </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('profile.edit')"> Profil</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" as="button" method="post">
                                Déconnexion
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="character_header shadow border-b border-gray-700 w-full">
                <div class="py-4 w-full mx-auto px-4 sm:px-6 sm:py-6">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot/>
            </main>
        </div>
    </div>
</template>
